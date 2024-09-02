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

use App\Models\Answer;
use App\Models\ColorCode;
use App\Models\Content;
use App\Models\ContentType;
use App\Models\Icon;
use App\Models\Survey;
use \App\Models\Questionnaire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            // if user is not logged in or does not have access to questionnaires...
            if (!Auth::user() || !Auth::user()->hasPermission('questionnaires', 'access'))
            {
                // redirect to home screen
                Redirect::to('dashboard')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $questionnaires = Questionnaire::orderBy('order_id')->paginate(10);
        $icons = Icon::where('available', '=', true)->orderBy('id')->get();
        $colors = ColorCode::all();

        return view('questionnaires.index', compact('questionnaires', 'icons', 'colors'));
    }

    public function create()
    {
        $questionnaire = new Questionnaire();

        return view('questionnaires.create', compact('questionnaire'));
    }

    public function edit(Questionnaire $questionnaire)
    {
        $contents = Content::where('questionnaire_id', '=', $questionnaire->id)->orderBy('order_id', 'ASC')->get();
        $previous = Questionnaire::where('order_id', '=', $questionnaire->order_id - 1)->first() ?? null;
        $next = Questionnaire::where('order_id', '=', $questionnaire->order_id + 1)->first() ?? null;

        return view('questionnaires.edit', compact('questionnaire', 'previous', 'next', 'contents'));
    }

    public function preview(Questionnaire $questionnaire)
    {
        $previous = Questionnaire::where('order_id', '=', $questionnaire->order_id - 1)->first() ?? null;
        $next = Questionnaire::where('order_id', '=', $questionnaire->order_id + 1)->first() ?? null;

        return view('questionnaires.preview', compact('questionnaire', 'previous', 'next'));
    }

    public function store()
    {
        if (!Gate::allows('create-questionnaires')) {
            abort(403);
        }

        $data = $this->validatedData(0);

        $questionnaire = new Questionnaire();
        $this->setValidatedData($questionnaire, $data);

        $questionnaire['author_id'] = Auth::id();
        $questionnaire['order_id'] = Questionnaire::all()->count() + 1;

        $questionnaire->save();

        return redirect('/questionnaires/edit/' . $questionnaire['id'])->with('success', __(':thing has been created.', ['thing' => __('Questionnaire')]));;
    }

    public function update(Questionnaire $questionnaire)
    {
        $data = $this->validatedData($questionnaire['id']);
        $this->setValidatedData($questionnaire, $data);


        if(!$questionnaire->isDirty()) return back()->with('info', __('No changes have been identified.'));

        $questionnaire['editor_id'] = Auth::id();
        $questionnaire->save();

        return back()->with('success', __(':thing has been saved.', ['thing' => __('Questionnaire') . ' ' . __(':quote', ['quote' => $questionnaire['name'] ?? __('Untitled')])]));
    }

    public function updateAndCreateQuestion(Questionnaire $questionnaire)
    {
        // is this function still needed?
        $data = $this->validatedData();

        $questionnaire->update($data);

        $content = new Content();
        $types = ContentType::all();

        return view('contents.create', compact('questionnaire', 'content', 'types'));
    }

    public function reorder()
    {
        $order = \request()['order'] ?? null;
        if ($order != null)
        {
            $order = json_decode($order, true);
            $this->updateQuestionnaireOrder($order);
        }

        return back()->with('success', __('Updated Questionnaire Order.'));
    }

    public function show(Questionnaire $questionnaire)
    {
        // lazy loading
        // load questionnaire's contents (see relationship function in model) along with those contents' answers

        $questionnaire->load('contents.responses');

        $responses = $this->responses($questionnaire);

        $questionnaire->load('contents.answers');

        $survey_count = sizeof(Survey::where('questionnaire_id', $questionnaire->id)->get());

        return view('questionnaires.show', compact('questionnaire', 'responses', 'survey_count'));
    }

    public function destroy(Questionnaire $questionnaire)
    {
        foreach($questionnaire->contents as $content)
        {
            Answer::where('content_id', '=', $content->id)->delete();
        }
        $questionnaire->contents()->delete();
        $questionnaire->delete();

        return $this->index();
    }

    private function validatedData($id)
    {
        $validated = request()->validate([
            'questionnaire.' . $id . '.name' => 'required|min:1|max:128',
            'questionnaire.' . $id . '.description' => 'nullable|max:2048',
            'questionnaire.' . $id . '.icon_id' => 'required',
            'questionnaire.' . $id . '.color_id' => 'required'
        ]);
        return $validated['questionnaire'][$id];
    }

    private function setValidatedData(Questionnaire $questionnaire, $data)
    {
        $questionnaire['name'] = $data['name'];
        $questionnaire['description'] = $data['description'];
        $questionnaire['icon_id'] = $data['icon_id'];
        $questionnaire['color_id'] = $data['color_id'];

        return $data;
    }

    private function orderContents(array $order)
    {
        $item_index = 0;

        foreach ($order as $key => $index)
        {
            // get the content with that id...
            $content = Content::where('id', '=', $index)->first();
            if ($content != null)
            {
                // ...and set its order_id to its designated position in the questionnaire
                $content->order_id = $key + 1;

                if ($content->type === 'item')
                {
                    $item_index = $index;
                }
                if ($content->isQuestion())
                {
                    $content->item_id = $item_index;
                }

                $content->update();
            }
        }
    }

    private function updateQuestionnaireOrder(array $order)
    {
        foreach ($order as $key => $id)
        {
            $questionnaire = Questionnaire::where('id', '=', $id)->first();
            if ($questionnaire != null)
            {
                $questionnaire->order_id = $key + 1;
                $questionnaire->timestamps = false;
                $questionnaire->save();
            }
        }
    }

    // returns an array with content ids as keys, each containing another array with
    // all of their answer ids as keys and the count of responses to that answer as value
    private function responses(Questionnaire $questionnaire)
    {
        // get all contents of questionnaire
        $contents = $questionnaire['contents'];

        // create an empty array to be returned later
        $responseArray = array();

        // loop over all contents
        foreach ($contents as $content)
        {
            // get all answers to current content
            $answers = $content['answers'];
            // add another array with content id as key
            $responseArray[$content['id']] = array();
            // get all responses to current content
            $responses = $content['responses'];

            // loop over all answers to current content
            foreach ($answers as $answer)
            {
                // initialize each answer is as key with a value of zero
                $responseArray[$content['id']][$answer['id']] = 0;
            }

            // loop over all responses to current content
            foreach ($responses as $response)
            {
                // loop over all answer ids contained in current response data
                foreach ($response['data']['answer_ids'] as $answer_id)
                {
                    // add one to answer count
                    $responseArray[$content['id']][$answer_id]++;
                }
            }
        }

        // return array containing relevant response data of questionnaire
        return $responseArray;
    }
}
