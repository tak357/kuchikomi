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
        $param = [
            'name' => 'テストユーザー',
            'email' => 'test@example.jp',
            'password' => bcrypt('password'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '佐々木小次郎',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '宮本武蔵',
            'email' => 'test@example.net',
            'password' => bcrypt('password'),
        ];
        DB::table('users')->insert($param);

    }
}
