<?php

namespace Database\Seeders;

use App\Models\ColorCode;
use App\Models\Icon;
use App\Models\ProjectStageType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questionnaires')->insert([
            array(
                'id' => 1,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 1,
                'name' => 'Mobilität und Erschließungsqualität',
                'description' => 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).',
                'icon_id' => Icon::where('name', '=', 'person-walking')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'CornflowerBlue')->pluck('id')->first(),
                'stage_order_id' => 1,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 2,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 2,
                'name' => 'Gesunde Arbeitsverhältnisse',
                'description' => 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).',
                'icon_id' => Icon::where('name', '=', 'tools')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'CadetBlue')->pluck('id')->first(),
                'stage_order_id' => 2,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 3,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 3,
                'name' => 'Umwelt und Gesundheit',
                'description' => 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).',
                'icon_id' => Icon::where('name', '=', 'tree')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Fern*')->pluck('id')->first(),
                'stage_order_id' => 3,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 4,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 4,
                'name' => 'Öffentliche (Frei-)Räume',
                'description' => 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).',
                'icon_id' => Icon::where('name', '=', 'geo-alt')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'YellowGreen')->pluck('id')->first(),
                'stage_order_id' => 4,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 5,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 5,
                'name' => 'Körperliche Aktivität',
                'description' => 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).',
                'icon_id' => Icon::where('name', '=', 'heart-pulse')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Sunflower*')->pluck('id')->first(),
                'stage_order_id' => 5,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 6,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 6,
                'name' => 'Gesunde Wohnverhältnisse',
                'description' => 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).',
                'icon_id' => Icon::where('name', '=', 'houses')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Orange')->pluck('id')->first(),
                'stage_order_id' => 6,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 7,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 7,
                'name' => 'Soziale Infrastruktur',
                'description' => 'Dies betrifft Einrichtungen z.B. für Gesundheit, Kinderbetreuung, Bildung, Schulen, Sozialdienste, Senior:innen, Einkauf, Erholung, Freizeit, Unterhaltung, Kultur, …',
                'icon_id' => Icon::where('name', '=', 'people')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Coral')->pluck('id')->first(),
                'stage_order_id' => 7,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 8,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 8,
                'name' => 'Sozialer Zusammenhalt und Integration',
                'description' => 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).',
                'icon_id' => Icon::where('name', '=', 'person-raised-hand')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Vermilion*')->pluck('id')->first(),
                'stage_order_id' => 8,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 9,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 9,
                'name' => 'Sicherheit und Schutz',
                'description' => 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).',
                'icon_id' => Icon::where('name', '=', 'shield-lock')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'MediumVioletRed')->pluck('id')->first(),
                'stage_order_id' => 9,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 10,
                'type_id' => ProjectStageType::where('shortname', '=', 'screening')->pluck('id')->first(),
                'order_id' => 10,
                'name' => 'Zugang zu gesunden Lebensmitteln',
                'description' => 'Bitte beurteilen Sie die voraussichtlichen Auswirkungen des Vorhabens auf die folgenden gesundheitsrelevanten Kriterien für die Stadtentwicklung (Gesundheitsdeterminanten).',
                'icon_id' => Icon::where('name', '=', 'cart4')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'MediumOrchid')->pluck('id')->first(),
                'stage_order_id' => 10,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 11,
                'type_id' => ProjectStageType::where('shortname', '=', 'scoping')->pluck('id')->first(),
                'order_id' => 11,
                'name' => 'Gefährdete Gruppen',
                'description' => 'Sind von den potenziellen Auswirkungen des Vorhabens besonders schutzbedürftige, benachteiligte oder gefährdete Personengruppen betroffen?',
                'icon_id' => Icon::where('name', '=', 'exclamation-triangle')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'MediumSlateBlue')->pluck('id')->first(),
                'stage_order_id' => 11,
                'author_id' => 2,
                'created_at' => now()
            )
        ]);

        DB::table('questionnaires')->insert([
            array(
                'id' => 12,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 1,
                'order_id' => 1,
                'name' => 'Mobilität und Erschließungsqualität',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => Icon::where('name', '=', 'person-walking')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'CornflowerBlue')->pluck('id')->first(),
                'stage_order_id' => 1,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 13,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 2,
                'order_id' => 2,
                'name' => 'Gesunde Arbeitsverhältnisse',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => Icon::where('name', '=', 'tools')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'CadetBlue')->pluck('id')->first(),
                'stage_order_id' => 2,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 14,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 3,
                'order_id' => 3,
                'name' => 'Umwelt und Gesundheit',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => Icon::where('name', '=', 'tree')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Fern*')->pluck('id')->first(),
                'stage_order_id' => 3,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 15,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 4,
                'order_id' => 4,
                'name' => 'Öffentliche (Frei-)Räume',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => Icon::where('name', '=', 'geo-alt')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'YellowGreen')->pluck('id')->first(),
                'stage_order_id' => 4,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 16,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 5,
                'order_id' => 5,
                'name' => 'Körperliche Aktivität',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => Icon::where('name', '=', 'heart-pulse')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Sunflower*')->pluck('id')->first(),
                'stage_order_id' => 5,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 17,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 6,
                'order_id' => 6,
                'name' => 'Gesunde Wohnverhältnisse',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => Icon::where('name', '=', 'houses')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Orange')->pluck('id')->first(),
                'stage_order_id' => 6,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 18,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 7,
                'order_id' => 7,
                'name' => 'Soziale Infrastruktur',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => Icon::where('name', '=', 'people')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Coral')->pluck('id')->first(),
                'stage_order_id' => 7,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 19,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 8,
                'order_id' => 8,
                'name' => 'Sozialer Zusammenhalt und Integration',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => Icon::where('name', '=', 'person-raised-hand')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'Vermilion*')->pluck('id')->first(),
                'stage_order_id' => 8,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 20,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 9,
                'order_id' => 9,
                'name' => 'Sicherheit und Schutz',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => Icon::where('name', '=', 'shield-lock')->pluck('id')->first(),
                'color_id' => ColorCode::where('name', '=', 'MediumVioletRed')->pluck('id')->first(),
                'stage_order_id' => 9,
                'author_id' => 2,
                'created_at' => now()
            ),
            array(
                'id' => 21,
                'type_id' => ProjectStageType::where('shortname', '=', 'appraisal')->pluck('id')->first(),
                'screening_id' => 10,
                'order_id' => 10,
                'name' => 'Zugang zu gesunden Lebensmitteln',
                'description' => 'Bitte beantworten Sie die folgenden weitergehenden Fragen, um die voraussichtlichen direkten Effekte des Vorhabens zu ermitteln.',
                'icon_id' => null,
                'color_id' => ColorCode::where('name', '=', 'MediumOrchid')->pluck('id')->first(),
                'stage_order_id' => 10,
                'author_id' => 2,
                'created_at' => now()
            )
        ]);
    }
}
