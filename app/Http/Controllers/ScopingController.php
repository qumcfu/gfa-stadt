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
use App\Models\ProjectStage;
use App\Models\Questionnaire;
use App\Models\ProjectStageType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class ScopingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {
            // to do: gate should only allow project managers!
            if (!Gate::allows('access-screenings')) {
                Redirect::to('home')->send();
            }
            return $next($request);
        });
    }

    public function view(Project $project): \Illuminate\Contracts\View\View
    {
        $currentUser = Auth::user();
        if(isset($currentUser['impersonate_id'])) $membership = $project->getMembershipOf($currentUser['impersonate_id']);
        else $membership = $project->getMyMembership();

        if ($membership == null || !Gate::allows('view-report', $membership)) {
            abort(403);
        }

        if (request()->method() === 'PUT')
        {
            $this->conclude($project, request());
            // get project from db to update its related focusedItems
            $project = Project::where('id', '=', $project['id'])->first();
        }

        $firstAppraisalId = Questionnaire::where('type_id', '=', ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first())->pluck('stage_order_id')->first();

        return view('scopings.view', compact('project', 'membership', 'firstAppraisalId'));
    }

    public function conclude(Project $project, Request $request): RedirectResponse
    {
        // update the current number of appraisal items
        $project->updateAppraisalCount();

        // notify all project stages their entry counts need to be updated
        $membershipIds = Membership::where('project_id', $project['id'])->pluck('id');
        $stages = ProjectStage::whereIn('membership_id', $membershipIds)->get();

        set_time_limit(300);
        foreach ($stages as $stage)
        {
            $stage['needs_update'] = true;
            $stage->timestamps = false;
            $stage->save();

            $complete = $stage->getProgress() > 0.997;
            $stage['complete'] = $complete ? 1 : 0;
            if($stage->isDirty() || $stage->updateEntryCount())
            {
                $stage->timestamps = false;
                $stage->save();
            }
        }

        $project['app_active'] = true;
        $project['app_changes'] = $project['app_changes'] + 1;
        if($project->isDirty())
        {
            $project->timestamps = false;
            $project->save();
        }

        return back()->with('success', __('Saved Changes.'));
    }
}
