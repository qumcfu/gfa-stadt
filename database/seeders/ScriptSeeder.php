<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScriptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('scripts')->insert([
            array(
                'order_id' => 1,
                'name' => 'Scoping',
                'code' => "mortality[1] <- ageRanges[1,1]\nmortality[2] <- ageRanges[1,2]\ncardio[1] <- male * 0.0001\ncardio[2] <- male * 0.001\ncardio[3] <- female * 0.01\ncardio[4] <- female * 0.02\ndiabetes[1] <- movement['walk', 'minutes']\ndiabetes[2] <- movement['bike', 'percent']",
                'author_id' => 2,
                'created_at' => now()
            )
        ]);
    }
}
