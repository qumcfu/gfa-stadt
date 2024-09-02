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

use App\Models\Scoping;
use App\Models\Script;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ScriptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([]);

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('access-scripts')) {
                Redirect::to('home')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $scripts = Script::orderBy('order_id')->paginate(10);

        return view('scripts.index', compact('scripts'));
    }

    public function create($position = null)
    {
        if (!Gate::allows('create-scripts')) {
            abort(403);
        }

        $index = $position ?? Script::all()->count() + 1;

        return view('scripts.create', compact('index'));
    }

    public function store()
    {
        if (!Gate::allows('create-scripts')) {
            abort(403);
        }

        $data = $this->validatedData();

        $script = new Script();
        $this->setValidatedData($script, $data);

        $script['author_id'] = Auth::user()['id'];
        $script['order_id'] =  $data['order_id'] ?? Script::all()->count() + 1;

        $script->save();

        Storage::put('public/scripts/' . $script['id'] . '.R', $this->getScriptContents($script['code'] ?? ''));

        $this->shiftSubsequentScripts($script, 1);

        return redirect('/scripts')->with('success', __(':thing has been created.', ['thing' => __('Script')]));
    }

    public function edit(Script $script)
    {
        if (!Gate::allows('edit-scripts')) {
            abort(403);
        }

        return view('scripts.edit', compact('script'));
    }

    public function update(Script $script)
    {
        if (!Gate::allows('edit-scripts')) {
            abort(403);
        }

        $data = $this->validatedData($script['id']);
        $this->setValidatedData($script, $data);

        if($script->isDirty())
        {
            $script['editor_id'] = Auth::user()['id'];
            $script->save();
        }

        Storage::put('public/scripts/' . $script['id'] . '.R', $this->getScriptContents($script['code'] ?? ''));

        return redirect('/scripts')->with('success', __('Saved Changes.'));
    }

    public function destroy(Script $script)
    {
        if (!Gate::allows('delete-scripts')) {
            abort(403);
        }

        $name = $script['name'];
        $script->delete();
        $this->shiftSubsequentScripts($script, -1);

        return back()->with('success', __(':thing :name has been deleted.', ['thing' => __('Script'), 'name' => $name]));;
    }

    public function execute(Script $script, Scoping $scoping)
    {
        $data = json_decode($scoping->data, true);
        $entries = $data['entries'] ?? [];
        $population = $entries['residents']['value'] ?? 0;
        $male = $entries['gender']['male'] ?? 0;
        $female = $entries['gender']['female'] ?? 0;
        exec('Rscript ' . Storage::path('public/scripts/' . $script->id . '.R') . ' ' . $population . ' ' . $male . ' ' . $female, $response);

        $results = json_decode($response[0] ?? [], true);

        $entries['mortality']['value'] = $results['mortality'] ?? null;
        $entries['cardio']['value'] = $results['cardio'] ?? null;
        $entries['diabetes']['value'] = $results['diabetes'] ?? null;
        $entries['dementia']['value'] = $results['dementia'] ?? null;

        $data['entries'] = $entries;
        $scoping['data'] = json_encode($data);
        $scoping->save();

        return back();
    }

    public function reorder()
    {
        $order = \request()['order'] ?? null;
        if ($order != null)
        {
            $order = json_decode($order, true);
            $this->updateScriptOrder($order);
        }

        return back();
    }

    private function updateScriptOrder(array $order)
    {
        foreach ($order as $key => $id)
        {
            $script = Script::where('id', '=', $id)->first();
            if ($script != null)
            {
                $script->order_id = $key + 1;
                $script->timestamps = false;
                $script->save();
            }
        }
    }

    private function shiftSubsequentScripts(Script $script, int $amount)
    {
        $subsequents = Script::where('order_id', '>=', $script->order_id)->get();
        foreach ($subsequents as $subsequent)
        {
            if ($subsequent['id'] === $script['id']) continue;
            $subsequent['order_id'] = $subsequent['order_id'] + $amount;
            $subsequent->timestamps = false;
            $subsequent->save();
        }
    }

    private function getScriptContents($code)
    {
        $contents = Storage::get('public/scripts/input.R') . $code . Storage::get('public/scripts/output.R');

        return $contents;
    }

    private function validatedData($id = 0)
    {
        return request()->validate([
            'name' => 'required|max:128|unique:scripts,name,' . $id,
            'code' => 'nullable',
            'order_id' => 'nullable'
        ]);
    }

    private function setValidatedData(Script $script, $data)
    {
        $script['name'] = $data['name'];
        $script['code'] = $data['code'] ?? null;
    }
}
