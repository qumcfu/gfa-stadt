<?php

use App\Http\Controllers\AppraisalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColorCodeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DevController;
use App\Http\Controllers\EffectController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MemoryController;
use App\Http\Controllers\MigrationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectSettingsController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ScopingController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\ScriptController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Mail\StatusMail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::get('/email', function () {
    Mail::to('a.sibilis@yahoo.de')->send(new StatusMail());
    return new StatusMail();
});

// auth routes helper here so individual routes can be overwritten
Auth::routes();
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login');
});

// Users
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users');
    Route::get('/users/memberships/{user}', 'memberships')->name('users.memberships');
    Route::get('/users/create', 'create')->name('users.create');
    Route::get('/users/registration', 'registration')->name('users.registration');
    Route::get('/users/{user}', 'show')->name('users.show');
    Route::get('/users/edit/{user}', 'edit')->name('users.edit');
    Route::get('/users/delete/{user}', 'tryToDelete')->name('users.try-to-delete');

    Route::post('/users', 'store')->name('users.store');
    Route::post('/users/register', 'register')->name('users.register');
    Route::put('/users/reorder', 'reorder')->name('users.reorder');
    Route::put('/users/update/{user}', 'update')->name('users.update');
    Route::put('/users/update-pw', 'updatePassword')->name('users.update-password');
    Route::put('/users/impersonate/{user}', 'impersonate')->name('users.impersonate');
    Route::put('/users/disable/{user}', 'disable')->name('users.disable');
    Route::put('/users/enable/{user}', 'enable')->name('users.enable');

    Route::delete('/users/delete/{user}', 'destroy')->name('users.delete');
});

// User Groups
Route::controller(UserGroupController::class)->group(function () {
    Route::get('/user-groups', 'index')->name('user-groups');
    Route::get('/user-groups/create', 'create')->name('user-groups.create');
    Route::get('/user-groups/edit/{group}', 'edit')->name('user-groups.edit');
    Route::get('/user-groups/delete/{group}', 'tryToDelete')->name('user-groups.delete');

    Route::post('/user-groups', 'store')->name('user-groups.store');
    Route::put('/user-groups/disable/{group}', 'disable')->name('user-groups.disable');
    Route::put('/user-groups/enable/{group}', 'enable')->name('user-groups.enable');
    Route::put('/user-groups/transfer', 'transfer')->name('user-groups.transfer');
    Route::put('/user-groups/{group}', 'update')->name('user-groups.update');

    Route::delete('/user-groups/delete/{group}', 'destroy')->name('user-groups.destroy');
});

Route::put('/user-groups/{group}/{section}', 'App\Http\Controllers\UserGroupController@updateAccess');

// Projects
Route::controller(ProjectController::class)->group(function () {
    Route::get('/projects', 'index')->name('projects');
    Route::get('/projects/memberships/{project}', 'memberships')->name('projects.memberships');
    Route::get('/projects/files/{project}', 'files')->name('projects.files');
    // same page but for project leads:
    Route::get('/projects/{project}/files', 'filesLead')->name('projects.files-lead');

    Route::post('/projects', 'store')->name('projects.store');
    Route::put('/projects/reorder', 'reorder')->name('projects.reorder');
    Route::put('/projects/update/{project}', 'update')->name('projects.update');
    Route::put('/projects/enroll', 'enroll')->name('projects.enroll');

    Route::delete('/projects/delete/{project}', 'destroy')->name('projects.destroy');
});

// Project Settings
Route::controller(ProjectSettingsController::class)->group(function () {
    Route::put('/projects/settings/update/{settings}', 'update')->name('project-settings.update');
});

