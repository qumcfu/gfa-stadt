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
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ColorCodeController extends Controller
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
        $colors = ColorCode::orderBy('id')->paginate(15);

        return view('colors.index', compact('colors'));
    }

    public function update(ColorCode $color): RedirectResponse
    {
        if (!Gate::allows('developer')) {
            abort(403);
        }

        $data = $this->validatedData($color['id']);
        $this->setValidatedData($color, $data);

        if($color->isDirty())
        {
            $color['editor_id'] = Auth::id();
            $color->updateRgbValues();
            $color->save();
        }

        return back()->with('success', __('Saved Changes.'));
    }

    private function validatedData($id = 0): array
    {
        $validated = request()->validate([
            'color.' . $id . '.name' => 'sometimes|max:128|unique:color_codes,name,' . $id,
            'color.' . $id . '.hex' => 'sometimes|min:4|max:9',
            'color.' . $id . '.is_bright' => 'nullable',
            'color.' . $id . '.category' => 'required'
        ]);
        return $validated['color'][$id];
    }

    private function setValidatedData(ColorCode $color, $data)
    {
        if(isset($data['name'])) $color['name'] = $data['name'];
        if(isset($data['hex'])) $color['hex'] = $data['hex'];
        $color['is_bright'] = $data['is_bright'] ?? null;
        $color['category'] = $data['category'];
    }
}
