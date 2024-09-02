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

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function hasReplies() : bool
    {
        foreach ($this['replies'] as $reply)
        {
            if($reply['active']) return true;
            return $reply->hasReplies();
        }
        return false;
    }

    public function getReplyCount() : int
    {
        if(!$this->hasReplies()) return 0;
        $count = count($this['replies']);
        foreach ($this['replies'] as $reply)
        {
            $count += $reply->getReplyCount();
        }
        return $count;
    }

    public function getFormattedInfo(): string
    {
        $created = __('on :date', ['date' => $this['created_at']->format('d.m.Y')]) . ' ' . __('at :time', ['time' => $this['created_at']->format('H:i')]);
        $changed = ($this['updated_at'] == null || $this['updated_at'] == $this['created_at']) ? '' : (' (' . __($this['active'] ? 'last changed' : 'deleted') . ' ' . __('on :date', ['date' => $this['updated_at']->format('d.m.Y')]) . ' ' . __('at :time', ['time' => $this['updated_at']->format('H:i')]) . ')');

        return $this['author']['username'] . ' ' . $created . $changed;
    }

    // return timestamp of most recent reply
    public function getReplyTimestamp($level = 0)
    {
        $mostRecent = $this['created_at'];
        if($level > 255) return $mostRecent;

        foreach ($this['replies'] as $reply)
        {
            $replyTimestamp = $reply->getReplyTimestamp($level + 1);
            if($mostRecent < $replyTimestamp) $mostRecent = $replyTimestamp;
        }
        return $mostRecent;
    }

    public function deleteInactiveParents()
    {
        $parent = $this['comment'];
        if($parent != null && !$parent['active'])
        {
            $parent->deleteInactiveParents();
            $parent->delete();
        }
    }

    public function deleteInactiveChildren()
    {
        foreach($this['replies'] as $reply)
        {
            if(!$reply['active'])
            {
                $reply->deleteInactiveChildren();
                $reply->delete();
            }
        }
    }

    public function getUpvoteCount()
    {
        return count($this['upvotes']->where('active', '=', true));
    }

    public function getUpvoteForUserId($userId)
    {
        return $this['upvotes']->where('user_id', '=', $userId)->first();
    }

    public function getUpvoteTooltip()
    {
        $upvoteCount = $this->getUpvoteCount();
        $hasOwnUpvote = $this->getUpvoteForUserId(Auth::id())['active'] ?? false;

        if($hasOwnUpvote)
        {
            if($upvoteCount > 2) return __('You and :n others agree with this.', ['n' => $upvoteCount - 1]);
            if($upvoteCount === 2) return __('You and another participant agree with this.');
            if($upvoteCount === 1) return __('You agree with this.');
        }
        else
        {
            if($upvoteCount > 1) return __(':n participants agree with this.', ['n' => $upvoteCount - 1]);
            if($upvoteCount === 1) return __('1 participant agrees with this.');
        }
        return __('No one agrees with this.');
    }
}
