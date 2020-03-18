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
            'buying_url' => 'https://www.amazon.co.jp/dp/B081HH999J',
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
            'buying_url' => 'https://www.amazon.co.jp/dp/B07PPMSB5M',
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
            'buying_url' => 'https://www.amazon.co.jp/dp/B07V8MQHRQ',
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
            'buying_url' => 'https://www.amazon.co.jp/dp/B08137MFTZ',
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
            'buying_url' => 'https://www.amazon.co.jp/dp/B07Y2VYHJT',
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
            'buying_url' => 'https://www.amazon.co.jp/dp/B07PNGX1X3',
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
            'buying_url' => 'https://www.amazon.co.jp/dp/B079Z5SXHW',
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
            'buying_url' => 'https://www.amazon.co.jp/dp/B07PMYZ49M',
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
            'buying_url' => 'https://www.lenovo.com/jp/ja/jptvc/desktops/ideacentre/500-series/IdeaCentre-A540-24ICB/p/FFICF500326',
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
            'buying_url' => 'https://www.lenovo.com/jp/ja/desktops/thinkcentre/m-series-small/c/m-series-small',
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
            'buying_url' => 'https://jp.ext.hp.com/desktops/personal/hp_aio_22/',
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
            'buying_url' => 'https://www.dell.com/ja-jp/work/shop/%E8%A3%BD%E5%93%81%E3%82%B7%E3%83%AA%E3%83%BC%E3%82%BA/new-vostro-3471%E3%82%B9%E3%83%A2%E3%83%BC%E3%83%AB%E3%82%B7%E3%83%A3%E3%83%BC%E3%82%B7-%E3%83%97%E3%83%AC%E3%83%9F%E3%82%A2%E3%83%A0%E3%83%A2%E3%83%87%E3%83%AB%E3%83%A2%E3%83%8B%E3%82%BF%E3%83%BC%E4%BB%98/spd/vostro-3471-desktop/cav21403471f04on1ojp',
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
