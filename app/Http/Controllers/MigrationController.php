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
use App\Models\Entry;
use App\Models\ProjectStage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class MigrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('developer')) {
                Redirect::to('home')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        if (!Gate::allows('developer')) {
            abort(403);
        }
        return view('migrations.index');
    }

    public function migrate(int $index)
    {
        if (!Gate::allows('developer'))
        {
            return back()->with('error', __('You don\'t have the permission to do so.'));
        }

        switch($index)
        {
            // v0.1.4 > v0.2.0
            case 1:
                foreach(Entry::all() as $entry)
                {
                    if($entry['comments'] != null)
                    {
                        $comment = $entry['comment'];
                        if($comment == null) $comment = new Comment();
                        $comment['entry_id'] = $entry['id'];
                        $comment['author_id'] = $entry['stage']['membership']['user']['id'];
                        $comment['text'] = $entry['comments'];
                        $comment->save();

                        $entry['comments'] = null;
                        $entry->timestamps = false;
                        $entry->save();
                    }
                }
                return back()->with('success', __('Comments have been migrated to v0.2.0.'));
            case 2:
                foreach (ProjectStage::all() as $stage)
                {
                    $entryA = Entry::where('stage_id', '=', $stage['id'])->where('content_id', '=', 2)->first();
                    $entryB = Entry::where('stage_id', '=', $stage['id'])->where('content_id', '=', 4)->first();
                    if(isset($entryB))
                    {
                        $positive = max($entryA['positive'] ?? -2, $entryB['positive'] ?? -2);
                        $negative = max($entryA['negative'] ?? -2, $entryB['negative'] ?? -2);
                        $potential = max($entryA['potential'] ?? -2, $entryB['potential'] ?? -2);
                        $commentA = $entryA['comment'];
                        $commentB = $entryB['comment'];
                        if(isset($commentA) || isset($commentB))
                        {
                            if(!isset($commentA))
                            {
                                $commentB['entry_id'] = $entryA['id'];
                                $commentB->save();
                            }
                            else if(isset($commentB))
                            {
                                $commentA['text'] .= '; ' . $commentB['text'];
                                $commentA->save();
                                $commentB->delete();
                            }
                        }
                        if($positive > -2) $entryA['positive'] = $positive;
                        if($negative > -2) $entryA['negative'] = $negative;
                        if($potential > -2) $entryA['potential'] = $potential;
                        if($entryA->isDirty()) $entryA->save();
                        $entryB->delete();
                    }
                }
                // handle entries made on vulnerable groups
                $entries = Entry::whereBetween('content_id', [103, 109])->get();
                foreach ($entries as $entry)
                {
                    $entry['content_id'] += 3;
                    $entry->save();
                }
                $moreEntries = Entry::where('content_id', '=', 102)->get();
                foreach($moreEntries as $entry)
                {
                    $entry['content_id'] = 103;
                    $entry->save();
                }

                return back()->with('success', __('Entries have been migrated to v0.3.1.'));
        }

        return back()->with('warning', __('Migration could not be found.'));
    }

}