// Memberships
Route::controller(MembershipController::class)->group(function () {
    Route::get('/memberships', 'index')->name('memberships');

    Route::post('/memberships', 'store')->name('memberships.store');
    Route::put('/memberships/update/{membership}', 'update')->name('memberships.update');
    Route::put('/memberships/reorder', 'reorder')->name('memberships.reorder');
    Route::put('/memberships/disable/{membership}', 'disable')->name('memberships.disable');
    Route::put('/memberships/enable/{membership}', 'enable')->name('memberships.enable');
    Route::put('/memberships/ajax/updateRole/{membership}/{role}', 'updateRoleAjax')->name('memberships.ajax-update-role');
    Route::put('/memberships/ajax/toggleActive/{membership}', 'toggleActiveAjax')->name('memberships.ajax-toggle-active');

    Route::delete('/memberships/delete/{membership}', 'destroy')->name('memberships.destroy');
});

// Screening
Route::controller(ScreeningController::class)->group(function () {
    Route::get('screening/view/{membership}/{page}', 'view')->name('screening.view');
    Route::get('screening/summary/{membership}', 'summary')->name('screening.summary');
    Route::get('screening/loading/{project}', 'loading')->name('screening.loading');
    Route::get('screening/report/{project}', 'report')->name('screening.report');
    Route::get('screening/comments/{project}', 'comments')->name('screening.comments');

    Route::put('screening/view/{membership}/{page}', 'view')->name('screening.view.put');
    Route::put('screening/update/{membership}/{page}', 'update')->name('screening.update');
    Route::put('screening/updateReport/{project}', 'updateReport')->name('screening.update-report');
    Route::put('screening/summary/{membership}', 'summary')->name('screening.summary.put');
    Route::put('screening/report/{project}', 'report')->name('screening.report.put');
    Route::put('screening/comments/{project}', 'comments')->name('screening.comments.put');
    Route::put('screening/dashboard/{membership}', 'dashboard')->name('screening.dashboard');
})->middleware('Auth');

// Scoping
Route::controller(ScopingController::class)->group(function () {
    Route::get('scoping/view/{project}', 'view')->name('scoping.view');
    Route::put('scoping/conclude/{project}', 'conclude')->name('scoping.conclude');
})->middleware('Auth');;

// Appraisal
Route::controller(AppraisalController::class)->group(function () {
    Route::get('appraisal/view/{membership}/{page}', 'view')->name('appraisal.view');
    Route::get('appraisal/summary/{membership}', 'summary')->name('appraisal.summary');
    Route::get('appraisal/loading/{project}', 'loading')->name('appraisal.loading');
    Route::get('appraisal/report/{project}', 'report')->name('appraisal.report');
    Route::get('appraisal/info/{membership}/{page}', 'info')->name('appraisal.info');
    Route::get('appraisal/comments/{project}', 'comments')->name('appraisal.comments');
    Route::get('appraisal/documentation', 'documentation')->name('appraisal.documentation');

    Route::put('appraisal/view/{membership}/{page}', 'view')->name('appraisal.view.put');
    Route::put('appraisal/update/{membership}/{page}', 'update')->name('appraisal.update');
    Route::put('appraisal/updateReport/{project}', 'updateReport')->name('appraisal.update-report');
    Route::put('appraisal/summary/{membership}', 'summary')->name('appraisal.summary.put');
    Route::put('appraisal/report/{project}', 'report')->name('appraisal.report.put');
    Route::put('appraisal/comments/{project}', 'comments')->name('appraisal.comments.put');
    Route::put('appraisal/dashboard/{membership}', 'dashboard')->name('appraisal.dashboard');
})->middleware('Auth');;

// Comments
Route::controller(CommentController::class)->group(function () {
    Route::post('/comments/store/{comment}', 'store')->name('comments.store');
    Route::put('/comments/update/{comment}', 'update')->name('comments.update');

    Route::delete('/comments/delete/{comment}', 'destroy')->name('comments.destroy');

    Route::post('/comments/ajax/store/{content}/{stage}', 'storeAjax')->name('comments.ajax-store');
    Route::post('/comments/ajax/reply/{comment}', 'replyAjax')->name('comments.ajax-reply');
    Route::get('/comments/ajax/update/{comment}', 'updateAjax')->name('comments.ajax-update'); // should be a put route
    Route::put('/comments/ajax/upvote/{comment}', 'upvoteAjax')->name('comments.ajax-upvote');
    Route::delete('/comments/ajax/delete/{comment}', 'destroyAjax')->name('comments.ajax-destroy');
});

