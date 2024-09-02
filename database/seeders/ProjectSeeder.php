<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            array(
                'name' => 'Beispiel-Vorhaben',
                'type' => 'Die Art des Vorhabens',
                'stage' => 'Der derzeitige Stand des Vorhabens',
                'change' => 'Ist eine HIA überhaupt sinnvoll?',
                'enrollment_key' => 'bsp',
                'author_id' => 2,
                'order_id' => 1,
                'created_at' => now()
            )
        ]);
    }
}
