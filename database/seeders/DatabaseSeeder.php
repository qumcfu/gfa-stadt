<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            IconSeeder::class,
            ColorCodeSeeder::class,
            SectionSeeder::class,
            FileTypeSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserGroupSeeder::class,
            UserSeeder::class,
            ProjectSeeder::class,
            ProjectSettingsSeeder::class,
            MembershipSeeder::class,
            ProjectStageTypeSeeder::class,
            EffectTypeSeeder::class,
            EffectSeeder::class,
            QuestionnaireSeeder::class,
            ContentTypeSeeder::class,
            ContentSeeder::class,
            TopicSeeder::class,
            ReferenceSeeder::class,
            AnswerSeeder::class,
            ScriptSeeder::class
        ]);
    }
}
