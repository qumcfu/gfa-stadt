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

use App\Models\Membership;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('access-memberships')) {
                Redirect::to('home')->send();
            }
            return $next($request);
        })->except(['updateRoleAjax', 'toggleActiveAjax']);
    }

    public function index()
    {
        $memberships = Membership::orderBy('order_id')->paginate(10);
        $userIds = $memberships->pluck('user_id');
        $projectIds = $memberships->pluck('project_id');

        $users = User::all();
        $shownUsers = User::whereIn('id', $userIds)->get();
        $projects = Project::all();
        $shownProjects = Project::whereIn('id', $projectIds)->get();

        $roles = Role::all();

        return view('memberships.index', compact('memberships', 'users', 'shownUsers', 'projects', 'shownProjects', 'roles'));
    }

    public function store()
    {
        if (!Gate::allows('create-memberships')) {
            abort(403);
        }

        $data = $this->validatedData();
        if($data['order_id'] == 'null') $data['order_id'] = Membership::all()->count() + 1;

        if(Membership::where([['user_id', '=', $data['user_id']], ['project_id', '=', $data['project_id']]])->first() != null)
        {
            return back()->with('error', __('This membership already exists.'));
        }

        $membership = new Membership();
        $membership['user_id'] = $data['user_id'];
        $membership['project_id'] = $data['project_id'];
        $membership['role_id'] = $data['role_id'];
        $membership['order_id'] = $data['order_id'];
        $membership['author_id'] = Auth::user()->id ?? -1;
        $membership->save();

        $this->shiftSubsequentMemberships($membership, 1);

        return back()->with('success', __(':thing has been created.', ['thing' => __('Membership')]));
    }

    public function update(Membership $membership)
    {
        if (!Gate::allows('edit-memberships')) {
            abort(403);
        }

        $data = $this->validatedData();

        $duplicate = Membership::where([['user_id', '=', $data['user_id']], ['project_id', '=', $data['project_id']]])->first();

        if($duplicate != null && $duplicate['id'] !== $membership['id'])
        {
            return back()->with('error', __('This membership already exists.'));
        }

        $membership['user_id'] = $data['user_id'];
        $membership['project_id'] = $data['project_id'];
        $membership['role_id'] = $data['role_id'];
        $membership['active'] = $data['active'];

        $membership->setStageActive('screening', $data['active_screening_id'] ?? 0);
        $membership->setStageActive('appraisal', $data['active_appraisal_id'] ?? 0);

        if($membership->isDirty())
        {
            $membership['editor_id'] = Auth::user()['id'] ?? 0;
            $membership->save();
        }

        return back()->with('success', __(':thing has been updated.', ['thing' => __('Membership')]));
    }

    public function updateRoleAjax(Membership $membership, Role $role)
    {
        $membership['role_id'] = $role['id'];
        if($membership->isDirty()) $membership->save();
    }

    public function toggleActiveAjax(Membership $membership)
    {
        $membership['active'] = !$membership['active'];
        if($membership->isDirty()) $membership->save();
    }

    public function disable(Membership $membership)
    {
        if (!Gate::allows('edit-memberships')) {
            abort(403);
        }

        $membership['active'] = false;

        if($membership->isDirty())
        {
            $membership['editor_id'] = Auth::id() ?? 0;
            $membership->save();
        }

        return back()->with('success', __(':thing has been disabled.', ['thing' => __(':thing of :name', ['thing' => __('Membership'), 'name' => $membership['user']['username'] ?? __('Unknown User')])]));
    }

    public function enable(Membership $membership)
    {
        if (!Gate::allows('edit-memberships')) {
            abort(403);
        }

        $membership['active'] = true;

        if($membership->isDirty())
        {
            $membership['editor_id'] = Auth::id() ?? 0;
            $membership->save();
        }

        return back()->with('success', __(':thing has been enabled.', ['thing' => __(':thing of :name', ['thing' => __('Membership'), 'name' => $membership['user']['username'] ?? __('Unknown User')])]));
    }

    public function destroy(Membership $membership)
    {
        if (!Gate::allows('delete-memberships')) {
            abort(403);
        }

        $membership->delete();
        $this->shiftSubsequentMemberships($membership, -1);

        return back()->with('success', __(':thing has been cancelled.', ['thing' => __('Membership')]));;
    }

    public function reorder()
    {
        $order = request()['order'] ?? null;
        if ($order != null)
        {
            $order = json_decode($order, true);
            $this->updateMembershipOrder($order);
        }

        return back();
    }

    private function updateMembershipOrder(array $order)
    {
        foreach ($order as $key => $id)
        {
            $membership = Membership::where('id', '=', $id)->first();
            if ($membership != null)
            {
                $membership->order_id = $key + 1;
                $membership->timestamps = false;
                $membership->save();
            }
        }
    }

    private function shiftSubsequentMemberships(Membership $membership, int $amount)
    {
        $subsequents = Membership::where('order_id', '>=', $membership->order_id)->get();
        foreach ($subsequents as $subsequent)
        {
            if ($subsequent['id'] === $membership['id']) continue;
            $subsequent['order_id'] = $subsequent['order_id'] + $amount;
            $subsequent->timestamps = false;
            $subsequent->save();
        }
    }

    private function validatedData()
    {
        return request()->validate([
            'user_id' => 'required',
            'project_id' => 'required',
            'role_id' => 'required',
            'order_id' => 'nullable',
            'active' => '',
            'active_screening_id' => '',
            'active_appraisal_id' => ''
        ]);
    }
}
