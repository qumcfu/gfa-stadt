<!--
    The MIT License (MIT)

    Copyright (c) 2024, https://gfa-stadt.de, see LICENSE.txt for contact information

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
-->
@extends('layouts.app')

@section('header')
    {{ Breadcrumbs::render('dev') }}
@endsection

@section('content')

    <div class="d-flex">
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') }}px;">
            <x-buttons.round-icon-open-page :target='"/sections"' :icon='"book"' :color='"back"' :tooltip='__("Sections")'></x-buttons.round-icon-open-page>
        </div>
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') + config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-open-page :target='"/colors"' :icon='"palette"' :color='"back"' :tooltip='__("Colors")'></x-buttons.round-icon-open-page>
        </div>
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') + 2 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-open-page :target='"/effects"' :icon='"diagram-3"' :color='"back"' :tooltip='__("Effects")'></x-buttons.round-icon-open-page>
        </div>
        <div class="position-fixed" style="left: {{ config('settings.buttons.back.position.x') }}px; top: {{ config('settings.buttons.back.position.y') + 3 * config('settings.buttons.gap') }}px;">
            <x-buttons.round-icon-open-page :target='"/dashboard"' :icon='"arrow-return-left"' :color='"back"' :tooltip='__("Back")'></x-buttons.round-icon-open-page>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12">

            <h4 class="mb-3">{{ __('Available Commands') }}</h4>

            <div class="table-responsive">
                <table class="table table-striped table-bordered w-100">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('Command') }}</th>
                        <th scope="col" style="width: 20%;">{{ __('Parameter') }}</th>
                        <th scope="col">{{ __('Description') }}</th>
                        <th scope="col">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <form method="get">
                        <tr>
                            <td colspan="2">php artisan route:cache</td>
                            <td>{{ __('Update Route Cache') }}</td>
                            <td><button formaction="/dev/route-cache" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                        <tr>
                            <td colspan="2">php artisan cache:clear</td>
                            <td>{{ __('Clear Application Cache') }}</td>
                            <td><button formaction="/dev/cache-clear" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                        <tr>
                            <td colspan="2">php artisan route:clear</td>
                            <td>{{ __('Clear Route Cache') }}</td>
                            <td><button formaction="/dev/route-clear" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                        <tr>
                            <td colspan="2">php artisan optimize:clear</td>
                            <td>{{ __('Clear All Caches') }}</td>
                            <td><button formaction="/dev/optimize-clear" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                        <tr>
                            <td colspan="2">php artisan storage:link</td>
                            <td>{{ __('Create symbolic link') }}</td>
                            <td><button formaction="/dev/create-symlink" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                        <tr>
                            <td colspan="2">php artisan queue:restart</td>
                            <td>{{ __('Restart Queue') }}</td>
                            <td><button formaction="/dev/queue-restart" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                        <tr>
                            <td>php artisan down --secret="*"</td>
                            <td class="text-small">
                                <input name="maintenance[secret]" type="text" class="w-100" value="4925173c-482f-39a2-b0c3-598de1f056a7">
                            </td>
                            <td>{{ __('Set app to maintenance mode') }}</td>
                            <td><button formaction="/maintenance/down" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                        <tr>
                            <td colspan="2">php artisan up</td>
                            <td>{{ __('Leave maintenance mode') }}</td>
                            <td><button formaction="/maintenance/up" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                        <tr>
                            <td colspan="2">–</td>
                            <td>{{ __('Reevaluate projects') }}</td>
                            <td><button formaction="/dev/reevaluate-projects" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                        <tr>
                            <td colspan="2">–</td>
                            <td>{{ __('Reevaluate project stages') }}</td>
                            <td><button formaction="/dev/reevaluate-stages" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button></td>
                        </tr>
                    </form>
                    <form method="post" class="d-inline-block">
                        @csrf
                        <tr>
                            <td>php artisan migrate:refresh --path="database/migrations/*"</td>
                            <td>
                                <select name="migrate[path]" required>
                                    <option value="2022_03_21_102620_create_sections_table.php">Sections</option>
                                    <option value="2022_03_21_104918_create_permissions_table.php">Permissions</option>
                                    <option value="2023_02_01_164638_create_icons_table.php">Icons</option>
                                    <option value="2023_02_01_164645_create_color_codes_table.php">Color Codes</option>
                                    <option value="2022_05_12_170410_create_project_stage_types_table.php">Project Stage Types</option>
                                    <option value="2022_04_06_164629_create_configurations_table.php">! Configurations !</option>
                                    <option value="2023_01_26_163220_create_project_settings_table.php">!! Project Settings !!</option>
                                    <option value="2022_09_27_195206_create_roles_table.php">! Roles !</option>
                                    <option value="2023_03_23_160604_create_file_types_table.php">File Types</option>
                                    <option value="2022_02_06_110742_create_content_types_table.php">Content Types</option>
                                    <option value="2022_02_04_180203_create_questionnaires_table.php">Questionnaires</option>
                                    <option value="2022_03_31_125508_create_contents_table.php">Contents</option>
                                    <option value="2022_07_15_142420_create_content_states_table.php">! Content States !</option>
                                    <option value="2023_07_28_201422_create_focused_items_table.php">!! Focused Items !!</option>
                                    <option value="2023_05_05_150533_create_topics_table.php">Topics</option>
                                    <option value="2023_08_11_231535_create_references_table.php">References</option>
                                    <option value="2023_06_28_124423_create_effect_types_table.php">Effect Types</option>
                                    <option value="2023_06_29_122517_create_effects_table.php">Effects</option>
                                    <option value="2024_04_05_161517_create_health_impact_types_table.php">Health Impact Types</option>
                                    <option value="2024_04_05_161432_create_health_impacts_table.php">Health Impacts</option>
                                    <option value="2023_01_13_153318_create_comments_table.php">!!! Comments !!!</option>
                                    <option value="2023_01_15_185447_create_upvotes_table.php">!!! Upvotes !!!</option>
                                    <option value="2023_03_23_160823_create_files_table.php">!!! Files !!!</option>
                                    <option value="2023_03_23_195905_create_file_links_table.php">!!! File Links !!!</option>
                                    <option value="2024_07_18_172740_create_glossaries_table.php">Glossaries</option>
                                    <option value="2024_07_18_172748_create_glossary_terms_table.php">Glossary Terms</option>
                                </select>
                            </td>
                            <td>{{ __('Refresh migration') }}</td>
                            <td>
                                <button formaction="/dev/migrate/refresh" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button>
                            </td>
                        </tr>
                        <tr>
                            <td>php artisan db:seed --class="*"</td>
                            <td>
                                <select name="seed[class]" required>
                                    <option {{ old('migrate.path') === '2022_03_21_102620_create_sections_table.php' ? 'selected' : '' }} value="SectionSeeder">Sections</option>
                                    <option {{ old('migrate.path') === '2022_03_21_104918_create_permissions_table.php' ? 'selected' : '' }} value="PermissionSeeder">Permissions</option>
                                    <option {{ old('migrate.path') === '2023_02_01_164638_create_icons_table.php' ? 'selected' : '' }} value="IconSeeder">Icons</option>
                                    <option {{ old('migrate.path') === '2023_02_01_164645_create_color_codes_table.php' ? 'selected' : '' }} value="ColorCodeSeeder">Color Codes</option>
                                    <option {{ old('migrate.path') === '2022_05_12_170410_create_project_stage_types_table.php' ? 'selected' : '' }} value="ProjectStageTypeSeeder">Project Stage Types</option>
                                    <option {{ old('migrate.path') === '2023_01_26_163220_create_project_settings_table.php' ? 'selected' : '' }} value="ProjectSettingsSeeder">Project Settings</option>
                                    <option {{ old('migrate.path') === '2022_02_25_221237_create_user_groups_table.php' ? 'selected' : '' }} value="UserGroupSeeder">User Groups (T)</option>
                                    <option {{ old('migrate.path') === '2022_09_27_195206_create_roles_table.php' ? 'selected' : '' }} value="RoleSeeder">Roles</option>
                                    <option {{ old('migrate.path') === '2023_03_23_160604_create_file_types_table.php' ? 'selected' : '' }} value="FileTypeSeeder">File Types</option>
                                    <option {{ old('migrate.path') === '2022_02_06_110742_create_content_types_table.php' ? 'selected' : '' }} value="ContentTypeSeeder">Content Types</option>
                                    <option {{ old('migrate.path') === '2022_02_04_180203_create_questionnaires_table.php' ? 'selected' : '' }} value="QuestionnaireSeeder">Questionnaires</option>
                                    <option {{ old('migrate.path') === '2022_03_31_125508_create_contents_table.php' ? 'selected' : '' }} value="ContentSeeder">Contents</option>
                                    <option {{ old('migrate.path') === '2023_05_05_150533_create_topics_table.php' ? 'selected' : '' }} value="TopicSeeder">Topics (T)</option>
                                    <option {{ old('migrate.path') === '2023_08_11_231535_create_references_table.php' ? 'selected' : '' }} value="ReferenceSeeder">References (T)</option>
                                    <option {{ old('migrate.path') === '2023_06_28_124423_create_effect_types_table.php' ? 'selected' : '' }} value="EffectTypeSeeder">Effect Types</option>
                                    <option {{ old('migrate.path') === '2023_06_29_122517_create_effects_table.php' ? 'selected' : '' }} value="EffectSeeder">Effects</option>
                                    <option {{ old('migrate.path') === '2024_04_05_161517_create_health_impact_types_table.php' ? 'selected' : '' }} value="HealthImpactTypeSeeder">Health Impact Types (T)</option>
                                    <option {{ old('migrate.path') === '2024_04_05_161432_create_health_impacts_table.php' ? 'selected' : '' }} value="HealthImpactSeeder">Health Impacts (T)</option>
                                    <option {{ old('migrate.path') === '2024_07_18_172740_create_glossaries_table.php' ? 'selected' : '' }} value="GlossarySeeder">Glossaries (T)</option>
                                    <option {{ old('migrate.path') === '2024_07_18_172748_create_glossary_terms_table.php' ? 'selected' : '' }} value="GlossaryTermSeeder">Glossary Terms (T)</option>
                                </select>
                            </td>
                            <td>{{ __('Seed table') }}</td>
                            <td>
                                <button formaction="/dev/seed" class="btn btn-link text-decoration-none p-0 border-0">{{ __('Run') }}</button>
                            </td>
                        </tr>
                    </form>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
