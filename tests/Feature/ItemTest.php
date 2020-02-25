<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class ItemTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

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
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get('/items/create')
            ->assertViewIs('items.create')
            ->assertSeeText('商品登録')
            ->assertStatus(200);
    }
}
