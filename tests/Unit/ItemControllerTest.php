<?php

namespace Tests\Unit;

use App\User;
use App\Models\Item;
use Illuminate\Support\Facades\App;
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

    public function test_post_controller()
    {
        // 商品登録できたか画面で確認

        // 商品登録できたかデータベースで確認
        // TODO:以下の文言でコケる
        // InvalidArgumentException: Unable to locate factory with name [default] [App\Models\Item].
        // $item = factory(Item::class)->create();

        // $this->assertDatabaseHas('items', [
        //     'price' => 200000,
        // ]);

    }
}
