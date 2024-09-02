<?php

namespace App\Providers;

use App\Models\Membership;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // VISIBILITY
        Gate::define('visibility', function (User $user, string $action, string $section) {
            if(Gate::allows($action . '-' . $section)) return true;
            return config('settings.visibility.inaccessible.' . $action);
        });

        // PROJECTS
        Gate::define('access-projects', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['projects']['access'] ?? false;
        });

        Gate::define('create-projects', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['projects']['privileges']['create']['status'] ?? false;
        });

        Gate::define('edit-projects', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['projects']['privileges']['edit']['status'] ?? false;
        });

        Gate::define('delete-projects', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['projects']['privileges']['delete']['status'] ?? false;
        });

        Gate::define('view-report', function (User $user, Membership $membership) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            // all members can view the report
            return true;
        });

        Gate::define('project-lead', function (User $user, Project $project) {
            $membership = $user->getMembershipTo($project);
            return ($membership['role']['shortname'] ?? 'none') === 'lead';
        });

        // SCREENINGS
        Gate::define('access-screenings', function (User $user) {
            return $user['memberships'] != null;
        });

        // MEMBERSHIPS
        Gate::define('access-memberships', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['memberships']['access'] ?? false;
        });

        Gate::define('create-memberships', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['memberships']['privileges']['create']['status'] ?? false;
        });

        Gate::define('edit-memberships', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['memberships']['privileges']['edit']['status'] ?? false;
        });

        Gate::define('delete-memberships', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['memberships']['privileges']['delete']['status'] ?? false;
        });

        // QUESTIONNAIRES
        Gate::define('access-questionnaires', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['questionnaires']['access'] ?? false;
        });

        Gate::define('create-questionnaires', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['questionnaires']['privileges']['create']['status'] ?? false;
        });

        Gate::define('edit-questionnaires', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['questionnaires']['privileges']['edit']['status'] ?? false;
        });

        Gate::define('delete-questionnaires', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['questionnaires']['privileges']['delete']['status'] ?? false;
        });

        // USERS
        Gate::define('access-users', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['users']['access'] ?? false;
        });

        Gate::define('create-users', function (User $user) {
            $permissions = json_decode(Auth::user()->group->permissions ?? '{}', true);
            return $permissions['users']['privileges']['create']['status'] ?? false;
        });

        Gate::define('edit-users', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['users']['privileges']['edit']['status'] ?? false;
        });

        Gate::define('delete-users', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['users']['privileges']['delete']['status'] ?? false;
        });

        // USER GROUPS
        Gate::define('access-user-groups', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['user-groups']['access'] ?? false;
        });

        Gate::define('edit-user-groups', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['user-groups']['privileges']['edit']['status'] ?? false;
        });

        Gate::define('disable-user-groups', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['user-groups']['privileges']['disable']['status'] ?? false;
        });

        // FILES
        Gate::define('access-files', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['files']['access'] ?? false;
        });

        // DATA
        Gate::define('access-data', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['data']['access'] ?? false;
        });

        // SCRIPTS
        Gate::define('access-scripts', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['scripts']['access'] ?? false;
        });

        Gate::define('create-scripts', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['scripts']['privileges']['create']['status'] ?? false;
        });

        Gate::define('edit-scripts', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['scripts']['privileges']['edit']['status'] ?? false;
        });

        Gate::define('delete-scripts', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['scripts']['privileges']['delete']['status'] ?? false;
        });

        // CONFIGURATIONS
        Gate::define('access-configurations', function (User $user) {
            $permissions = json_decode($user->group->permissions ?? '{}', true);
            return $permissions['configurations']['access'] ?? false;
        });

        // MEMORIES
        Gate::define('access-memories', function (User $user) {
            return Gate::allows('developer');
        });

        Gate::define('delete-memories', function (User $user) {
            return Gate::allows('developer');
        });

        // EFFECTS
        Gate::define('access-effects', function (User $user) {
            return Gate::allows('developer');
        });

        Gate::define('create-effects', function (User $user) {
            return Gate::allows('developer');
        });

        Gate::define('edit-effects', function (User $user) {
            return Gate::allows('developer');
        });

        Gate::define('delete-effects', function (User $user) {
            return Gate::allows('developer');
        });

        // DEV
        Gate::define('developer', function (User $user) {
            return $user->group->shortname === 'admin' || $user->group->shortname === 'dev';
        });
    }
}
