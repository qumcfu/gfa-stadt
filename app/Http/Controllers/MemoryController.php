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

use App\Models\Memory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class MemoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('access-memories')) {
                Redirect::to('home')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $memories = Memory::all();

        return view('memories.index', compact('memories'));
    }

    public function memorize($contentId)
    {
        if($contentId == null)
        {
            return back()->with('error', __('Unable to find content.'));
        }

        $userId = Auth::user()->id ?? 0;
        $memory = Memory::where('user_id', '=', $userId)->first();
        if ($memory == null)
        {
            $memory = new Memory();
            $memory['user_id'] = $userId;
        }

        $memory['content_id'] = $contentId;
        $memory->save();

        return back()->with('success', __('Content :id has been cached.', ['id' => $contentId]));
    }

    public function forget(Memory $memory)
    {
        $memory['content_id'] = null;
        $memory->save();

        return back()->with('success', __('Memory buffer has been cleared.'));
    }

    public function destroy(Memory $memory)
    {
        $memory->delete();

        return back();
    }
}
