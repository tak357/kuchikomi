<?php

namespace Tests\Feature;

use App\Models\Item;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

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

        // ダミーユーザーの作成
        factory(User::class, 10)->create();

        // テストデータの作成
        factory(Item::class)->create([
            'user_id' => 1,
            'item_name' => 'MacBook Air',
            'category_id' => 2,
            'price' => 148800,
            'tag' => 'ノートパソコン',
            'buying_url' => 'https://www.amazon.co.jp/dp/B07PRX2Y4W/',
            'item_image' => 'item_images/no_image.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // ダミーデータの作成
        // factory(Item::class, 10)->create();
    }

    /**
     * トップページの確認
     * 確認項目：ステータスコード、ビュー、タイトル
     */
    public function testIndex()
    {
        // 非ログイン時
        $response = $this->get('/')
            ->assertViewIs('top')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('クチラン！')
            ->assertSeeText('管理者ログイン')
            ->assertSee('/login')
            ->assertSeeText('管理者登録')
            ->assertSee('/register')
            ->assertDontSeeText('商品を登録する')
            ->assertDontSeeText('ログアウト')
            ->assertStatus(200);

        // ログイン時
        $response = $this->actingAs($this->user)->get('/')
            ->assertViewIs('top')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('クチラン！')
            ->assertSeeText('商品を登録する')
            ->assertSee('/items/create')
            ->assertSeeText('ログアウト')
            ->assertSee('/logout')
            ->assertDontSeeText('管理者ログイン')
            ->assertDontSee('/login')
            ->assertDontSeeText('管理者登録')
            ->assertDontSee('/register')
            ->assertStatus(200);
    }

    /**
     * ログインページの確認
     * 確認項目：ステータスコード
     */
    public function testLogin(): void
    {
        $response = $this->get('/login')
            ->assertViewIs('auth.login')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('ログイン')
            ->assertStatus(200);
    }

    /**
     * 管理者登録ページの確認
     * 確認項目：ステータスコード
     */
    public function testRegister()
    {
        $response = $this->get('/register')
            ->assertViewIs('auth.register')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('管理者登録')
            ->assertStatus(200);
    }

    /**
     * 商品登録ページの確認
     * 確認項目：ステータスコード(200)
     */
    public function testCreate()
    {
        // 認証ではじかれるケース
        $response = $this->get('/items/create')
            ->assertStatus(302);

        $response = $this->actingAs($this->user)
            ->get('/items/create')
            ->assertViewIs('items.create')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('商品登録')
            ->assertDontSeeText('編集ページ')
            ->assertStatus(200);
    }

    /**
     * モデル（Item）のテスト
     * 確認項目：テストデータの格納
     */
    public function testModelItem()
    {
        // テストデータをデータベースに格納
        factory(Item::class)->create([
            'user_id' => $this->user->id,
            'item_name' => 'MacBook Pro 16インチ',
            'category_id' => 2,
            'price' => 248800,
            'buying_url' => 'https://www.amazon.co.jp/dp/B07PRX2Y4W/',
            'kuchikomi_count' => 4,
            'kuchikomi_sum_score' => 13,
            'kuchikomi_avg_score' => 3.25,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/mbp16.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // テストデータがデータベースに格納されていることを確認
        $this->assertDatabaseHas('items', [
            'user_id' => $this->user->id,
            'item_name' => 'MacBook Pro 16インチ',
            'category_id' => 2,
            'price' => 248800,
            'buying_url' => 'https://www.amazon.co.jp/dp/B07PRX2Y4W/',
            'kuchikomi_count' => 4,
            'kuchikomi_sum_score' => 13,
            'kuchikomi_avg_score' => 3.25,
            'tag' => 'ノートパソコン',
            'item_image' => 'item_images/mbp16.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 登録したテストデータ以外がデータベースに格納されていないことを確認
        $this->assertDatabaseMissing('items', [
            'item_name' => 'Dummy',
            'category_id' => 1,
            'price' => 123456,
            'buying_url' => 'https://www.amazon.co.jp/',
            'kuchikomi_count' => 123456,
            'kuchikomi_sum_score' => 123456,
            'kuchikomi_avg_score' => 5,
            'tag' => 'Dummy',
            'item_image' => 'item_images/xxx.jpeg',
        ]);
    }

    /**
     * 商品詳細ページの確認
     * 確認項目：ビュー、文言、ステータスコード(200,404)
     */
    public function testShow()
    {
        // 正常にページ遷移できるケース（200)
        $response = $this->get('/items/1')
            ->assertViewIs('items.detail')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('MacBook Air')
            ->assertStatus(200);

        // 正常にページ遷移ができないケース(404)
        $response = $this->get('/items/999')->assertStatus(404);
        $response = $this->get('/items/aaa')->assertStatus(404);
    }

    /**
     * 商品編集ページの確認
     * 確認項目：ビュー、文言、ステータスコード(200,404)
     */
    public function testEdit()
    {
        // 認証ではじかれるケース
        $response = $this->get('/items/1/edit')
            ->assertStatus(302);

        $response = $this->actingAs($this->user)
            ->get('/items/1/edit')
            ->assertViewIs('items.edit')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('MacBook Airの編集ページ')
            ->assertStatus(200);

        // ページが見つからないケース(404)
        $response = $this->get('/items/999/edit')->assertStatus(404);
        $response = $this->get('/items/aaa/edit')->assertStatus(404);

        $this->actingAs($this->user)->delete('items', [
            'id' => 1,
        ]);
    }

    /**
     * サイト内検索のテスト
     * 「Macbook Air」で検索し、商品名、価格等が正しく出力されているかテストする
     */
    public function testSearch()
    {
        $response = $this->get('/items/search?search_keyword=MacBook Air')
            ->assertViewIs('search_result')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('MacBook Airの検索結果')
            ->assertSeeText('148,800円')
            ->assertStatus(200);
    }
}
