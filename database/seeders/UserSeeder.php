<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->insert([
            array(
                'order_id' => 1,
                'username' => 'Admin',
                'email' => 'admin@gfa.de',
                'password' => '$2y$10$YptQLYt4UWfleLNWEW2oLuTdOAlnS.H1g5fttUI6xAcHxdxykRxZy',
                'group_id' => UserGroup::where('shortname', '=', 'admin')->pluck('id')->first(),
                'active' => 1,
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'order_id' => 2,
                'username' => 'Arne',
                'email' => 'a.sibilis@gmx.de',
                'password' => '$2y$10$YptQLYt4UWfleLNWEW2oLuTdOAlnS.H1g5fttUI6xAcHxdxykRxZy',
                'group_id' => UserGroup::where('shortname', '=', 'dev')->pluck('id')->first(),
                'active' => 1,
                'author_id' => 1,
                'created_at' => now()
            ),
            array(
                'order_id' => 3,
                'username' => 'Gast',
                'email' => 'gast@gfa.de',
                'password' => '$2y$10$YptQLYt4UWfleLNWEW2oLuTdOAlnS.H1g5fttUI6xAcHxdxykRxZy',
                'group_id' => UserGroup::where('shortname', '=', 'guest')->pluck('id')->first(),
                'active' => 1,
                'author_id' => 1,
                'created_at' => now()
            )
        ]);

        for($i = 4; $i <= 10; $i++)
        {
            DB::table('users')->insert([
                'order_id' => $i,
                'username' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'group_id' => UserGroup::where('shortname', '=', 'guest')->pluck('id')->first(),
                'active' => 1,
                'author_id' => 1,
                'created_at' => now()
            ]);
        }
    }
}
