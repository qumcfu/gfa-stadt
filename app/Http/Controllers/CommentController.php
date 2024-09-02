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
use App\Models\Entry;
use App\Models\ProjectStage;
use App\Models\Upvote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                Redirect::to('home')->send();
            }
            return $next($request);
        });
    }

    public function store(Comment $comment)
    {
        if (Auth::id() == null) {
            abort(403);
        }

        $data = $this->validatedData($comment['id']);

        $reply = new Comment();
        $reply['comment_id'] = $comment['id'] ?? null;
        $reply['author_id'] = Auth::id();
        $reply['text'] = $data['text'];
        $reply->save();

        return back()->with('success', __('Your reply has been saved.'));
    }

    public function storeAjax(Content $content, ProjectStage $stage)
    {
        $text = $_POST['commentText'] ?? null;
        if($text == null) return;

        $entry = $content->getEntry($stage);

        if($entry == null)
        {
            $entry = new Entry();
            $entry['content_id'] = $content['id'];
            $entry['stage_id'] = $stage['id'];
            $entry->save();
        }

        $comment = new Comment();
        $comment['entry_id'] = $entry['id'];
        $comment['author_id'] = Auth::id();
        $comment['text'] = $text;
        $comment->save();

        return;
    }

    public function replyAjax(Comment $comment)
    {
        $text = $_POST['commentText'] ?? null;
        if($text == null) return;

        $reply = new Comment();
        $reply['comment_id'] = $comment['id'] ?? null;
        $reply['author_id'] = Auth::id();
        $reply['text'] = $text;
        $reply->save();

        return;
    }

    public function update(Comment $comment)
    {
        if (Auth::id() == null) {
            abort(403);
        }

        $data = $this->validatedData($comment['id']);

        $comment['text'] = $data['text'];
        if($comment->isDirty()) $comment->save();

        return back()->with('success', __('Your changes have been saved.'));
    }

    public function updateAjax(Comment $comment)
    {
        if($comment['author']['id'] !== Auth::id()) return;

        $text = $_GET['commentText'] ?? $comment['text'];
        $comment['text'] = $text;
        if($comment->isDirty()) $comment->save();

        return;
    }

    public function upvoteAjax(Comment $comment)
    {
        if (Auth::id() == null) {
            abort(403);
        }

        $upvote = $comment->getUpvoteForUserId(Auth::id());

        if($upvote == null)
        {
            $upvote = new Upvote();
            $upvote['comment_id'] = $comment['id'];
            $upvote['user_id'] = Auth::id();
            $upvote->save();
        }
        else
        {
            $upvote['active'] = !$upvote['active'];
            $upvote->save();
        }

        return;
    }

    public function destroy(Comment $comment)
    {
        $comment['text'] = null;
        $comment['active'] = false;

        return back()->with('success', __('Your reply has been deleted.'));
    }

    public function destroyAjax(Comment $comment)
    {
        if($comment['author']['id'] !== Auth::id()) return;

        if($comment->hasReplies())
        {
            $comment['text'] = null;
            $comment['active'] = false;
            if($comment->isDirty()) $comment->save();
        }
        else
        {
            $comment->deleteInactiveChildren();
            $comment->deleteInactiveParents();
            $comment->delete();
        }

        return;
    }

    private function validatedData($id)
    {
        return request()->validate([
            'comment.' . $id . '.text' => 'required'
        ])['comment'][$id];
    }
}
