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

    public function setUp(): void
    {
        parent::setUp();
        // テストデータのセット
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
    }

    /**
     * トップページの確認
     * 確認項目：ステータスコード、ビュー、タイトル
     */
    public function testIndex()
    {
        $response = $this->get('/')
            ->assertViewIs('top')
            ->assertSeeText('クチラン！')
            ->assertStatus(200);
    }

    /**
     * ログインページの確認
     * 確認項目：ステータスコード
     */
    public function testLogin()
    {
        $response = $this->get('/login')
            ->assertStatus(200);
    }

    /**
     * ログイン認証の確認
     * 確認項目：認証状態
     */
    public function testLogin2()
    {
        $user = factory(User::class)->create();

        // まだ、認証されていないことを確認
        $this->assertFalse(Auth::check());

        // 異なるパスワードでログインを実行
        $response = $this->post('login', [
            'email' => $user->email,
            'password' => $user->password.'dummy',
        ]);

        // 認証失敗で、認証されていないことを確認
        $this->assertFalse(Auth::check());
    }

    // public function testLogin3()
    // {
    //     $user = factory(User::class)->create();
    //
    //     // 正しいパスワードでログインを実行
    //     $response = $this->post('login', [
    //         'email' => $user->email,
    //         'password' => $user->password,
    //     ]);

    // TODO:認証成功で、認証されていることを確認
    // $this->assertTrue(Auth::check());
    // dd($this);
    // }

    /**
     * 管理者登録ページの確認
     * 確認項目：ステータスコード
     */
    public function testRegister()
    {
        $response = $this->get('/register')
            ->assertViewIs('auth.register')
            ->assertSeeText('管理者登録')
            ->assertStatus(200);
    }

    /**
     * 商品登録ページの確認
     * 確認項目：ステータスコード(200)
     */
    public function testCreate()
    {
        $response = $this->get('/items/create')
            ->assertViewIs('items.create')
            ->assertSeeText('商品登録')
            ->assertStatus(200);
    }

    /**
     * 商品詳細ページの確認
     * 確認項目：ビュー、文言、ステータスコード(200,404)
     */
    public function testShowDetail()
    {
        // ページが見つかるケース（200)
        $response = $this->get('/items/1')
            ->assertViewIs('items.detail')
            ->assertSeeText('MacBook Air')
            ->assertStatus(200);

        // ページが見つからないケース その１(404)
        $response = $this->get('/items/999')
            ->assertStatus(404);

        // ページが見つからないケース その２(404)
        $response = $this->get('/items/aaa')
            ->assertStatus(404);
    }

    /**
     * 商品編集ページの確認
     * 確認項目：ビュー、文言、ステータスコード(200,404)
     */
    public function testEdit()
    {
        // ページが見つかるケース（200)
        $response = $this->get('/items/1/edit')
            ->assertViewIs('items.edit')
            ->assertSeeText('MacBook Airの編集ページ')
            ->assertStatus(200);

        // ページが見つからないケース(404)
        $response = $this->get('/items/1/aaa')
            ->assertStatus(404);
    }
}
