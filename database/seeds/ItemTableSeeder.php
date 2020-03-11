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
        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'MacBook Pro 16インチ',
            'category' => 2,
            'price' => 248800,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'MacBook Pro 13インチ',
            'category' => 2,
            'price' => 198800,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'MacBook Air',
            'category' => 2,
            'price' => 148800,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Surface Pro7',
            'category' => 1,
            'price' => 198800,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Surface Laptop3',
            'category' => 1,
            'price' => 238800,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'iMac 5k',
            'category' => 4,
            'price' => 208800,
            'tag' => '27inch',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'iMac Pro',
            'category' => 4,
            'price' => 508800,
            'tag' => '27inch',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Surface Studio2',
            'category' => 3,
            'price' => 498800,
            'tag' => '27inch',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Lenovo IdeaCentre A540',
            'category' => 3,
            'price' => 63954,
            'tag' => '',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Lenovo ThinkCenter',
            'category' => 3,
            'price' => 52690,
            'tag' => '',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'HP All-in-One 22',
            'category' => 3,
            'price' => 37800,
            'tag' => '',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Dell Vostro3471',
            'category' => 3,
            'price' => 52980,
            'tag' => 'モニター別売',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // factory(\App\Models\Item::class, 10)->create();

    }
}
