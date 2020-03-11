<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'テストユーザー',
            'email' => 'test@example.jp',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => '管理人１',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => '管理人２',
            'email' => 'test@example.net',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => '管理人３',
            'email' => 'test@example.org',
            'password' => bcrypt('password'),
        ]);
    }
}
