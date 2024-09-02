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
use App\Models\Color;
use App\Models\Content;
use App\Models\ContentState;
use App\Models\EffectType;
use App\Models\Memory;
use App\Models\Questionnaire;
use App\Models\ContentType;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            // if user is not logged in or does not have access to questionnaires...
            if (!Auth::user() || !Auth::user()->hasPermission('questionnaires', 'access'))
            {
                // redirect to home screen
                Redirect::to('home')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $contents = Content::all();

        return view('contents.survey', compact('contents'));
    }

    public function create(Questionnaire $questionnaire, int $index)
    {
        $questionnaires = Questionnaire::orderBy('order_id')->get();
        $content = new Content();
        $contentTypes = ContentType::where('type', '=', 'default')->orWhere('type', '=', 'group')->get();

        return view('contents.create', compact('questionnaire', 'questionnaires', 'content', 'contentTypes', 'index'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data = $this->prepareJsonData($this->validatedData());

        $orderId = $data['content']['order_id'] ?? 1;
        $this->shiftSubsequentContents($questionnaire->id, $orderId, 1);

        $data['content']['author_id'] = Auth::user()->id;
        $data['content']['questionnaire_id'] = $questionnaire->id;

        $content = $questionnaire->contents()->create($data['content']);

        return redirect('/questionnaires/edit/' . $questionnaire->id);
    }

    public function copy(Memory $memory, Questionnaire $questionnaire, int $index)
    {
        $original = Content::where('id', '=', $memory['content_id'])->first();

        if($original == null)
        {
            return back()->with('error', __('Unable to find content.'));
        }

        $this->shiftSubsequentContents($original->questionnaire['id'], $index, 1);

        $copy = new Content();
        $copy['questionnaire_id'] = $questionnaire['id'];
        $copy['order_id'] = $index;
        $copy['type_id'] = $original['type_id'];
        $copy['priority'] = $original['priority'];
        $copy['text'] = $original['text'];
        $copy['short'] = $original['short'];
        $copy['info'] = $original['info'];
        $copy['author_id'] = Auth::user()['id'];
        $copy['data'] = $original['data'];
        $copy->save();

        $memory['content_id'] = null;
        $memory->save();

        return back()->with('success', __('Copied content to :name questionnaire.', ['name' => $questionnaire['name']]));

    }

    public function edit(Questionnaire $questionnaire, Content $content): View
    {
        $questionnaires = Questionnaire::orderBy('order_id')->get();
        $contentTypes = ContentType::where('type', '=', 'default')->orWhere('type', '=', 'group')->get();

        $effects = $content['effects'];
        $effectTypes = EffectType::all();

        return view('contents.edit', compact('questionnaire', 'questionnaires', 'content', 'contentTypes', 'effects', 'effectTypes'));
    }

    public function update(Questionnaire $questionnaire, Content $content)
    {
        // validate request data, prepare 'data' array and convert it to json
        $data = $this->prepareJsonData($this->validatedData());

        // make snapshot of old content state
        $this->makeSnapshot($content);

        // update the content
        $data['content']['editor_id'] = Auth::user()->id ?? null;
        $content->update($data['content']);

        // return to questionnaire
        return redirect('/questionnaires/edit/' . $questionnaire->id)->with('success', __('Saved Changes to Content #:no.', ['no' => $content->order_id ?? '?']));
    }

    public function delete(Questionnaire $questionnaire, Content $content)
    {
        return view('contents.delete', compact('questionnaire', 'content'));
    }

    public function destroy(Questionnaire $questionnaire, Content $content)
    {
        // make snapshot of old content state
        $this->makeSnapshot($content);

        $this->shiftSubsequentContents($questionnaire->id, $content->order_id, -1);

        $content->answers()->delete();
        $content['entries']->delete();
        $content->delete();

        return redirect('/questionnaires/edit/' . $questionnaire->id);
    }

    private function validatedData()
    {
        return request()->validate([
            'content.text' => 'required|min:1|max:512',
            'content.short' => 'sometimes|max:255',
            'content.info' => 'sometimes|max: 2048',
            'content.type_id' => 'required',
            'content.priority' => 'required|gte:0',
            'content.order_id' => 'required',
            'data.*' => '',
        ]);
    }

    private function prepareJsonData($data)
    {
        if (!array_key_exists('data', $data))
        {
            $data['data'] = [];
        }

        $data_array = [];
        foreach ($data['data'] as $key => $entry)
        {
            $data_array[$key] = $entry;
            if (is_array($entry))
            {
                foreach ($entry as $sub_key => $sub_entry)
                {
                    $data_array[$key][$sub_key] = $sub_entry;
                }
            }
        }
        $data['content']['data'] = json_encode($data_array);

        return $data;
    }

    // shifts the contents' positions within the questionnaire
    private function shiftSubsequentContents($questionnaireId, $orderId, $amount)
    {
        $subsequentContents = Content::where([['questionnaire_id', '=', $questionnaireId], ['order_id', '>=', $orderId]])->get();

        foreach ($subsequentContents as $content)
        {
            $content->order_id += $amount;
            $content->timestamps = false;
            $content->save();
        }
    }

    private function makeSnapshot($content)
    {
        $snapshot = new ContentState();

        $snapshot['original_id'] = $content['id'];
        $snapshot['questionnaire_id'] = $content['questionnaire_id'];
        $snapshot['order_id'] = $content['order_id'];
        $snapshot['type_id'] = $content['type_id'];
        $snapshot['priority'] = $content['priority'];
        $snapshot['text'] = $content['text'];
        $snapshot['short'] = $content['short'];
        $snapshot['info'] = $content['info'];
        $snapshot['author_id'] = $content['author_id'];
        $snapshot['editor_id'] = $content['editor_id'];
        $snapshot['data'] = $content['data'];

        $snapshot->save();
    }
}
