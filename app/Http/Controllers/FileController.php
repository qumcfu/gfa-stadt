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

use App\Models\File;
use App\Models\FileLink;
use App\Models\FileType;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
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
        $files = File::orderBy('id')->paginate(15);
        $projects = Project::all();
        $types = FileType::all();

        return view('files.index', compact('files', 'projects', 'types'));
    }

    public function store(Request $request): RedirectResponse
    {
        if (!Gate::allows('edit-projects')) {
            abort(403);
        }

        $data = $this->validatedData(0);

        $file = new File();
        $this->setValidatedData($file, $data);

        $uploadedFile = $request->file('files.*.file')[0];
        $this->saveUploadedFile($file, $uploadedFile);

        $file['author_id'] = Auth::id();

        $file->save();
        $file->createLink($file['project_id']);

        return back()->with('success', __('File has been uploaded.'));
    }

    public function storeLink(Request $request, File $file): RedirectResponse
    {
        if (!Gate::allows('edit-projects')) {
            abort(403);
        }

        $projectId = request()->validate(['links.*.project_id' => 'required|integer'])['links'][$file['id']]['project_id'] ?? 0;

        if($projectId === 0) return back()->with('error', __('File could not be added to project.'));

        $file->createLink($projectId);

        return back()->with('success', __('File has been added to project.'));
    }

    public function update(Request $request, File $file): RedirectResponse
    {
        if (!Gate::allows('edit-projects')) {
            abort(403);
        }

        $oldProjectId = $file['project_id'];

        $data = $this->validatedData($file['id']);
        $this->setValidatedData($file, $data);

        $uploadedFile = $request->file('files.*.file')[0] ?? null;
        if(isset($uploadedFile))
        {
            if(isset($file['path'])) Storage::disk('public')->delete($file['path']);
            $this->saveUploadedFile($file, $uploadedFile);
        }

        if($file->isDirty())
        {
            $file['editor_id'] = Auth::id();
            $file->save();

            if($file['project_id'] !== ($oldProjectId ?? 0))
            {
                if(!$file['is_global']) $file->unlinkAll();
                $file->createLink($file['project_id']);
            }
        }

        return back()->with('success', __('File has been updated.'));
    }

    public function link(File $file, Project $project): RedirectResponse
    {
        $file->createLink($project['id']);
        return back()->with('success', __('File is now visible in project.'));
    }

    public function unlink(File $file, Project $project): RedirectResponse
    {
        $file->removeLink($project['id']);
        return back()->with('success', __('File is now hidden in project.'));
    }

    public function unlinkAjax(File $file, Project $project): void
    {
        $file->removeLink($project['id']);
    }

    public function setDefault(FileLink $link): RedirectResponse
    {
        if(!in_array($link['file']['type']['shortname'], ['image', 'pdf', 'video'])) return back()->with('error', __('Files of this type cannot be set as default file.'));
        if($link['default'])
        {
            // if default flag is set already, remove it instead
            $link['default'] = false;
            $link->save();
            return back()->with('success', __('Removed default file status.'));
        }
        $link->setAsDefault();
        return back()->with('success', __(':thing has been updated.', ['thing' => __('Default File')]));
    }

    public function download(File $file): StreamedResponse
    {
        return Storage::disk('public')->download($file['path'], $file['name'] . '.' . $file['extension']);
    }

    public function destroy(File $file): RedirectResponse
    {
        if (!Gate::allows('edit-projects')) {
            abort(403);
        }

        if(isset($file['path'])) Storage::disk('public')->delete($file['path']);
        $file->unlinkAll();
        $file->delete();

        return back()->with('success', __(':thing has been deleted.', ['thing' => __('File')]));;
    }

    private function validatedData($id): array
    {
        return request()->validate([
            'files.*.name' => 'required|min:1|max:128',
            'files.*.project_id' => 'required|integer',
            'files.*.is_global' => ''
        ])['files'][$id];
    }

    private function setValidatedData(File $file, $data)
    {
        $file['name'] = $data['name'];
        $file['project_id'] = $data['project_id'];
        $file['is_global'] = $data['is_global'] ?? false;
    }

    private function saveUploadedFile(File $file, UploadedFile $uploadedFile)
    {
        $extension = $uploadedFile->extension();
        $file['type_id'] = FileType::where('extensions', 'LIKE', '%' . $extension . '%')->first()['id'] ?? 1;

        if($file['type']['shortname'] === 'image')
        {
            $file['width'] = getimagesize($uploadedFile)[0] ?? 0;
            $file['height'] = getimagesize($uploadedFile)[1] ?? 0;
        }

        $path = Storage::disk('public')->putFile($file['type']['folder'], $uploadedFile);

        $file['path'] = $path;
        $file['extension'] = $extension;
        $file['size'] = $uploadedFile->getSize();
    }
}
