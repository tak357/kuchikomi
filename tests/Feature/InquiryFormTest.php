<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InquiryFormTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * view: forms.index
     **/
    public function testIndex()
    {
        $path = '/form';
        $view = 'forms.index';

        $this->viewCheck($path, $view);

        $response = $this->get('/form')
            ->assertSeeText('お問い合わせフォーム')
            ->assertSeeText('名前')
            ->assertSeeText('Eメールアドレス')
            ->assertSeeText('件名')
            ->assertSeeText('本文')
            ->assertSeeText('確認')
            ->assertStatus(200);
    }

    /**
     * view: forms.confirm
     * 以下情報を送信してテスト
     * 名前：name_test
     * Eメールアドレス：test@yahoo.co.jp
     * 件名：test_subject
     * 本文：test_body
     */
    public function testConfirm()
    {
        $path = '/form/confirm?name=name_test&email=test%40yahoo.co.jp&subject=test_subject&body=test_body';
        $view = 'forms.confirm';

        $this->viewCheck($path, $view);

        $response = $this->get($path)
            ->assertSeeText('お問い合わせ内容確認')
            ->assertSeeText('名前')
            ->assertSeeText('name_test')
            ->assertSeeText('Eメールアドレス')
            ->assertSeeText('test@yahoo.co.jp')
            ->assertSeeText('件名')
            ->assertSeeText('test_subject')
            ->assertSeeText('本文')
            ->assertSeeText('test_body')
            ->assertSeeText('確認')
            ->assertSeeText('修正する')
            ->assertSeeText('送信する')
            ->assertStatus(200);
    }

    /**
     * 外観チェック
     * @param $path
     * @param $view
     */
    public function viewCheck($path, $view)
    {
        $response = $this->get($path)
            ->assertViewIs($view)
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            // ヘッダー
            ->assertSeeText('クチラン！')
            ->assertSeeText('最強口コミランキング')
            // グローバルメニュー
            ->assertSeeText('管理者ログイン')
            ->assertSee('/login')
            ->assertSeeText('お問い合わせ')
            ->assertSee('/form')
            ->assertDontSeeText('管理者登録')
            ->assertDontSee('/register')
            ->assertDontSeeText('商品を登録する')
            ->assertDontSee('/create')
            ->assertDontSeeText('ログアウト')
            ->assertDontSee('/logout')
            // サイドバー
            ->assertSeeText('サイト内検索')
            ->assertSeeText('カテゴリー')
            ->assertSeeText('カテゴリートップ')
            ->assertSeeText('ノートパソコン（Windows）')
            ->assertSeeText('クチコミ人気ランキング')
            // フッター
            ->assertSeeText('copyright クチラン')
            ->assertStatus(200);
    }
}
