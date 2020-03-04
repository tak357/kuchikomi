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
            'name' => 'コメント職人',
            'email' => '',
            'body' => 'ベリーグッド！',
            'img' => 'test',
        ];
        DB::table('kuchikomis')->insert($param);
    }
}
