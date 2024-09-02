<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Project;
use App\Models\Content;
use App\Models\ProjectStage;
use App\Models\Questionnaire;
use App\Models\Score;
use App\Models\Script;
use App\Models\User;
use App\Models\UserGroup;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('pages.about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('About :topic', ['topic' => config('app.name', 'APP_NAME')]), route('pages.about'));
});

// Home > Legal
Breadcrumbs::for('pages.legal', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Legal Notice'), route('pages.legal'));
});

// Home > Privacy
Breadcrumbs::for('pages.privacy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Privacy Statement'), route('pages.privacy'));
});

// Home > Users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('User Management'), route('users'));
});

// Home > Users > Memberships
Breadcrumbs::for('users.memberships', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users');
    $trail->push(__('Memberships of :user', ['user' => $user['username'] ?? __('Unknown User')]), route('users.memberships', $user));
});

// Home > Users > Create
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push(__('New User Account'), route('users.create'));
});

// Home > Registration
Breadcrumbs::for('users.registration', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Registration'), route('users.registration'));
});

// Home > Users > Edit
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users');
    $trail->push(__('Edit User :user', ['user' => $user->username]), route('users.edit', $user));
});

// Home > User Groups
Breadcrumbs::for('user-groups', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('User Groups'), route('user-groups'));
});

// Home > User Groups > Create
Breadcrumbs::for('user-groups.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user-groups');
    $trail->push(__('New User Group'), route('user-groups.create'));
});

// Home > User Groups > Edit
Breadcrumbs::for('user-groups.edit', function (BreadcrumbTrail $trail, UserGroup $group) {
    $trail->parent('user-groups');
    $trail->push(__('Edit User Group :group', ['group' => $group->name]), route('user-groups.edit', $group));
});

// Home > Questionnaires
Breadcrumbs::for('questionnaires', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Questionnaires'), route('questionnaires'));
});

// Home > Questionnaires > Create
Breadcrumbs::for('questionnaires.create', function (BreadcrumbTrail $trail) {
    $trail->parent('questionnaires');
    $trail->push(__('New Questionnaire'), route('questionnaires.create'));
});

// Home > Questionnaires > Edit
Breadcrumbs::for('questionnaires.edit', function (BreadcrumbTrail $trail, Questionnaire $questionnaire) {
    $trail->parent('questionnaires');
    $trail->push(__('Edit Questionnaire :questionnaire', ['questionnaire' => $questionnaire['name']]), route('questionnaires.edit', $questionnaire));
});

// Home > Questionnaires > Edit > Preview
Breadcrumbs::for('questionnaires.preview', function (BreadcrumbTrail $trail, Questionnaire $questionnaire) {
    $trail->parent('questionnaires.edit', $questionnaire);
    $trail->push(__('Preview'), route('questionnaires.preview', $questionnaire));
});

// Home > Questionnaires > Edit > Create Content
Breadcrumbs::for('contents.create', function (BreadcrumbTrail $trail, Questionnaire $questionnaire, int $index) {
    $trail->parent('questionnaires.edit', $questionnaire);
    $trail->push(__('Create Content'), route('contents.create', [$questionnaire, $index]));
});

// Home > Questionnaires > Edit > Edit Content
Breadcrumbs::for('contents.edit', function (BreadcrumbTrail $trail, Questionnaire $questionnaire, Content $content) {
    $trail->parent('questionnaires.edit', $questionnaire);
    $trail->push(__('Edit Content #:id', ['id' => $content->id]), route('contents.edit', [$questionnaire, $content]));
});

// Home > Projects
Breadcrumbs::for('projects', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Projects'), route('projects'));
});

// Home > Projects > Create
Breadcrumbs::for('projects.create', function (BreadcrumbTrail $trail) {
    $trail->parent('projects');
    $trail->push(__('New Project'), route('projects.create'));
});

// Home > Projects > Edit
Breadcrumbs::for('projects.edit', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('projects');
    $trail->push(__('Edit Project :project', ['project' => $project->name]), route('projects.edit', $project));
});

// Home > Projects > Screening > Page :p
Breadcrumbs::for('screening.view', function (BreadcrumbTrail $trail, ProjectStage $stage, int $page) {
    $trail->parent('home');
    $trail->push(__(':project' . ', ' . __('Screening') . ': ' . __('Page') .  ' :page', ['project' => $stage['membership']['project']['name'], 'page' => $page]), route('screening.view', [$stage, $page]));
});

// Home > Projects > Screening > Summary
Breadcrumbs::for('screening.summary', function (BreadcrumbTrail $trail, ProjectStage $stage) {
    $trail->parent('home');
    $trail->push(__('Summary of Screening on :project', ['project' => $stage['membership']['project']['name']]), route('screening.summary', $stage));
});

// Home > Projects > Screening > Report
Breadcrumbs::for('screening.report', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('home');
    $trail->push(__('Screening Report on :project', ['project' => $project['name']]), route('screening.report', $project));
});

// Home > Projects > Screening > Loading Report
Breadcrumbs::for('screening.loading', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('home');
    $trail->push(__('Creating Report') . '...', route('screening.loading', $project));
});

// Home > Projects > Screening > Report > Comments
Breadcrumbs::for('screening.comments', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('screening.report', $project);
    $trail->push(__('Comments'), route('screening.comments', $project));
});

