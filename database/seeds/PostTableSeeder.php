<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'title' => 'TestTitle',
            'content' => 'TestContent',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        
        DB::table('posts')->insert($param);
    }
}