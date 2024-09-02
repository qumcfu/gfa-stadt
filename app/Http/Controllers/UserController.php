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
use App\Models\UserGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['registration', 'register']);

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('access-users')) {
                Redirect::to('home')->send();
            }
            return $next($request);
        })->except(['registration', 'register']);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function index()
    {
        $users = User::orderBy('order_id')->paginate(10);
        $groups = UserGroup::where('status', '=', 'active')->get();

        return view('users.index', compact('users', 'groups'));
    }

    public function create()
    {
        $user = new User();
        $user_groups = UserGroup::where('status', '=', 'active')->get();

        return view('users.create', compact('user', 'user_groups'));
    }

    public function registration()
    {
        // self registration
        $groups = UserGroup::where('shortname', '=', 'participant')->get();

        return view('users.registration', compact('groups'));
    }

    public function store()
    {
        if (!Gate::allows('create-users')) {
            abort(403);
        }

        $data = $this->validatedData(0);
        if (($data['order_id'] ?? 'null') == 'null') $data['order_id'] = User::all()->count() + 1;

        $user = new User();
        $this->setValidatedData($user, $data);

        $user['password'] = Hash::make($data['password']);
        $user['author_id'] = Auth::user()['id'];
        $user['order_id'] = $data['order_id'];

        $user->save();

        $this->shiftSubsequentUsers($user, 1);

        // return redirect('/users/' . $user->id);
        return redirect('/users')->with('success', __('User account :name has been created.', ['name' => $user['username'] ?? __('Unknown')]));
    }

    public function register()
    {
        // self registration
        $data = $this->validatedData(0);
        // check whether confirmed password has been entered
        \request()->validate([
            'data.0.pw_confirm' => 'required'
        ]);
        $data['order_id'] = User::all()->count() + 1;

        $project = Project::where('enrollment_key', $data['key'] ?? '???')->first();
        if (is_null($project))
        {
            return back()->withInput()->with('error', __('Registration failed.') . ' ' . __('The enrollment key is invalid.'));
        }

        $user = new User();
        $this->setValidatedData($user, $data);

        $user['password'] = Hash::make($data['password']);
        $user['author_id'] = User::all()->max('id') + 1;
        $user['order_id'] = $data['order_id'];

        $user->save();

        $isFirst = Membership::where('project_id', $project['id'])->count() === 0;
        $project->enroll($user, $isFirst ? 'lead' : 'participant');

        Auth::loginUsingId($user['id']);

        return redirect('/dashboard')->with('success', __('User account :name has been created.', ['name' => $user['username'] ?? __('Unknown')]));
    }

    public function show($user)
    {
        $user = User::findOrFail($user);

        return view('users.show', compact('user'));
    }

    // a shorter way to fetch an entry from a database
    public function edit(User $user)
    {
        $user_groups = UserGroup::where('status', '=', 'active')->orWhere('shortname', '=', $user['user_groups'])->get();

        if ($user['user_group'] === 'admin')
        {
            $user_groups = UserGroup::where('status', '=', 'hidden')->get();
        }

        return view('users.edit', compact('user', 'user_groups'));
    }

    public function update(User $user)
    {
        if (!Gate::allows('edit-users')) {
            abort(403);
        }

        $data = $this->validatedData($user['id']);
        $this->setValidatedData($user, $data);

        if ($data['password'] != null) $user['password'] = Hash::make($data['password']);

        if($user->isDirty())
        {
            $user['editor_id'] = Auth::id();
            $user->save();
        }

        return back()->with('success', __(':thing has been updated.', ['thing' => __('User Account')]));
    }

    public function updatePassword(): RedirectResponse
    {
        $user = User::where('id', '=', Auth::id())->first();
        if($user == null) return back()->with('error', __('Error Code :code.', ['code' => 'USC-UP-1']));

        $data = request()->validate([ 'pw.current' => 'required|current_password', 'pw.new' => 'required|min:8|max:64', 'pw.confirm' => 'required|same:pw.new' ]);

        // double check if current password is correct
        if (Hash::check($data['pw']['current'], $user['password']))
        {
            $user['password'] = Hash::make($data['pw']['new']);
            $user->save();
        }
        return back()->with('success', __('Password has been updated.'));
    }

    public function disable(User $user)
    {
        if (!Gate::allows('edit-users')) {
            abort(403);
        }

        $user['active'] = false;
        if($user->isDirty())
        {
            $user['editor_id'] = Auth::id();
            $user->save();
        }

        return redirect('/users');
    }

    public function enable(User $user)
    {
        if (!Gate::allows('edit-users')) {
            abort(403);
        }

        $user['active'] = true;
        if($user->isDirty())
        {
            $user['editor_id'] = Auth::id();
            $user->save();
        }

        return redirect('/users');
    }

    public function tryToDelete(User $user)
    {
        // don't allow deletion of super-admin or current user
        if ($user->user_group === 'super-admin' || Auth::user()->id === $user->id)
        {
            return back();
        }

        return view('users.delete', compact('user'));
    }

    public function destroy(User $user)
    {
        if (!Gate::allows('delete-users')) {
            abort(403);
        }

        // still don't allow deletion of admin or current user
        if ($user['group']['shortname'] === 'admin' || Auth::user()['id'] === $user['id'])
        {
            return back()->with('error', __('You cannot :action this user.', ['action' => __('delete')]));
        }

        // delete memberships, project stages (backup?) and configurations – OR don't delete anything and disable it instead!

        $name = $user['username'];
        $user->delete();
        $this->shiftSubsequentUsers($user, -1);

        return back()->with('success', __(':thing :name has been deleted.', ['thing' => __('User Account'), 'name' => $name]));
    }

    public function memberships(User $user)
    {
        if (!Gate::allows('access-memberships')) {
            abort(403);
        }

        $projects = Project::orderBy('order_id')->get();
        $roles = Role::all();

        return view('users.memberships', compact('user', 'projects', 'roles'));
    }

    public function impersonate(User $user): RedirectResponse
    {
        if (!Gate::allows('developer')) {
            abort(403);
        }
        $currentUser= User::where('id', '=', Auth::id())->first();
        if($user['id'] === $currentUser['id']) $currentUser['impersonate_id'] = null;
        else $currentUser['impersonate_id'] = $user['id'];
        $currentUser->timestamps = false;
        $currentUser->save();

        return back();
    }

    public function reorder()
    {
        $order = request()['order'] ?? null;
        if ($order != null)
        {
            $order = json_decode($order, true);
            $this->updateUserOrder($order);
        }
        return back();
    }

    private function updateUserOrder(array $order)
    {
        foreach ($order as $key => $id)
        {
            $user = User::where('id', '=', $id)->first();
            if ($user != null)
            {
                $user->order_id = $key + 1;
                $user->timestamps = false;
                $user->save();
            }
        }
    }

    private function shiftSubsequentUsers(User $user, int $amount)
    {
        $subsequents = User::where('order_id', '>=', $user->order_id)->get();
        foreach ($subsequents as $subsequent)
        {
            if ($subsequent['id'] === $user['id']) continue;
            $subsequent['order_id'] = $subsequent['order_id'] + $amount;
            $subsequent->timestamps = false;
            $subsequent->save();
        }
    }

    private function validatedData($id)
    {
        $validated = request()->validate([
            'data.' . $id . '.username' => 'required|min:4|max:32|regex:/^[a-zA-Z0-9 ]+$/',
            'data.' . $id . '.email' => 'required|email|unique:users,email,' . $id,
            'data.' . $id . '.password' => ($id === 0 ? 'required|min:8|max:64' : ''),
            'data.' . $id . '.pw_confirm' => 'sometimes|same:data.' . $id . '.password',
            'data.' . $id . '.group_id' => 'required',
            'data.' . $id . '.key' => '', // for self-enrollment
            'order_id' => '',
            'data.' . $id . '.active' => ''
        ]);
        return $validated['data'][$id];
    }

    private function setValidatedData(User $user, $data)
    {
        $user['username'] = $data['username'];
        $user['email'] = $data['email'];
        $user['group_id'] = $data['group_id'];
        $user['active'] = $data['active'] ?? false;
    }
}
