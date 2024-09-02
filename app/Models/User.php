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

namespace App\Models;

use App\Traits\MembershipCountTrait;
use App\Traits\StageCountTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'group_id',
        'active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
    ];

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }

    public function group()
    {
        return $this->belongsTo(UserGroup::class);
    }

    public function config()
    {
        return $this->hasOne(Configuration::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function editor()
    {
        return $this->belongsTo(User::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function authoredQuestions()
    {
        return $this->hasMany(Content::class, 'author_id')->orderBy('questionnaire_index');
    }

    public function editedQuestions()
    {
        return $this->hasMany(Content::class, 'editor_id')->orderBy('questionnaire_index');
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function memory(): HasOne
    {
        return $this->hasOne(Memory::class);
    }

    public function getMembershipTo(Project $project)
    {
        return $this['memberships']->where('project_id', '=', $project['id'])->first();
    }

    public function authoredProjects()
    {
        return $this->hasMany(Project::class, 'author_id');
    }

    public function editedProjects()
    {
        return $this->hasMany(Project::class, 'editor_id');
    }

    public function authoredMemberships()
    {
        return $this->hasMany(Membership::class, 'author_id');
    }

    public function editedMemberships()
    {
        return $this->hasMany(Membership::class, 'editor_id');
    }

    public function authoredScripts()
    {
        return $this->hasMany(Script::class, 'author_id')->orderBy('order_id');
    }

    public function editedScripts()
    {
        return $this->hasMany(Script::class, 'editor_id')->orderBy('order_id');
    }

    public function impersonation()
    {
        return $this->belongsTo(User::class, 'impersonate_id');
    }

    public function hasPermission($section, $action)
    {
        $permissions = json_decode($this->group['permissions'] ?? '{}', true);

        // return false for unknown section
        if (!array_key_exists($section, $permissions))
        {
            return false;
        }

        // get access for passed section
        if ($action === 'access' && array_key_exists('access', $permissions[$section]))
        {
            return $permissions[$section]['access'];
        }

        // return false for unknown action
        if (!array_key_exists($action, $permissions[$section]['privileges']))
        {
            return false;
        }

        // get permission for specific action
        return $permissions[$section]['privileges'][$action]['status'];
    }

    public function isMemberOf(Project $project)
    {
        $membership = $this->getMembershipTo($project);
        return $membership != null && $membership['active'];
    }

    public function isActive()
    {
        return Auth::user()->active > 0;
    }

    public function configure(): Configuration
    {
        $config = new Configuration();
        $config['user_id'] = $this['id'];
        $config->save();
        return $config;
    }

    public function getHoursSinceLastLogin(): int
    {
        $now = time();
        $secondsSinceLastLogin = $now - strtotime($this['last_login'] ?? $now - 3600);
        return round($secondsSinceLastLogin / 3600, 0);
    }

    use MembershipCountTrait;
    use StageCountTrait;
}
