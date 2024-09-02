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
use App\Models\Membership;
use App\Models\ProjectStageType;
use App\Models\Questionnaire;
use App\Models\Section;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['legal', 'privacy']);
    }

    public function index()
    {
        $sections = Section::all();
        $user = Auth::user();

        $memberships = Membership::where('user_id', '=', $user['impersonate_id'] ?? $user['id'])->orderByDesc('updated_at')->paginate(1);
        $screeningStageType = ProjectStageType::where('shortname', '=', 'screening')->first();
        $scopingStageType = ProjectStageType::where('shortname', '=', 'scoping')->first();
        $appraisalStageType = ProjectStageType::where('shortname', '=', 'appraisal')->first();
        $colors = ColorCode::all();

        // check if one of the user's stages need to be updated due to an updated selection in scoping
        foreach ($memberships as $membership)
        {
            foreach($membership['stages'] as $stage)
            {
                if($stage['needs_update'])
                {
                    $stage->updateEntryCount();
                    $stage['needs_update'] = false;
                    $stage->timestamps = false;
                    $stage->save();
                }
            }
        }

        $questionnaires = Questionnaire::all();
        $firstScreeningId = $questionnaires->where('type.shortname', '=', 'screening')->pluck('stage_order_id')->first();
        $firstAppraisalId = $questionnaires->where('type.shortname', '=', 'appraisal')->pluck('stage_order_id')->first();

        return view('pages.dashboard', compact('sections', 'memberships', 'screeningStageType', 'scopingStageType', 'appraisalStageType', 'colors', 'firstScreeningId', 'firstAppraisalId'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function legal(): View
    {
        return view('pages.legal');
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }
}
