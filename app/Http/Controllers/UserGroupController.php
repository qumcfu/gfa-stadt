<?php
/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2024, https://gfa-stadt.de, see LICENSE.txt for contact information
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Privilege;
use App\Models\Section;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {

            // if user is not logged in or does not have user-group access...
            if (!Auth::user() || !Auth::user()->hasPermission('user-groups', 'access'))
            {
                // redirect to home screen
                Redirect::to('home')->send();
            }
            return $next($request);
        });

    }

    public function index()
    {
        $groups = UserGroup::paginate(10);

        return view('user_groups.index', compact('groups'));
    }

    public function create()
    {
        return view('user_groups.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'name' => 'required'
        ]);

        $data['shortname'] = preg_replace("/[^a-z0-9]+/", "", strtolower($data['name']));
        $data['permissions'] = json_encode($this->getPermissions());

        $group = UserGroup::create($data);

        $group['shortname'] = $group['shortname'] . '-' . $group['id'];
        $group->save();

        return \redirect('user-groups/edit/' . $group->id);
    }

    public function edit(UserGroup $group)
    {
        $permissions = $this->getPermissions();

        $group_permissions = json_decode($group['permissions'], true);

        return view('user_groups.edit', compact('group', 'permissions', 'group_permissions'));
    }

    public function update(UserGroup $group)
    {
        $permissions = $this->getPermissions();
        $data = $this->validatedData($group);

        $group['name'] = $data['name'];
        $group_permissions = [];
        $old_permissions = json_decode($group['permissions'], true);

        foreach ($permissions as $section_key => $section)
        {
            $group_permissions[$section_key]['name'] = $section['name'] ?? __('Unknown');
            $group_permissions[$section_key]['color'] = $section['color'] ?? '#444';
            $group_permissions[$section_key]['access'] = $old_permissions[$section_key]['access'] ?? false;

            foreach ($section['privileges'] as $privilege_key => $privilege) {
                $group_permissions[$section_key]['privileges'][$privilege_key]['status'] = ($data[$section_key][$privilege_key] ?? false) === 'on';
            }
        }

        $group_permissions = json_encode($group_permissions);
        $group['permissions'] = $group_permissions;

        $group->save();

        return $this->index();
    }

    public function updateAccess(UserGroup $group, string $section)
    {
        // get permissions as array
        $permissions = json_decode($group['permissions'], true);

        // toggle access for submitted section
        $permissions[$section]['access'] = !($permissions[$section]['access'] ?? false);

        $section_data = Section::where('shortname', '=', $section)->first();
        $permissions[$section]['name'] = $section_data['name'];
        $permissions[$section]['color'] = $section_data['color'];

        // re-encode permissions to json
        $permissions = json_encode($permissions);
        // set group permissions
        $group['permissions'] = $permissions;

        $group->save();

        return back();
    }

    public function disable(UserGroup $group)
    {
        $group['status'] = 'disabled';
        $group->save();

        return $this->index();
    }

    public function enable(UserGroup $group)
    {
        $group['status'] = 'active';
        $group->save();

        return $this->index();
    }

    public function transfer()
    {
        $data = request()->validate([
            'target-group' => 'required',
            'group-to-delete' => 'required'
        ]);

        $users_in_group = User::where('user_group', '=', $data['group-to-delete'])->get();

        foreach ($users_in_group as $user)
        {
            $user['user_group'] = $data['target-group'];
            $user->save();
        }

        $group_to_delete = UserGroup::where('shortname', '=', $data['group-to-delete'])->first();

        return $this->destroy($group_to_delete);
    }

    public function tryToDelete(UserGroup $group)
    {
        // don't allow deletion of admin group
        if ($group->shortname === 'admin')
        {
            return back();
        }

        return view('user_groups.delete', compact('group'));
    }

    public function destroy(UserGroup $group)
    {
        $users_in_group = User::where('user_group', '=', $group['shortname'])->get();

        if(sizeof($users_in_group) > 0)
        {
            $error = [
                'title' => __('User Group ":group" cannot be deleted at this time.', ['group' => __($group->name)]),
                'message' => __('The following users are assigned to this group:'),
                'proposition' => __('Select another user group to assign to above users to proceed or click on ":caption" to do so manually.', ['caption' => __('Back')]),
                'group' => $group,
                'users' => $users_in_group
            ];
            $groups = UserGroup::where([['status', '=', 'active'], ['id', '!=', $group->id]])->get();
            return view('user_groups.error', compact('error', 'groups'));
        }

        $group->delete();

        return $this->index();
    }

    private function validatedData(UserGroup $group)
    {
        return request()->validate([
            'name' => 'required|unique:user_groups,name,' . $group->id,
            'projects' => '',
            'memberships' => '',
            'questionnaires' => '',
            'users' => '',
            'user-groups' => '',
            'maps' => '',
            'data' => '',
            'scripts' => '',
            'configurations' => ''
        ]);
    }

    private function getPermissions()
    {
        $permissions_raw = Permission::all();
        $permissions = [];

        foreach ($permissions_raw as $privilege)
        {
            $current_privilege = Privilege::where('shortname', '=', $privilege['privilege'])->first();
            if (isset($current_privilege))
            {
                $privilege_name = $current_privilege['name'];
            }
            $permissions[$privilege['section']]['privileges'][$privilege['privilege']]['status'] = false;
            $permissions[$privilege['section']]['privileges'][$privilege['privilege']]['name'] = $privilege_name;
        }

        foreach ($permissions as $key => $section)
        {
            $section = Section::where('shortname', '=', $key)->first();
            $permissions[$key]['name'] = $section['name'];
            $permissions[$key]['color'] = $section['color'];
            $permissions[$key]['access'] = false;
        }

        return $permissions;
    }
}
