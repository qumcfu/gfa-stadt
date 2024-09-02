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

use App\Models\Questionnaire;
use App\Models\ProjectStageType;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ConfigurationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {

            // if user is not logged in or does not have configuration access...
            if (!Auth::user() || !Auth::user()->hasPermission('configurations', 'access'))
            {
                // redirect to home screen
                Redirect::to('home')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $screening_type_id = ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first();
        $screening = Questionnaire::where('type_id', '=', $screening_type_id)->orderBy('stage_order_id', 'ASC')->get();

        $appraisal_type_id = ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first();
        $appraisal = Questionnaire::where('type_id', '=', $appraisal_type_id)->orderBy('stage_order_id', 'ASC')->get();

        return view('configuration.index', compact('screening', 'appraisal'));
    }

    public function saveChartInfo(string $chartType, string $chartSize, string $valueType, string $interpolationMode)
    {
        $user = Auth::user();
        $config = $user['config'] ?? $user->configure();
        $config['chart_type'] = $chartType;
        $config['chart_size'] = $chartSize;
        $config['value_type'] = $valueType;
        $config['interpolation_mode'] = $interpolationMode;
        $config->save();
    }

    public function saveScreeningChart(int $active)
    {
        $user = Auth::user();
        $config = $user['config'] ?? $user->configure();
        $config['chart_active'] = $active;
        $config->save();
    }

    public function editComponent(string $component)
    {
        $type_id = ProjectStageType::where('shortname', '=', $component)->pluck('id')->first();
        $questionnaires = [
            $component => Questionnaire::where('type_id', '=', $type_id)->orderBy('stage_order_id', 'ASC')->get(),
            'idle' => Questionnaire::where('type_id', '=', 1)->orderBy('id', 'ASC')->get()
        ];

        return view('configuration.' . $component, compact('questionnaires', 'component'));
    }

    public function updateComponent(string $component)
    {
        $index = $component . '-ids';

        // request and validate component (screening, scoping) ids
        $data = request()->validate([
            $index => 'required'
        ]);

        // create array from json string
        $data[$index] = json_decode($data[$index], true);

        // get all questionnaires that were part of that component until now
        $type_id = ProjectStageType::where('shortname', '=', $component)->pluck('id')->first();
        $questionnaires = Questionnaire::where('type_id', '=', $type_id)->get();

        // loop through all questionnaires and set their type_id to one (undefined)
        // (this is, of course, not a great way to handle this – might be improved later)
        // (we all know it won't)
        foreach ($questionnaires as $questionnaire)
        {
            $questionnaire->type_id = 1;
            $questionnaire->update();
        }

        // the $index array contains the ordered ids of all questionnaires that are part of that component
        foreach ($data[$index] as $key => $id)
        {
            // get the questionnaire with that id...
            $questionnaire = Questionnaire::where('id', '=', $id)->first();
            if ($questionnaire != null)
            {
                // ...and set the type to $component and index to its designated position in that component
                $questionnaire->type_id = $type_id;
                $questionnaire->stage_order_id = $key + 1;
                $questionnaire->update();
            }
        }

        // return to index page
        return \redirect('/configurations')->with('success', __('The :thing has been updated.', ['thing' => __($component)]));
    }
}
