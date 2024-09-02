<?php

namespace Database\Seeders;

use App\Models\ColorCode;
use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_stage_types')->insert([
            array(
                'shortname' => 'undefined',
                'name' => 'Undefined',
                'icon_id' => Icon::where('name', '=', 'patch-question-fill')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'BS_Secondary')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'screening',
                'name' => 'Screening',
                'icon_id' => Icon::where('name', '=', 'patch-check-fill')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'BS_Primary')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'scoping',
                'name' => 'Scoping',
                'icon_id' => Icon::where('name', '=', 'patch-check-fill')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'MediumPurple')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'appraisal',
                'name' => 'Appraisal',
                'icon_id' => Icon::where('name', '=', 'patch-check-fill')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'BS_Success')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'public',
                'name' => 'Public',
                'icon_id' => Icon::where('name', '=', 'question-circle')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'BS_Secondary')->pluck('id')->first(),
                'created_at' => now()
            ),
            array(
                'shortname' => 'backup',
                'name' => 'Backup',
                'icon_id' => Icon::where('name', '=', 'question-circle')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'BS_Secondary')->pluck('id')->first(),
                'created_at' => now()
            )
        ]);
    }
}
