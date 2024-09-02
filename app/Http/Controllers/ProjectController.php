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

use App\Models\ColorCode;
use App\Models\File;
use App\Models\FileType;
use App\Models\Membership;
use App\Models\Project;
use App\Models\ProjectSettings;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('access-projects')) {
                Redirect::to('home')->send();
            }
            return $next($request);
        })->except(['filesLead']);;
    }

    public function index()
    {
        $projects = Project::orderBy('order_id')->paginate(10);
        $colors = ColorCode::all();

        return view('projects.index', compact('projects', 'colors'));
    }

    public function create()
    {
        $project = new Project();

        return view('projects.create', compact('project'));
    }

    public function store()
    {
        if (!Gate::allows('create-projects')) {
            abort(403);
        }

        $data = $this->validatedData(0);

        $project = new Project();
        $this->setValidatedData($project, $data);

        $project['author_id'] = Auth::user()['id'];
        $project['order_id'] = Project::all()->count() + 1;

        $project->save();

        $project->updateAppraisalData();

        // initialize screening count
        $project->updateScreeningCount();

        $settings = new ProjectSettings();
        $settings['project_id'] = $project['id'];
        $settings->save();

        return redirect('/projects')->with('success', __(':thing has been created.', ['thing' => __('Project')]));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        if (!Gate::allows('edit-projects')) {
            abort(403);
        }

        $data = $this->validatedData($project['id']);
        $this->setValidatedData($project, $data);

        if(!$project->isDirty()) return back()->with('info', __('No changes have been identified.'));

        $project['editor_id'] = Auth::user()['id'];
        $project->save();

        return back()->with('success', __(':thing has been updated.', ['thing' => __('Project')]));
    }

    public function enroll()
    {
        $data = request()->validate([
            'enroll.key' => 'required',
            'enroll.user_id' => 'required'
        ]);

        $user = User::where('id', '=', $data['enroll']['user_id'])->first();
        $project = Project::where('enrollment_key', '=', $data['enroll']['key'] ?? '')->first();

        if ($user == null) return back()->withInput()->with('error', __('Enrollment failed.') . ' ' . __('Error code :code.', ['code' => 'PRC-E-1']));
        if ($project == null) return back()->withInput()->with('error', __('Enrollment failed.') . ' ' . __('The enrollment key is invalid.'));

        $isFirst = Membership::where('project_id', $project['id'])->count() === 0;
        $membership = $project->enroll($user, $isFirst ? 'lead' : 'participant');

        if ($membership == null) return back()->withInput()->with('error', __('Enrollment failed.') . ' ' . __('You are already a member of that project.'));

        return back()->with('success', __('You have successfully enrolled in :project.', ['project' => $project['name'] ?? __('Unknown Project')]));
    }

    public function delete(Project $project)
    {
        return view('projects.delete', compact('project'));
    }

    public function destroy(Project $project)
    {
        if (!Gate::allows('delete-projects')) {
            abort(403);
        }

        $project['settings']->delete();

        $name = $project['name'];
        $project->delete();
        $this->shiftSubsequentProjects($project, -1);

        return back()->with('success', __(':thing :name has been deleted.', ['thing' => __('Project'), 'name' => $name]));
    }

    public function memberships(Project $project)
    {
        if (!Gate::allows('access-memberships')) {
            abort(403);
        }

        $memberships = Membership::where('project_id', '=', $project['id'])->paginate(10);
        $users = User::orderBy('order_id')->get();
        $roles = Role::all();

        return view('projects.memberships', compact('project', 'memberships', 'users', 'roles'));
    }

    public function files(Project $project): View|RedirectResponse
    {
        $currentUser = Auth::user();
        if(isset($currentUser['impersonate_id'])) $currentUser = User::where('id', '=', $currentUser['impersonate_id'])->first();
        $membership = $currentUser->getMembershipTo($project);

        if (!isset($membership) || $membership['role']['shortname'] !== 'lead') {
            return redirect(route('home'))->with('info', __('Access denied.'));
        }

        $files = File::where('project_id', '=', $project['id'])->orWhere('is_global', '=', true)->paginate(10);
        $globals = File::where('is_global', '=', true)->paginate(10);
        $types = FileType::all();
        $projects = Project::where('id', '=', $project['id'])->get();

        return view('projects.files', compact('project', 'projects', 'files', 'globals', 'types'));
    }

    public function filesLead(Project $project): View|RedirectResponse
    {
        $currentUser = Auth::user();
        if(isset($currentUser['impersonate_id'])) $currentUser = User::where('id', '=', $currentUser['impersonate_id'])->first();
        $membership = $currentUser->getMembershipTo($project);

        if (!isset($membership) || $membership['role']['shortname'] !== 'lead') {
            return redirect(route('home'))->with('info', __('Access denied.'));
        }

        $files = File::where('project_id', '=', $project['id'])->orWhere('is_global', '=', true)->paginate(10);
        $globals = File::where('is_global', '=', true)->paginate(10);
        $types = FileType::all();
        $projects = Project::where('id', '=', $project['id'])->get();

        return view('projects.files-lead', compact('project', 'projects', 'files', 'globals', 'types', 'currentUser'));
    }

    public function reorder()
    {
        $order = request()['order'] ?? null;
        if ($order != null)
        {
            $order = json_decode($order, true);
            $this->updateProjectOrder($order);
        }

        return back();
    }

    private function updateProjectOrder(array $order)
    {
        foreach ($order as $key => $id)
        {
            $project = Project::where('id', '=', $id)->first();
            if ($project != null)
            {
                $project->order_id = $key + 1;
                $project->timestamps = false;
                $project->save();
            }
        }
    }

    private function shiftSubsequentProjects(Project $project, int $amount)
    {
        $subsequents = Project::where('order_id', '>=', $project->order_id)->get();
        foreach ($subsequents as $subsequent)
        {
            if ($subsequent['id'] === $project['id']) continue;
            $subsequent['order_id'] = $subsequent['order_id'] + $amount;
            $subsequent->timestamps = false;
            $subsequent->save();
        }
    }

    private function setValidatedData(Project $project, $data)
    {
        $project['name'] = $data['name'];
        $project['type'] = $data['type'];
        $project['stage'] = $data['stage'];
        $project['change'] = $data['change'];
        $project['enrollment_key'] = $data['key'];
        $project['color_id'] = $data['color_id'];

        return $data;
    }

    private function validatedData($id)
    {
        $validated = request()->validate([
            'project.' . $id . '.name' => 'required|unique:projects,name,' . $id,
            'project.' . $id . '.type' => '',
            'project.' . $id . '.stage' => '',
            'project.' . $id . '.change' => '',
            'project.' . $id . '.key' => 'required|max:128|unique:projects,enrollment_key,' . $id,
            'project.' . $id . '.color_id' => ''
        ]);
        return $validated['project'][$id];
    }
}
