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

use App\Models\Project;
use App\Models\ProjectStage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class DevController extends Controller
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
        if (!Gate::allows('developer')) abort(403);
        return view('dev.index');
    }

    public function cacheRoutes(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));
        Artisan::call('route:cache');
        return back()->with('success', __('Routes have been cached.'));
    }

    public function clearCache(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));
        Artisan::call('cache:clear');
        return back()->with('success', __('Application cache has been cleared.'));
    }

    public function clearRouteCache(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));
        Artisan::call('route:clear');
        return back()->with('success', __('Route cache has been cleared.'));
    }

    public function optimizeClear(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));
        Artisan::call('optimize:clear');
        return back()->with('success', __('All caches have been cleared.'));
    }

    public function createSymlink(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));
        Artisan::call('storage:link');
        return back()->with('success', __('Symbolic link has been created.'));
    }

    public function queueRestart(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));
        Artisan::call('queue:restart');
        return back()->with('success', __('Queue has been restarted.'));
    }

    public function reevaluateProjects(): RedirectResponse
    {
        $evaluationCount = 0;
        $correctionCount = 0;

        $projects = Project::all();

        foreach($projects as $project)
        {
            $evaluationCount++;
            if ($project->updateScreeningCount()) $correctionCount++;
            if ($project->updateAppraisalCount()) $correctionCount++;
        }

        return back()->with('success', __(':n projects have been evaluated. :m corrections were made.', ['n' => $evaluationCount, 'm' => $correctionCount]));
    }

    public function reevaluateStages(): RedirectResponse
    {
        $evaluationCount = 0;
        $correctionCount = 0;

        $stages = ProjectStage::all();
        set_time_limit(300);

        foreach ($stages as $stage)
        {
            $complete = $stage->getProgress() > 0.997;
            $stage['complete'] = $complete ? 1 : 0;
            if($stage->isDirty() || $stage->updateEntryCount())
            {
                $stage->timestamps = false;
                $stage->save();
                $correctionCount++;
            }
            $evaluationCount++;
        }

        return back()->with('success', __(':n stages have been evaluated. :m corrections were made.', ['n' => $evaluationCount, 'm' => $correctionCount]));
    }

    public function down(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));

        $data = request()->validate([
            'maintenance.secret' => 'required'
        ]);

        $secret = $data['maintenance']['secret'];

        Artisan::call('down --render="dev.maintenance" --secret="' . $secret . '"');
        return redirect('/' . $secret)->with('success', __('The app has been set to maintenance mode.'));
    }

    public function up(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));
        Artisan::call('up');
        return back()->with('success', __('The app has been set to production mode.'));
    }

    // Migrations
    public function refreshMigration(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));

        $data = request()->validate([
            'migrate.path' => 'required'
        ]);

        $path = $data['migrate']['path'];

        Artisan::call('migrate:refresh --path="database/migrations/' . $path . '"');
        return back()->withInput()->with('success', __('Migration has been refreshed: :path.', ['path' => __(':quote', ['quote' => $path])]));
    }

    // Seeders
    public function seed(): RedirectResponse
    {
        if (!Gate::allows('developer')) return back()->with('error', __('You don\'t have the permission to do so.'));

        $data = request()->validate([
            'seed.class' => 'required'
        ]);

        $class = $data['seed']['class'];

        Artisan::call('db:seed --class="' . $class . '"');
        return back()->with('success', __('Table has been seeded: :seeder.', ['seeder' => __(':quote', ['quote' => $class])]));
    }
}
