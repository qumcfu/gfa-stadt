<?php

namespace Database\Seeders;

use App\Models\EffectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EffectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('effects')->insert([
            /*
             *
             * Appraisal 1: Mobilität und Erschließungsqualität
             *
             */
            array(
                'content_id' => 201,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 201,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 201,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 202,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 202,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 202,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 203,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 203,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 203,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 203,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 204,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 204,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 204,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 205,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 206,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 207,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 208,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 209,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 210,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 210,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 210,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 210,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 211,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 211,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 212,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 212,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 212,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 213,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 214,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => 0,
                'created_at' => now()
            ),
            array(
                'content_id' => 215,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 216,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 217,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 218,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 219,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 220,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 220,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 220,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 220,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 221,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 222,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 223,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 223,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            /*
             *
             * Appraisal 2: Gesunde Arbeitsverhältnisse
             *
             */
            array(
                'content_id' => 231,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 231,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 231,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 231,
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 232,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 232,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 232,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 232,
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 235,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 235,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 236,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 236,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 236,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 236,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 237,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 237,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 237,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 238,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 238,
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 238,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 238,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 239,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 239,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 239,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 240,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 240,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            /*
             *
             * Appraisal 3: Umwelt und Gesundheit
             *
             */
            array(
                'content_id' => 252,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 252,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 252,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 253,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 253,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 253,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 254,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 255,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 255,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 256,
                'effect_type_id' => EffectType::where('shortname', '=', 'environmental-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 257,
                'effect_type_id' => EffectType::where('shortname', '=', 'environmental-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 258,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 258,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 258,
                'effect_type_id' => EffectType::where('shortname', '=', 'light-pollution')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 259,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 259,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 259,
                'effect_type_id' => EffectType::where('shortname', '=', 'light-pollution')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 260,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 261,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 261,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 261,
                'effect_type_id' => EffectType::where('shortname', '=', 'light-pollution')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 262,
                'effect_type_id' => EffectType::where('shortname', '=', 'light-pollution')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 263,
                'effect_type_id' => EffectType::where('shortname', '=', 'environmental-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 264,
                'effect_type_id' => EffectType::where('shortname', '=', 'environmental-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 265,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 265,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 266,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 266,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 266,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 266,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 267,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 0,
                'created_at' => now()
            ),
            array(
                'content_id' => 267,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => 0,
                'created_at' => now()
            ),
            array(
                'content_id' => 268,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 269,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 269,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 270,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 271,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            /*
             *
             * Appraisal 4: Öffentliche Freiräume
             *
             */
            array(
                'content_id' => 282,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 282,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 282,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 282,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 283,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 283,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 283,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 284,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 284,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 284,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 284,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 285,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 285,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 285,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 286,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 286,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 286,
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 287,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 287,
                'effect_type_id' => EffectType::where('shortname', '=', 'environmental-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 287,
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 288,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 288,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 288,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 289,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 289,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 289,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 291,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 291,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 292,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 292,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 292,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 292,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 293,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 293,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 293,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 294,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 294,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 294,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 294,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 295,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 295,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 295,
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 296,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 296,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 297,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 297,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 297,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 298,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 298,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 299,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 299,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 299,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 300,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 300,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 300,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 300,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 301,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 301,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 301,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 301,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 302,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 302,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 303,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 303,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 303,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 304,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 304,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 304,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 304,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 305,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 305,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 305,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 306,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 306,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 306,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 306,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 307,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 307,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 307,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 307,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 308,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 308,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 308,
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 309,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 309,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 309,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 309,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 310,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 310,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 310,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 310,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            /*
             *
             * Appraisal 5: Körperliche Aktivität
             *
             */
            array(
                'content_id' => 321,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 322,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 322,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 323,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 324,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 325,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 326,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 327,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 328,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 328,
                'effect_type_id' => EffectType::where('shortname', '=', 'air-quality')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 328,
                'effect_type_id' => EffectType::where('shortname', '=', 'noise')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 329,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 330,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 331,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 332,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 332,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 333,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 333,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 334,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 334,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 335,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 336,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 336,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => 0,
                'created_at' => now()
            ),
            array(
                'content_id' => 336,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => 0,
                'created_at' => now()
            ),
            array(
                'content_id' => 337,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 337,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 337,
                'effect_type_id' => EffectType::where('shortname', '=', 'traffic-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 338,
                'effect_type_id' => EffectType::where('shortname', '=', 'heat')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 338,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 338,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 338,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 338,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 339,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 340,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 340,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 347,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            /*
             *
             *
             * Appraisal 6: Gesunde Wohnverhältnisse
             *
             *
             */
            array(
                'content_id' => 351,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 351,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 352,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 352,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 352,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 353,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 353,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 353,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 354,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 354,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 354,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 355,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 355,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 355,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 356,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 356,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 356,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 357,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 357,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 357,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 358,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 358,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 358,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 359,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 359,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 360,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 360,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 360,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 361,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 361,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 361,
                'effect_type_id' => EffectType::where('shortname', '=', 'climate')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 362,
                'effect_type_id' => EffectType::where('shortname', '=', 'environmental-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 362,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 362,
                'effect_type_id' => EffectType::where('shortname', '=', 'light-pollution')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 363,
                'effect_type_id' => EffectType::where('shortname', '=', 'environmental-hazards')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 363,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            /*
             *
             *
             * Appraisal 7: Soziale Infrastruktur
             *
             *
             */
            array(
                'content_id' => 401,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 401,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 401,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 401,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 402,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 402,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 402,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 403,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 403,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 403,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 404,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 404,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 404,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 404,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 405,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 405,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 406,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 406,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 406,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 406,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 407,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 407,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 407,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 408,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 408,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 408,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 408,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 409,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 409,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 409,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 409,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 410,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 410,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 410,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 411,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 411,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 411,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 412,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 412,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 412,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 421,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 421,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 421,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 422,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 422,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 422,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 423,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 423,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 423,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 424,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 424,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 425,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 425,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 425,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 426,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 426,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 426,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 426,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            /*
             *
             * Appraisal 8: Sozialer Zusammenhalt und Integration
             *
             */
            array(
                'content_id' => 451,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 452,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 453,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 454,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 455,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 456,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 456,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 457,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 458,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 459,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => 0,
                'created_at' => now()
            ),
            array(
                'content_id' => 460,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 461,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 462,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 463,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 463,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 464,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 464,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 465,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 465,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 466,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 466,
                'effect_type_id' => EffectType::where('shortname', '=', 'inclusion')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 467,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 468,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 469,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            /*
             *
             * Appraisal 9: Sicherheit und Schutz
             *
             */
            array(
                'content_id' => 501,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 501,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 502,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 502,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 503,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 503,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 503,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 504,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 504,
                'effect_type_id' => EffectType::where('shortname', '=', 'relaxation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 504,
                'effect_type_id' => EffectType::where('shortname', '=', 'stress')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 504,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 505,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 505,
                'effect_type_id' => EffectType::where('shortname', '=', 'quality-of-life')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 505,
                'effect_type_id' => EffectType::where('shortname', '=', 'fear')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            ),
            array(
                'content_id' => 506,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 507,
                'effect_type_id' => EffectType::where('shortname', '=', 'activity')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 507,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            /*
             *
             * Appraisal 10: Zugang zu gesunden Lebensmitteln
             *
             */
            array(
                'content_id' => 551,
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 552,
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 553,
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 554,
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 555,
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 556,
                'effect_type_id' => EffectType::where('shortname', '=', 'social-participation')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 556,
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => 1,
                'size_n' => -1,
                'created_at' => now()
            ),
            array(
                'content_id' => 557,
                'effect_type_id' => EffectType::where('shortname', '=', 'healthy-nutrition')->pluck('id')->first(),
                'author_id' => 1,
                'size_y' => -1,
                'size_n' => 1,
                'created_at' => now()
            )
        ]);
    }
}
