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
        DB::table('kuchikomis')->insert([
            'user_id' => 1,
            'item_id' => 1,
            'name' => 'クチコミ職人',
            'email' => '',
            'score' => 5,
            'body' => '今朝注文しました！期待を込めて星5です！',
            'img' => 'test',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('kuchikomis')->insert([
            'user_id' => 0,
            'item_id' => 1,
            'name' => 'ガジェットオタク',
            'email' => '',
            'score' => 3,
            'body' => 'まずまず',
            'img' => 'test',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('kuchikomis')->insert([
            'user_id' => 0,
            'item_id' => 1,
            'name' => '家電マスター',
            'email' => '',
            'score' => 4,
            'body' => 'コスパは良し。
            キーボードも改善されてグッド。
            メモリがもう少し多ければ最高。',
            'img' => 'test',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('kuchikomis')->insert([
            'user_id' => 0,
            'item_id' => 1,
            'name' => '辛口批評家',
            'email' => '',
            'score' => 1,
            'body' => '全然ダメ。バッテリーもたない。',
            'img' => 'test',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