// Questionnaires
Route::controller(QuestionnaireController::class)->group(function () {
    Route::get('/questionnaires', 'index')->name('questionnaires');
    Route::get('/questionnaires/create', 'create')->name('questionnaires.create');
    Route::get('/questionnaires/edit/{questionnaire}', 'edit')->name('questionnaires.edit');
    Route::get('/questionnaires/preview/{questionnaire}', 'preview')->name('questionnaires.preview');

    Route::post('/questionnaires', 'store')->name('questionnaires.store');
    Route::put('/questionnaires/reorder', 'reorder')->name('questionnaires.reorder');
    Route::put('/questionnaires/update/{questionnaire}', 'update')->name('questionnaires.update');
    Route::put('/questionnaires/{questionnaire}/createQuestion', 'updateAndCreateQuestion')->name('questionnaires.update-and-create');

    Route::delete('/questionnaires/delete/{questionnaire}', 'destroy')->name('questionnaires.destroy');
});

Route::get('/questionnaires/{questionnaire}', 'App\Http\Controllers\QuestionnaireController@show');

// Contents
Route::controller(ContentController::class)->group(function () {
    Route::get('/questionnaires/{questionnaire}/contents/create/{index}', 'create')->name('contents.create');
    Route::get('/questionnaires/{questionnaire}/contents/edit/{content}', 'edit')->name('contents.edit');
    Route::get('/questionnaires/{questionnaire}/contents/delete/{content}', 'delete')->name('contents.delete');

    Route::post('/questionnaires/{questionnaire}/contents', 'store')->name('contents.store');
    Route::post('/copy/{memory}/{questionnaire}/{index}', 'copy')->name('contents.copy');
    Route::put('/questionnaires/{questionnaire}/contents/{content}', 'update')->name('contents.update');

    Route::delete('/questionnaires/{questionnaire}/contents/delete/{content}', 'destroy')->name('contents.destroy');
});

// Configurations
Route::controller(ConfigurationController::class)->group(function () {
    Route::get('/configurations', 'index')->name('configurations');
    Route::get('/configurations/edit/{component}', 'editComponent')->name('configurations.edit');

    Route::put('/configurations/save/chart/{chartType}/{chartSize}/{valueType}/{interpolationMode}', 'saveChartInfo')->name('configurations.saveChartInfo');
    Route::put('/configurations/save/screening/chart/{active}', 'saveScreeningChart')->name('configurations.saveScreeningChart');
    Route::put('/configurations/update/{component}', 'updateComponent')->name('component.update');
});

// Memories
Route::controller(MemoryController::class)->group(function () {
    Route::get('/memories', 'index')->name('memories');

    Route::put('/memorize/{contentId}', 'memorize')->name('memories.memorize');
    Route::put('/forget/{memory}', 'forget')->name('memories.forget');

    Route::delete('/memories/delete/{memory}', 'destroy')->name('memories.destroy');
});

Route::get('/imprint', function () {
    return view('legal/imprint');
});

// Data
Route::controller(DataController::class)->group(function () {
    Route::get('/data', 'index')->name('data');
    Route::get('/data/export/db', 'exportDb')->name('data.export');
});

// Scripts
Route::controller(ScriptController::class)->group(function () {
    Route::get('/scripts', 'index')->name('scripts');
    Route::get('/scripts/create', 'create')->name('scripts.create');
    Route::get('/scripts/create/{position}', 'create')->name('scripts.create-at');
    Route::get('/scripts/edit/{script}', 'edit')->name('scripts.edit');
    Route::get('/scripts/execute/{script}/scoping/{scoping}', 'execute')->name('scripts.execute.scoping');

    Route::post('/scripts', 'store')->name('scripts.store');
    Route::put('/scripts/update/{script}', 'update')->name('scripts.update');
    Route::put('/scripts/reorder', 'reorder')->name('scripts.reorder');

    Route::delete('/scripts/delete/{script}', 'destroy')->name('scripts.destroy');
});

