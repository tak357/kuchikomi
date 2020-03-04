<?php

use Illuminate\Database\Seeder;

class KuchikomiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'item_id' => 1,
            'name' => 'クチコミ職人',
            'email' => '',
            'body' => 'ベリーグッド！',
            'img' => 'test',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
        DB::table('kuchikomis')->insert($param);

        $param = [
            'user_id' => 0,
            'item_id' => 1,
            'name' => 'ガジェットオタク',
            'email' => '',
            'body' => 'まずまず',
            'img' => 'test',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
        DB::table('kuchikomis')->insert($param);

        $param = [
            'user_id' => 0,
            'item_id' => 1,
            'name' => '家電マスター',
            'email' => '',
            'body' => 'コスパは良し。
            キーボードも改善されてグッド。',
            'img' => 'test',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
        DB::table('kuchikomis')->insert($param);
    }
}
