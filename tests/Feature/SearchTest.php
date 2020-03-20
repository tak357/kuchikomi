<?php

namespace Tests\Feature;

use App\Models\Item;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        // テストユーザの作成
        $this->user = factory(User::class)->create([
            'name' => '山田太郎',
            'email' => 'phpunit@test.jp',
            'password' => 'Passw0rd',
        ]);

        // テストデータの作成
        factory(Item::class)->create([
            'user_id' => 1,
            'item_name' => 'MacBook Air',
            'category_id' => 2,
            'price' => 148800,
            'buying_url' => 'https://www.amazon.co.jp/dp/B07PRX2Y4W/',
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * サイト内検索のテスト
     */
    public function testSearch()
    {
        // 非ログイン時
        $response = $this->get('/items/search?search_keyword=macbook')
            ->assertViewIs('search_result')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('クチラン！')
            ->assertSeeText('管理者ログイン')
            ->assertSee('/login')
            ->assertDontSeeText('管理者登録')
            ->assertDontSee('/register')
            ->assertDontSeeText('商品を登録する')
            ->assertDontSeeText('ログアウト')
            ->assertSeeText('macbookの検索結果')
            ->assertSeeText('148,800円')
            ->assertDontSee('https://www.amazon.co.jp/dp/B07PRX2Y4W/')
            ->assertDontSeeText('ノートパソコン')
            ->assertSee('item_images/no_image.png')
            ->assertStatus(200);

        // ログイン時
        $response = $this->actingAs($this->user)->get('/items/search?search_keyword=macbook')
            ->assertViewIs('search_result')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('クチラン！')
            ->assertSeeText('商品を登録する')
            ->assertSee('/items/create')
            ->assertSeeText('ログアウト')
            ->assertSee('/logout')
            ->assertDontSeeText('管理者ログイン')
            ->assertDontSee('/login')
            ->assertSeeText('管理者登録')
            ->assertSee('/register')
            ->assertSeeText('macbookの検索結果')
            ->assertSeeText('148,800円')
            ->assertDontSee('https://www.amazon.co.jp/dp/B07PRX2Y4W/')
            ->assertDontSeeText('ノートパソコン')
            ->assertSee('item_images/no_image.png')
            ->assertStatus(200);
    }
}
