<?php

namespace Database\Seeders;

use App\Models\ProjectStageType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content_types')->insert([
            array(
                'stage_type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'shortname' => 'screening-item',
                'name' => 'Screening Item',
                'type' => 'default',
                'category' => 'module',
                'icon' => 'question-circle-fill',
                'color' => 'primary',
                'description' => 'A dynamic module that asks screening-related questions. The user\'s answer to a question decides whether and which question is displayed next.',
                'created_at' => now()
            ),
            array(
                'stage_type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'shortname' => 'vulnerable-group-item',
                'name' => 'Vulnerable Group Item',
                'type' => 'default',
                'category' => 'module',
                'icon' => 'person-circle',
                'color' => 'primary',
                'description' => 'A dynamic module that asks for expected impacts on a vulnerable group.',
                'created_at' => now()
            ),
            array(
                'stage_type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'shortname' => 'appraisal-item',
                'name' => 'Appraisal Item',
                'type' => 'default',
                'category' => 'module',
                'icon' => 'search',
                'color' => 'success',
                'description' => 'A dynamic module that asks appraisal-related questions.',
                'created_at' => now()
            )
        ]);
    }
}
