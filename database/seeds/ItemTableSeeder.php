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
            'category_id' => 2,
            'price' => 248800,
            'kuchikomi_count' => 4,
            'kuchikomi_sum_score' => 13,
            'kuchikomi_avg_score' => 3.25,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/img_01_mbp16.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'MacBook Pro 13インチ',
            'category_id' => 2,
            'price' => 198800,
            'kuchikomi_count' => 1,
            'kuchikomi_sum_score' => 5,
            'kuchikomi_avg_score' => 5,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/img_02_mbp13.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'MacBook Air',
            'category_id' => 2,
            'price' => 148800,
            'kuchikomi_count' => 1,
            'kuchikomi_sum_score' => 3,
            'kuchikomi_avg_score' => 3,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/img_03_mba2018.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Surface Pro7',
            'category_id' => 1,
            'price' => 198800,
            'kuchikomi_count' => 0,
            'kuchikomi_sum_score' => 0,
            'kuchikomi_avg_score' => 0,
            'tag' => 'タブレット型',
            'item_image' => 'item_images/img_04_surfacepro7.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Surface Laptop3',
            'category_id' => 1,
            'price' => 238800,
            'kuchikomi_count' => 0,
            'kuchikomi_sum_score' => 0,
            'kuchikomi_avg_score' => 0,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/img_05_surface_laptop3.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'iMac 5k',
            'category_id' => 4,
            'price' => 208800,
            'kuchikomi_count' => 0,
            'kuchikomi_sum_score' => 0,
            'kuchikomi_avg_score' => 0,
            'tag' => '27inch',
            'item_image' => 'item_images/img_06_imac5k.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'iMac Pro',
            'category_id' => 4,
            'price' => 508800,
            'kuchikomi_count' => 0,
            'kuchikomi_sum_score' => 0,
            'kuchikomi_avg_score' => 0,
            'tag' => '27inch',
            'item_image' => 'item_images/img_07_imacpro.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Surface Studio2',
            'category_id' => 3,
            'price' => 498800,
            'kuchikomi_count' => 0,
            'kuchikomi_sum_score' => 0,
            'kuchikomi_avg_score' => 0,
            'tag' => '27inch',
            'item_image' => 'item_images/img_08_surface_studion2.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Lenovo IdeaCentre A540',
            'category_id' => 3,
            'price' => 63954,
            'kuchikomi_count' => 0,
            'kuchikomi_sum_score' => 0,
            'kuchikomi_avg_score' => 0,
            'tag' => '',
            'item_image' => 'item_images/img_09_ideacentre.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Lenovo ThinkCenter',
            'category_id' => 3,
            'price' => 52690,
            'kuchikomi_count' => 0,
            'kuchikomi_sum_score' => 0,
            'kuchikomi_avg_score' => 0,
            'tag' => '',
            'item_image' => 'item_images/img_10_thinkcentre.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'HP All-in-One 22',
            'category_id' => 3,
            'price' => 37800,
            'kuchikomi_count' => 0,
            'kuchikomi_sum_score' => 0,
            'kuchikomi_avg_score' => 0,
            'tag' => '',
            'item_image' => 'item_images/img_11_hp.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('items')->insert([
            'user_id' => 1,
            'item_name' => 'Dell Vostro3471',
            'category_id' => 3,
            'price' => 52980,
            'kuchikomi_count' => 0,
            'kuchikomi_sum_score' => 0,
            'kuchikomi_avg_score' => 0,
            'tag' => 'モニター別売',
            'item_image' => 'item_images/img_12_dell.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // factory(\App\Models\Item::class, 10)->create();

    }
}
