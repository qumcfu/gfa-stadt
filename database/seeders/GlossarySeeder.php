<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GlossarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        DB::table('glossaries')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('glossaries')->insert([
            array(
                'id' => 1,
                'name' => 'Allgemeine Stadtplanungsbegriffe',
                'shortname' => 'general',
                'created_at' => now()
            ),
            array(
                'id' => 2,
                'name' => 'Leitbilder & Konzepte',
                'shortname' => 'concepts',
                'created_at' => now()
            ),
            array(
                'id' => 3,
                'name' => 'Infrastruktur',
                'shortname' => 'infrastructure',
                'created_at' => now()
            ),
            array(
                'id' => 4,
                'name' => 'Wohnraum',
                'shortname' => 'living',
                'created_at' => now()
            ),
            array(
                'id' => 5,
                'name' => 'Städtebauliche Typologien',
                'shortname' => 'urban',
                'created_at' => now()
            ),
            array(
                'id' => 6,
                'name' => 'Verkehrsassoziierte Begriffe',
                'shortname' => 'traffic',
                'created_at' => now()
            ),
            array(
                'id' => 7,
                'name' => 'Klimaassoziierte Begriffe',
                'shortname' => 'climate',
                'created_at' => now()
            ),
            array(
                'id' => 8,
                'name' => 'Raum',
                'shortname' => 'space',
                'created_at' => now()
            ),
            array(
                'id' => 9,
                'name' => 'Siedlungsstruktur',
                'shortname' => 'settlement',
                'created_at' => now()
            ),
            array(
                'id' => 10,
                'name' => 'Management',
                'shortname' => 'management',
                'created_at' => now()
            ),
            array(
                'id' => 11,
                'name' => 'Gesellschaftsassoziierte Begriffe',
                'shortname' => 'community',
                'created_at' => now()
            ),
            array(
                'id' => 12,
                'name' => 'Sonstige Stadtplanungsbegriffe',
                'shortname' => 'other',
                'created_at' => now()
            ),
            array(
                'id' => 13,
                'name' => 'Epidemiologische Maßzahlen der Gesundheit',
                'shortname' => 'health',
                'created_at' => now()
            ),
            array(
                'id' => 14,
                'name' => 'Sonstige Gesundheitsbegriffe',
                'shortname' => 'other2',
                'created_at' => now()
            )
        ]);

        Model::reguard();
    }
}