// Home > Projects > Scoping > View
Breadcrumbs::for('scoping.view', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('home');
    $trail->push(__('Scoping for :project', ['project' => $project['name']]), route('scoping.view', $project));
});

// Home > Projects > Appraisal > Page :p
Breadcrumbs::for('appraisal.view', function (BreadcrumbTrail $trail, ProjectStage $stage, int $page) {
    $trail->parent('home');
    $trail->push(__(':project' . ', ' . __('Appraisal') . ': ' . __('Page') . ' :page', ['project' => $stage['membership']['project']['name'], 'page' => $page]), route('appraisal.view', [$stage, $page]));
});

// Home > Projects > Appraisal > Page :p
Breadcrumbs::for('appraisal.info', function (BreadcrumbTrail $trail, ProjectStage $stage, int $page) {
    $trail->parent('appraisal.view', $stage, $page);
    $trail->push(__('Info'), route('appraisal.info', [$stage, $page]));
});

// Home > Appraisal > Documentation
Breadcrumbs::for('appraisal.documentation', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Documentation'), route('appraisal.documentation'));
});

// Home > Projects > Appraisal > Summary
Breadcrumbs::for('appraisal.summary', function (BreadcrumbTrail $trail, ProjectStage $stage) {
    $trail->parent('home');
    $trail->push(__('Summary of Appraisal on :project', ['project' => $stage['membership']['project']['name']]), route('appraisal.summary', $stage));
});

// Home > Projects > Appraisal > Report
Breadcrumbs::for('appraisal.report', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('home');
    $trail->push(__('Appraisal Report on :project', ['project' => $project['name']]), route('appraisal.report', $project));
});

// Home > Projects > Appraisal > Loading Report
Breadcrumbs::for('appraisal.loading', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('home');
    $trail->push(__('Creating Report') . '...', route('appraisal.loading', $project));
});

// Home > Projects > Appraisal > Report > Comments
Breadcrumbs::for('appraisal.comments', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('appraisal.report', $project);
    $trail->push(__('Comments'), route('appraisal.comments', $project));
});

// Home > Projects > Memberships
Breadcrumbs::for('projects.memberships', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('projects');
    $trail->push(__('Memberships of :project', ['project' => $project['name'] ?? __('Unknown Project')]), route('projects.memberships', $project));
});

// Home > Projects > Files
Breadcrumbs::for('projects.files', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('projects');
    $trail->push(__('File Management of') . ' ' .  ($project['name'] ?? __('Unknown Project')), route('projects.files', $project));
});

// Home > Files
Breadcrumbs::for('projects.files-lead', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('home');
    $trail->push(__('File Management of') . ' ' .  ($project['name'] ?? __('Unknown Project')), route('projects.files-lead', $project));
});

// Home > Memberships
Breadcrumbs::for('memberships', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Memberships'), route('memberships'));
});

// Home > Configurations
Breadcrumbs::for('configurations', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Configurations'), route('configurations'));
});

// Home > Dev
Breadcrumbs::for('dev', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__(':a and :b', ['a' => __('Development'), 'b' => __('Maintenance')]), route('dev'));
});

// Home > Colors
Breadcrumbs::for('colors', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Colors'), route('colors'));
});

// Home > Sections
Breadcrumbs::for('sections', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Sections'), route('sections'));
});

// Home > Configurations > Screening > Edit
Breadcrumbs::for('configurations.edit', function (BreadcrumbTrail $trail, string $component) {
    $trail->parent('configurations');
    $trail->push(__('Edit :component', ['component' => __($component)]), route('configurations.edit', $component));
});

// Home > Configurations > Scores
Breadcrumbs::for('scores', function (BreadcrumbTrail $trail) {
    $trail->parent('configurations');
    $trail->push(__('Scores'), route('scores'));
});

// Home > Configurations > Scores > Create
Breadcrumbs::for('scores.create', function (BreadcrumbTrail $trail) {
    $trail->parent('scores');
    $trail->push(__('New Score'), route('scores.create'));
});

// Home > Configurations > Scores > Edit
Breadcrumbs::for('scores.edit', function (BreadcrumbTrail $trail, Score $score) {
    $trail->parent('scores');
    $trail->push(__('Edit Score :score', ['score' => $score->name]), route('scores.edit', $score));
});

// Home > Maps
Breadcrumbs::for('maps', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Maps'), route('maps'));
});

// Home > Data
Breadcrumbs::for('data', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Data'), route('data'));
});

// Home > Scripts
Breadcrumbs::for('scripts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Scripts'), route('scripts'));
});

// Home > Scripts > Create
Breadcrumbs::for('scripts.create', function (BreadcrumbTrail $trail) {
    $trail->parent('scripts');
    $trail->push(__('New Script'), route('scripts.create'));
});

// Home > Scripts > Edit
Breadcrumbs::for('scripts.edit', function (BreadcrumbTrail $trail, Script $script) {
    $trail->parent('scripts');
    $trail->push(__('Edit Script :name', ['name' => $script->name]), route('scripts.edit', $script));
});

// Home > Files
Breadcrumbs::for('files', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('File Management'), route('files'));
});

// Home > Memories
Breadcrumbs::for('memories', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Memories'), route('memories'));
});

// Home > Effects
Breadcrumbs::for('effects', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Effects'), route('effects'));
});

// Home > Migrations
Breadcrumbs::for('migrations', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('Migrations'), route('migrations.index'));
});
