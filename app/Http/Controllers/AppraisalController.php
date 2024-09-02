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

use App\Models\Comment;
use App\Models\Content;
use App\Models\EffectType;
use App\Models\Entry;
use App\Models\HealthImpactType;
use App\Models\Membership;
use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\ProjectStageType;
use App\Models\Questionnaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AppraisalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {
            // to do: gate should only allow users after scoping has been conluded
            if (!Gate::allows('access-screenings')) {
                Redirect::to('home')->send();
            }
            return $next($request);
        });
    }

    public function update(Membership $membership, int $page)
    {
        // not ideal to create the success message before saving was successful...
        request()->session()->flash('success', __('Saved Changes.'));
        return $this->view($membership, $page);
    }

    public function updateReport(Project $project): RedirectResponse
    {
        $project->updateAppraisalData();
        return back()->with('success', __('Appraisal report has been updated.'));
    }

    public function view(Membership $membership, int $page): View
    {
        $currentUser = Auth::user();

        if ($membership['user_id'] !== $currentUser['id']) {
            // allow developers to view another user's screening pages only when they use impersonation
            if ($membership['user']['id'] !== $currentUser['impersonate_id']) abort(403);
        }

        $project = $membership['project'];
        $stage = $membership->getAppraisalStage();

        if (request()->method() === 'PUT') $this->saveProjectStage($stage);

        $questionnaire = Questionnaire::with('contents')->where([['type_id', '=', $stage['type_id']], ['stage_order_id', '=', $page]])->first();
        $pageCount = Questionnaire::where('type_id', '=', $stage['type_id'])->max('stage_order_id');

        return view('appraisals.view', compact('project', 'questionnaire', 'stage', 'page', 'pageCount'));
    }

    public function summary(Membership $membership): View|RedirectResponse
    {
        $currentUser = Auth::user();

        if ($membership['user_id'] !== $currentUser['id']) {
            // allow developers to view another user's screening pages only when they use impersonation
            if ($membership['user']['id'] !== $currentUser['impersonate_id']) return redirect(route('home'))->with('info', __('Access denied.'));
        }

        $stage = $membership->getAppraisalStage();

        if (request()->method() === 'PUT') $this->saveProjectStage($stage);

        $project = $membership['project'];
        $questionnaires = $stage->getQuestionnaires();
        $effectTypes = EffectType::all()->sortBy('order_id');
        $config = Auth::user()['config'] ?? null;

        $effectTypeCount = 0;
        foreach (Questionnaire::where('type_id', '=', ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first())->get() as $questionnaire)
        {
            $effectTypeCount += $questionnaire->getEffectTypeCount($membership);
        }

        return view('appraisals.summary', compact('project', 'stage', 'questionnaires', 'effectTypes', 'config', 'effectTypeCount'));
    }

    public function report(Project $project): View|RedirectResponse
    {
        if($project['app_changes'] > 0) return redirect('appraisal/loading/' . $project['id']);

        $currentUser = Auth::user();
        if(isset($currentUser['impersonate_id'])) $membership = $project->getMembershipOf($currentUser['impersonate_id']);
        else $membership = $project->getMyMembership();

        if (is_null($membership) || !Gate::allows('view-report', $membership)) return redirect(route('home'))->with('info', __('Access denied.'));

        if (request()->method() === 'PUT')
        {
            $stage = $membership->getAppraisalStage();
            $this->saveProjectStage($stage);
        }

        $stageType = ProjectStageType::where('shortname', '=', 'appraisal')->first();

        $questionnaires = Questionnaire::where('type_id', '=', ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first())->orderBy('stage_order_id')->get();
        $questionnaires = $questionnaires->filter->hasFocusedContent($project);

        $membershipIds = Membership::where([['project_id', '=', $project['id']], ['active', '=', true]])->pluck('id');
        $stages = ProjectStage::whereIn('membership_id', $membershipIds)->where('active', '=', 1)->where('type_id', '=', ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first())->get();
        $effectTypes = EffectType::all()->sortBy('order_id');
        $healthImpactTypes = HealthImpactType::all()->sortBy('order_id');
        $config = $currentUser['config'] ?? null;

        return view('appraisals.report', compact('project', 'membership', 'stageType', 'stages', 'questionnaires', 'effectTypes', 'healthImpactTypes', 'config'));
    }

    public function info(Membership $membership, int $page): View
    {
        // GATE?
        if (!Gate::allows('view-report', $membership)) {
            abort(403);
        }

        $project = $membership['project'];
        $stage = $membership->getAppraisalStage();

        $questionnaire = Questionnaire::with('contents')->where([['type_id', '=', $stage['type_id']], ['stage_order_id', '=', $page]])->first();

        return view('appraisals.info', compact('project', 'questionnaire', 'stage', 'page'));
    }

    public function comments(Project $project): View|RedirectResponse
    {
        $currentUser = Auth::user();
        if(isset($currentUser['impersonate_id'])) $membership = $project->getMembershipOf($currentUser['impersonate_id']);
        else $membership = $project->getMyMembership();

        if (is_null($membership) || !Gate::allows('view-report', $membership)) return redirect(route('home'))->with('info', __('Access denied.'));

        if (request()->method() === 'PUT') $this->saveProjectStage($membership->getAppraisalStage());

        $stageType = ProjectStageType::where('shortname', '=', 'appraisal')->first();
        $questionnaires = Questionnaire::where('type_id', '=', $stageType['id'])->orderBy('stage_order_id')->get();

        return view('appraisals.comments', compact('project', 'membership', 'stageType','questionnaires'));
    }

    public function documentation(): View
    {
        // GATE
        $questionnaires = Questionnaire::where('type_id', '=', ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first())->orderBy('stage_order_id')->get();

        return view('appraisals.documentation', compact('questionnaires'));
    }

    public function loading(Project $project): View
    {
        return view('appraisals.loading', compact('project'));
    }

    public function dashboard(Membership $membership): RedirectResponse
    {
        $stage = $membership->getAppraisalStage();

        $this->saveProjectStage($stage);

        return \redirect(route('dashboard'));
    }

    private function saveProjectStage(ProjectStage $stage)
    {
        $data = request()->validate([
            'entries.*' => '',
            'entries.*.impact' => '',
            'entries.*.distribution' => '',
            'entries.*.positive' => '',
            'entries.*.negative' => '',
            'entries.*.potential' => '',
            'entries.*.importance' => '',
            'entries.*.comments' => ''
        ]);

        $entries = $data['entries'] ?? [];

        $this->saveEntries($stage, $entries);
        $stage->updateEntryCount();
        $stage->checkIfComplete();
    }

    private function saveEntries(ProjectStage $stage, array $entries)
    {
        $project = $stage['membership']['project'];

        foreach ($entries as $entry) {
            $id = $entry['id'] ?? 0;
            $content = Content::where('id', '=', $id)->first();

            $dbEntry = Entry::where([['stage_id', '=', $stage['id']], ['content_id', '=', $id]])->first();
            if($dbEntry == null){
                $dbEntry = new Entry();
                $dbEntry['stage_id'] = $stage['id'];
                $dbEntry['content_id'] = $id;
                // save here because we'll need to access the id
                $dbEntry->save();
            }

            if ($content == null) continue;

            switch($content['type']['shortname'])
            {
                case 'appraisal-item':

                    if(($entry['impact'] ?? 0) == 1)
                    {
                        $dbEntry['positive'] = 1;
                        $dbEntry['negative'] = 0;
                    }
                    else if (($entry['impact'] ?? -1) == 0)
                    {
                        $dbEntry['positive'] = 0;
                        $dbEntry['negative'] = 1;
                    }
                    else if (($entry['impact'] ?? -1) == -2) $dbEntry['positive'] = $dbEntry['negative'] = -1;
                    else if (($entry['impact'] ?? -1) == -4) $dbEntry['positive'] = $dbEntry['negative'] = -2;

                    break;
            }

            // update comment if it already exists
            if(isset($dbEntry['comment']) && isset($entry['comments']))
            {
                $dbEntry['comment']['text'] = $entry['comments'];
                $dbEntry['comment']->save();
            }

            // create comment if necessary
            if(!isset($dbEntry['comment']) && !is_null($entry['comments'] ?? null))
            {
                $comment = new Comment();
                $comment['entry_id'] = $dbEntry['id'];
                $comment['author_id'] = $dbEntry['stage']['membership']['user']['id'];
                $comment['text'] = $entry['comments'];
                $comment->save();
            }

            // delete comment if no longer needed
            if(isset($dbEntry['comment']) && is_null($entry['comments']))
            {
                $dbEntry['comment']->delete();
            }

            if($dbEntry->isDirty())
            {
                $dbEntry->save();
                $project['app_changes'] = $project['app_changes'] + 1;
            }
        }

        // memorize number of changes
        if($project->isDirty())
        {
            $project->timestamps = false;
            $project->save();
        }
    }

    public function results(Membership $membership)
    {
        $appraisal = $membership['appraisal'];

        if (\request()->method() === 'PUT')
        {
            $this->saveAppraisalData($appraisal, \request());
        }

        $type_id = ProjectStageType::where('name', '=', 'appraisal')->pluck('id')->first();
        $pageCount = Questionnaire::where('type_id', '=', $type_id)->max('index');

        return view('appraisals.results', compact('membership', 'pageCount'));
    }
}
