<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memberships')->insert([

            array(
                'order_id' => 1,
                'project_id' => 1,
                'user_id' => 2,
                'role_id' => Role::where('shortname', '=', 'operator')->pluck('id')->first(),
                'active' => true,
                'author_id' => 2,
                'created_at' => now()
            )
        ]);
    }
}
