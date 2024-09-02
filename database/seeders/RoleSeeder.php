<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            array(
                'shortname' => 'lead',
                'name' => 'Project manager',
                'access_level' => 3,
                'icon' => 'person-fill-check',
                'created_at' => now()
            ),
            array(
                'shortname' => 'co-lead',
                'name' => 'Co-leader',
                'access_level' => 2,
                'icon' => 'person-add',
                'created_at' => now()
            ),
            array(
                'shortname' => 'participant',
                'name' => 'Participant',
                'access_level' => 1,
                'icon' => 'person',
                'created_at' => now()
            )
        ]);
    }
}
