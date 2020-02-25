<?php

namespace Tests\Unit;

use App\User;
// use App\Models\Item;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testStore()
    {
        // 商品登録できたか画面で確認

        // 商品登録できたかデータベースで確認
        $item = factory(App\Models\Item::class)->make();

        // $this->assertDatabaseHas('items', [
        //     'price' => 200000,
        // ]);

    }
}
