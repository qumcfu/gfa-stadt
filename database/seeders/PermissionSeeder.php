<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            array(
                'section' => 'projects',
                'privilege' => 'create',
                'created_at' => now()
            ),
            array(
                'section' => 'projects',
                'privilege' => 'edit',
                'created_at' => now()
            ),
            array(
                'section' => 'projects',
                'privilege' => 'delete',
                'created_at' => now()
            ),
            array(
                'section' => 'memberships',
                'privilege' => 'create',
                'created_at' => now()
            ),
            array(
                'section' => 'memberships',
                'privilege' => 'edit',
                'created_at' => now()
            ),
            array(
                'section' => 'memberships',
                'privilege' => 'delete',
                'created_at' => now()
            ),
            array(
                'section' => 'questionnaires',
                'privilege' => 'create',
                'created_at' => now()
            ),
            array(
                'section' => 'questionnaires',
                'privilege' => 'edit',
                'created_at' => now()
            ),
            array(
                'section' => 'questionnaires',
                'privilege' => 'delete',
                'created_at' => now()
            ),
            array(
                'section' => 'users',
                'privilege' => 'create',
                'created_at' => now()
            ),
            array(
                'section' => 'users',
                'privilege' => 'edit',
                'created_at' => now()
            ),
            array(
                'section' => 'users',
                'privilege' => 'disable',
                'created_at' => now()
            ),
            array(
                'section' => 'users',
                'privilege' => 'delete',
                'created_at' => now()
            ),
            array(
                'section' => 'user-groups',
                'privilege' => 'create',
                'created_at' => now()
            ),
            array(
                'section' => 'user-groups',
                'privilege' => 'edit',
                'created_at' => now()
            ),
            array(
                'section' => 'user-groups',
                'privilege' => 'disable',
                'created_at' => now()
            ),
            array(
                'section' => 'user-groups',
                'privilege' => 'delete',
                'created_at' => now()
            ),
            array(
                'section' => 'files',
                'privilege' => 'create',
                'created_at' => now()
            ),
            array(
                'section' => 'files',
                'privilege' => 'edit',
                'created_at' => now()
            ),
            array(
                'section' => 'files',
                'privilege' => 'delete',
                'created_at' => now()
            ),
            array(
                'section' => 'data',
                'privilege' => 'export',
                'created_at' => now()
            ),
            array(
                'section' => 'configurations',
                'privilege' => 'create',
                'created_at' => now()
            ),
            array(
                'section' => 'configurations',
                'privilege' => 'edit',
                'created_at' => now()
            ),
            array(
                'section' => 'configurations',
                'privilege' => 'delete',
                'created_at' => now()
            ),
            array(
                'section' => 'scripts',
                'privilege' => 'create',
                'created_at' => now()
            ),
            array(
                'section' => 'scripts',
                'privilege' => 'edit',
                'created_at' => now()
            ),
            array(
                'section' => 'scripts',
                'privilege' => 'delete',
                'created_at' => now()
            )
        ]);
    }
}