Route::post('/data/import/db', 'App\Http\Controllers\DataController@importDb')->name('data.import');

// Pages
Route::controller(PageController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/about', 'about')->name('pages.about');
    Route::get('/legal', 'legal')->name('pages.legal');
    Route::get('/privacy', 'privacy')->name('pages.privacy');
    Route::get('/home', 'index')->name('home');
});

// Files
Route::controller(FileController::class)->group(function () {
    Route::get('/files', 'index')->name('files');
    Route::get('/files/download/{file}', 'download')->name('files.download');
    Route::post('/files', 'store')->name('files.store');
    Route::post('/files/link/{file}', 'storeLink')->name('files.store-link');
    Route::put('/files/link/{file}/{project}', 'link')->name('files.link');
    Route::put('/files/default/{link}', 'setDefault')->name('files.default');
    Route::put('/files/update/{file}', 'update')->name('files.update');
    Route::put('/files/unlink/{file}/{project}', 'unlink')->name('files.unlink');
    Route::delete('/files/delete/{file}', 'destroy')->name('files.destroy');

    Route::put('/files/ajax/unlink/{file}/{project}', 'unlinkAjax')->name('files.ajax-unlink');
});

// Dev
Route::controller(DevController::class)->group(function () {
    Route::get('/dev', 'index')->name('dev');
    Route::get('/dev/route-cache', 'cacheRoutes')->name('dev.route-cache');
    Route::get('/dev/cache-clear', 'clearCache')->name('dev.cache-clear');
    Route::get('/dev/route-clear', 'clearRouteCache')->name('dev.route-clear');
    Route::get('/dev/optimize-clear', 'optimizeClear')->name('dev.optimize-clear');
    Route::get('/dev/create-symlink', 'createSymlink')->name('dev.create-symlink');
    Route::get('/dev/queue-restart', 'queueRestart')->name('dev.queue-restart');
    Route::get('/dev/reevaluate-projects', 'reevaluateProjects')->name('dev.reevaluate-projects');
    Route::get('/dev/reevaluate-stages', 'reevaluateStages')->name('dev.reevaluate-stages');
    Route::get('/maintenance/down', 'down')->name('maintenance.down');
    Route::get('/maintenance/up', 'up')->name('maintenance.up');
    Route::post('/dev/migrate/refresh', 'refreshMigration')->name('dev.migrate-refresh');
    Route::post('/dev/seed', 'seed')->name('dev.seed');
});

// Sections
Route::controller(SectionController::class)->group(function () {
    Route::get('/sections', 'index')->name('sections');
    Route::put('/sections/update/{section}', 'update')->name('sections.update');
});

// Colors
Route::controller(ColorCodeController::class)->group(function () {
    Route::get('/colors', 'index')->name('colors');
    Route::put('/colors/update/{color}', 'update')->name('colors.update');
});

// Effects
Route::controller(EffectController::class)->group(function () {
    Route::get('/effects', 'index')->name('effects');
    Route::post('/effects', 'store')->name('effects.store');
    Route::put('/effects/update/{effect}', 'update')->name('effects.update');

    Route::delete('/effects/delete/{effect}', 'destroy')->name('effects.destroy');
});

// Migrations
Route::controller(MigrationController::class)->group(function () {
    Route::get('/migrations', 'index')->name('migrations.index');
    Route::post('/migrate/{index}', 'migrate')->name('migrations.migrate');
});

// i18n
Route::get('/change-language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de']))
    {
        abort(400);
    }

    App::setLocale($locale);
    // Session
    session()->put('locale', $locale);

    return redirect()->back();
});
