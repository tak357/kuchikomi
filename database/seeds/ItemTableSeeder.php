<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ItemTableSeeder extends Seeder
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
            'item_name' => 'MacBook Pro 16インチ',
            'category' => 1,
            'price' => 250000,
            'tag' => 'ノートパソコン',
            'item_image' => 'dummy',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];


        DB::table('items')->insert($param);

        $param = [
            'user_id' => 2,
            'item_name' => 'MacBook Pro 13インチ',
            'category' => 1,
            'price' => 200000,
            'tag' => 'ノートパソコン',
            'item_image' => 'dummy',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        DB::table('items')->insert($param);


        $param = [
            'user_id' => 1,
            'item_name' => 'MacBook Air',
            'category' => 1,
            'price' => 150000,
            'tag' => 'ノートパソコン',
            'item_image' => 'dummy',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        DB::table('items')->insert($param);

        factory(\App\Models\Item::class, 10)->create();

    }
}
