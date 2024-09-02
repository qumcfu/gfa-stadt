<?php

namespace Database\Seeders;

use App\Models\EffectType;
use App\Models\HealthImpactType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HealthImpactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        DB::table('health_impacts')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('health_impacts')->insert([
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mortality')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cardio')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'overweight')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'diabetes')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'infectious')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cancer')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'depression')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mortality')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cardio')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'depression')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mortality')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cardio')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'sleep')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'tinnitus')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mental-health')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mortality')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'pulmonary')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'injuries')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mortality')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cardio')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'sleep')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'exhaustion')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'environmental-hazards')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'infectious')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mortality')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cancer')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cardio')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cardio')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'diabetes')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cancer')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'overweight')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mental-health')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mortality')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cardio')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'depression')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mortality')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cardio')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'depression')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mortality')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'cardio')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'sleep')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'exhaustion')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'mental-health')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'effect_type_id' => EffectType::where('shortname', '=', 'light-pollution')->pluck('id')->first(),
                'health_impact_type_id' => HealthImpactType::where('shortname', '=', 'sleep')->pluck('id')->first(),
                'author_id' => 1,
                'created_at' => now()
            ),
        ]);

        Model::reguard();
    }
}
