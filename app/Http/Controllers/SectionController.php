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
use App\Models\Icon;
use App\Models\Section;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SectionController extends Controller
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

    public function index(): View
    {
        $sections = Section::all();
        $icons = Icon::where('available', '=', true)->orderBy('id')->get();
        $colors = ColorCode::all();

        return view('sections.index', compact('sections', 'icons', 'colors'));
    }

    public function update(Section $section): RedirectResponse
    {
        if (!Gate::allows('developer')) {
            abort(403);
        }

        $data = $this->validatedData($section['id']);
        $this->setValidatedData($section, $data);

        if($section->isDirty())
        {
            $section['editor_id'] = Auth::id();
            $section->save();
        }

        return back()->with('success', __('Saved Changes.'));
    }

    private function validatedData($id = 0): array
    {
        $validated = request()->validate([
            'section.' . $id . '.description' => 'sometimes|max:255',
            'section.' . $id . '.color_id' => 'required|integer',
            'section.' . $id . '.icon_id' => 'required|integer'
        ]);
        return $validated['section'][$id];
    }

    private function setValidatedData(Section $section, $data)
    {
        $section['description'] = $data['description'] ?? '';
        $section['color_id'] = $data['color_id'] ?? null;
        $section['icon_id'] = $data['icon_id'];
    }
}
