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

use App\Models\Effect;
use App\Models\EffectType;
use App\Models\Questionnaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EffectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('access-effects')) {
                Redirect::to('home')->send();
            }
            return $next($request);
        });
    }

    public function index(): View
    {
        $effects = Effect::orderBy('content_id')->paginate(15);
        $types = EffectType::all();

        $questionnaires = Questionnaire::all();

        return view('effects.index', compact('effects', 'types', 'questionnaires'));
    }

    public function store(): RedirectResponse
    {
        if (!Gate::allows('create-effects')) {
            abort(403);
        }

        $data = $this->validatedData(0);

        $effect = new Effect();
        $this->setValidatedData($effect, $data);

        $effect['author_id'] = Auth::id();

        $effect->save();

        return back()->with('success', __('Effect has been created.'));
    }

    public function update(Effect $effect): RedirectResponse
    {
        if (!Gate::allows('edit-effects')) {
            abort(403);
        }

        $data = $this->validatedData($effect['id']);

        if(!isset($effect['content_id']) && !isset($data['content_id'])){
            return back()->with('error', __('Error code :code.', ['code' => 'EFC-U-1']));;
        }

        $this->setValidatedData($effect, $data);

        if($effect->isDirty())
        {
            $effect['editor_id'] = Auth::id();
            $effect->save();
        }

        return back()->with('success', __('Saved Changes.'));
    }

    public function destroy(Effect $effect): RedirectResponse
    {
        if (!Gate::allows('delete-effects')) {
            abort(403);
        }

        $effect->delete();

        return back()->with('success', __(':thing has been deleted.', ['thing' => __('Effect')]));
    }

    private function validatedData($id = 0): array
    {
        $validated = request()->validate([
            'effects.' . $id . '.content_id' => 'sometimes|integer',
            'effects.' . $id . '.effect_type_id' => 'required|integer',
            'effects.' . $id . '.size_y' => 'required|integer',
            'effects.' . $id . '.size_n' => 'required|integer'
        ]);
        return $validated['effects'][$id];
    }

    private function setValidatedData(Effect $effect, $data): void
    {
        if(isset($data['content_id'])) $effect['content_id'] = $data['content_id'];
        $effect['effect_type_id'] = $data['effect_type_id'];
        $effect['size_y'] = $data['size_y'];
        $effect['size_n'] = $data['size_n'];
    }
}
