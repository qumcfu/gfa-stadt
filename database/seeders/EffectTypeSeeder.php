<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EffectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('effect_types')->insert([
            array(
                'order_id' => 1,
                'name' => 'Activity',
                'shortname' => 'activity',
                'icon_id' => Icon::where('name', '=', 'bicycle')->pluck('id')->first(),
                'is_positive' => true,
                'created_at' => now()
            ),
            array(
                'order_id' => 2,
                'name' => 'Social participation',
                'shortname' => 'social-participation',
                'icon_id' => Icon::where('name', '=', 'people')->pluck('id')->first(),
                'is_positive' => true,
                'created_at' => now()
            ),
            array(
                'order_id' => 3,
                'name' => 'Noise',
                'shortname' => 'noise',
                'icon_id' => Icon::where('name', '=', 'soundwave')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 4,
                'name' => 'Air quality',
                'shortname' => 'air-quality',
                'icon_id' => Icon::where('name', '=', 'cloud')->pluck('id')->first(),
                'is_positive' => true,
                'created_at' => now()
            ),
            array(
                'order_id' => 5,
                'name' => 'Traffic hazards',
                'shortname' => 'traffic-hazards',
                'icon_id' => Icon::where('name', '=', 'sign-stop')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 6,
                'name' => 'Heat',
                'shortname' => 'heat',
                'icon_id' => Icon::where('name', '=', 'fire')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 7,
                'name' => 'Environmental hazards',
                'shortname' => 'environmental-hazards',
                'icon_id' => Icon::where('name', '=', 'cloud-lightning-rain')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 8,
                'name' => 'Quality of life',
                'shortname' => 'quality-of-life',
                'icon_id' => Icon::where('name', '=', 'sun')->pluck('id')->first(),
                'is_positive' => true,
                'created_at' => now()
            ),
            array(
                'order_id' => 9,
                'name' => 'Healthy nutrition',
                'shortname' => 'healthy-nutrition',
                'icon_id' => Icon::where('name', '=', 'hexagon-fill')->pluck('id')->first(),
                'is_positive' => true,
                'created_at' => now()
            ),
            array(
                'order_id' => 10,
                'name' => 'Relaxation',
                'shortname' => 'relaxation',
                'icon_id' => Icon::where('name', '=', 'cloud-moon')->pluck('id')->first(),
                'is_positive' => true,
                'created_at' => now()
            ),
            array(
                'order_id' => 11,
                'name' => 'Stress',
                'shortname' => 'stress',
                'icon_id' => Icon::where('name', '=', 'alarm')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 12,
                'name' => 'Fear and insecurity',
                'shortname' => 'fear',
                'icon_id' => Icon::where('name', '=', 'person-arms-up')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 13,
                'name' => 'Climate impacts',
                'shortname' => 'climate',
                'icon_id' => Icon::where('name', '=', 'thermometer-sun')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            ),
            array(
                'order_id' => 14,
                'name' => 'Inclusion',
                'shortname' => 'inclusion',
                'icon_id' => Icon::where('name', '=', 'person-wheelchair')->pluck('id')->first(),
                'is_positive' => true,
                'created_at' => now()
            ),
            array(
                'order_id' => 15,
                'name' => 'Light pollution',
                'shortname' => 'light-pollution',
                'icon_id' => Icon::where('name', '=', 'lightbulb')->pluck('id')->first(),
                'is_positive' => false,
                'created_at' => now()
            )
        ]);
    }
}
