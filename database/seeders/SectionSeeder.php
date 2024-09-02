<?php

namespace Database\Seeders;

use App\Models\ColorCode;
use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            array(
                'shortname' => 'users',
                'order_id' => 1,
                'name' => 'User Management',
                'description' => 'Create and manage user accounts with individual access permissions.',
                'icon_id' => Icon::where('name', '=', 'person')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Benutzerverwaltung')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'user-groups',
                'order_id' => 2,
                'name' => 'User Groups',
                'description' => 'Define which areas users can see and which actions they are allowed to perform.',
                'icon_id' => Icon::where('name', '=', 'person-check')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Benutzergruppen')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'memberships',
                'order_id' => 3,
                'name' => 'Memberships',
                'description' => 'Assign users to projects to allow them to contribute to the screening.',
                'icon_id' => Icon::where('name', '=', 'clipboard-check')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Mitgliedschaften')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'projects',
                'order_id' => 4,
                'name' => 'Projects',
                'description' => 'Create projects, conduct screenings, and review evaluations.',
                'icon_id' => Icon::where('name', '=', 'kanban')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Vorhaben')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'questionnaires',
                'order_id' => 5,
                'name' => 'Questionnaires',
                'description' => 'Combine your questions into items and questionnaires and define evaluation criteria.',
                'icon_id' => Icon::where('name', '=', 'question-circle')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Fragebögen')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'files',
                'order_id' => 6,
                'name' => 'File Management',
                'description' => '...',
                'icon_id' => Icon::where('name', '=', 'folder')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Dateiverwaltung')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'scripts',
                'order_id' => 7,
                'name' => 'Scripts',
                'description' => 'Create and edit R scripts to gain control over formulas and define their outputs.',
                'icon_id' => Icon::where('name', '=', 'code-slash')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Skripte')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'data',
                'order_id' => 8,
                'name' => 'Data',
                'description' => '...',
                'icon_id' => Icon::where('name', '=', 'hdd')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Daten')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'configurations',
                'order_id' => 9,
                'name' => 'Configurations',
                'description' => 'Set the scope of screening and manage your scores.',
                'icon_id' => Icon::where('name', '=', 'gear')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Einstellungen')->pluck('id')->first(),
                'created_at' => now()
            )
        ]);
    }
}
