<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $participantPermissions = $this->getPermissions(false);

        $operatorPermissions = $this->getPermissions(false);
        $operatorPermissions['projects']['access'] = true;
        $operatorPermissions['projects']['privileges']['create']['status'] = true;
        $operatorPermissions['projects']['privileges']['edit']['status'] = true;
        $operatorPermissions['memberships']['access'] = true;
        $operatorPermissions['memberships']['privileges']['create']['status'] = true;
        $operatorPermissions['memberships']['privileges']['edit']['status'] = true;
        $operatorPermissions['users']['access'] = true;
        $operatorPermissions['users']['privileges']['create']['status'] = true;
        $operatorPermissions['users']['privileges']['edit']['status'] = true;

        Model::unguard();
        Schema::disableForeignKeyConstraints();
        DB::table('user_groups')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('user_groups')->insert([
            array(
                'shortname' => 'admin',
                'name' => 'Administrator',
                'status' => 'hidden',
                'created_at' => now(),
                'permissions' => json_encode($this->getPermissions())
            ),
            array(
                'shortname' => 'dev',
                'name' => 'Developer',
                'status' => 'active',
                'created_at' => now(),
                'permissions' => json_encode($this->getPermissions())
            ),
            array(
                'shortname' => 'operator',
                'name' => 'Operator',
                'status' => 'active',
                'created_at' => now(),
                'permissions' => json_encode($operatorPermissions)
            ),
            array(
                'shortname' => 'participant',
                'name' => 'Participant',
                'status' => 'active',
                'created_at' => now(),
                'permissions' => json_encode($participantPermissions)
            ),
            array(
                'shortname' => 'guest',
                'name' => 'Guest',
                'status' => 'active',
                'created_at' => now(),
                'permissions' => json_encode([
                    'data' => [
                        'name' => 'Data',
                        'color' => '#667',
                        'access' => false,
                        'privileges' => [
                            'export' => false
                        ]
                    ],
                    'files' => [
                        'name' => 'Files',
                        'color' => '#6b6',
                        'access' => false,
                        'privileges' => []
                    ],
                    'questionnaires' => [
                        'name' => 'Questionnaires',
                        'color' => '#b86',
                        'access' => true,
                        'privileges' => [
                            'read' => true,
                            'edit' => false,
                            'create' => false,
                            'delete' => false
                        ]
                    ],
                    'users' => [
                        'name' => 'User Management',
                        'color' => '#66b',
                        'access' => false,
                        'privileges' => [
                            'read' => false,
                            'edit' => false,
                            'create' => false,
                            'delete' => false
                        ]
                    ],
                    'user-groups' => [
                        'name' => 'User Groups',
                        'color' => '#68b',
                        'access' => false,
                        'privileges' => [
                            'create' => false,
                            'edit' => false,
                            'disable' => false,
                            'delete' => false
                        ]
                    ]
                ])
            )
        ]);

        Model::reguard();
    }

    private function getPermissions($grantPermissions = true)
    {
        $permissions = [];
        foreach(Section::all() as $section)
        {
            $permissions[$section['shortname']]['name'] = $section['name'];
            $permissions[$section['shortname']]['color'] = $section['color']['hex'];
            $permissions[$section['shortname']]['access'] = $grantPermissions;
            $privileges = Permission::where('section', '=', $section['shortname'])->pluck('privilege');
            foreach($privileges as $privilege)
            {
                $permissions[$section['shortname']]['privileges'][$privilege]['status'] = $grantPermissions;
            }
        }
        return $permissions;
    }
}
