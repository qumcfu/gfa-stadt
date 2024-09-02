<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HealthImpactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        DB::table('health_impact_types')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('health_impact_types')->insert([
            array(
                'order_id' => 1,
                'name' => 'Mortality',
                'shortname' => 'mortality',
                'icon_id' => Icon::where('name', '=', 'lightning')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 2,
                'name' => 'Cardiovascular diseases',
                'shortname' => 'cardio',
                'icon_id' => Icon::where('name', '=', 'heart-pulse')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 3,
                'name' => 'Pulmonary diseases',
                'shortname' => 'pulmonary',
                'icon_id' => Icon::where('name', '=', 'lungs')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 4,
                'name' => 'Overweight and obesity',
                'shortname' => 'overweight',
                'icon_id' => Icon::where('name', '=', 'question-circle')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 5,
                'name' => 'Diabetes',
                'shortname' => 'diabetes',
                'icon_id' => Icon::where('name', '=', 'question-circle')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 6,
                'name' => 'Infectious diseases',
                'shortname' => 'infectious',
                'icon_id' => Icon::where('name', '=', 'virus')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 7,
                'name' => 'Cancerous diseases',
                'shortname' => 'cancer',
                'icon_id' => Icon::where('name', '=', 'question-circle')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 8,
                'name' => 'Exhaustion symptoms and heat stroke',
                'shortname' => 'exhaustion',
                'icon_id' => Icon::where('name', '=', 'fire')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 9,
                'name' => 'Tinnitus and hearing loss',
                'shortname' => 'tinnitus',
                'icon_id' => Icon::where('name', '=', 'ear')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 10,
                'name' => 'Injuries and accidents',
                'shortname' => 'injuries',
                'icon_id' => Icon::where('name', '=', 'bandaid')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 11,
                'name' => 'Sleep disorders',
                'shortname' => 'sleep',
                'icon_id' => Icon::where('name', '=', 'cloud-moon')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 12,
                'name' => 'Mental health',
                'shortname' => 'mental-health',
                'icon_id' => Icon::where('name', '=', 'cloud-sun')->pluck('id')->first(),
                'is_positive' => true,
                'created_at' => now()
            ),
            array(
                'order_id' => 13,
                'name' => 'Depressions',
                'shortname' => 'depression',
                'icon_id' => Icon::where('name', '=', 'cloud')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
        ]);

        Model::reguard();
    }
}
