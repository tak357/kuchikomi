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
        $response = $this->get('/form')
            ->assertViewIs('forms.index')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('クチラン！')
            ->assertSeeText('管理者ログイン')
            ->assertSee('/login')
            ->assertDontSeeText('管理者登録')
            ->assertDontSee('/register')
            ->assertDontSeeText('商品を登録する')
            ->assertDontSeeText('ログアウト')
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
     */
    public function testConfirm()
    {
        $response = $this->get('/form/confirm?name=name_test&email=test%40yahoo.co.jp&subject=test_subject&body=test_body')
            ->assertViewIs('forms.confirm')
            ->assertSeeInOrder(['<html', '<head', '<body', '<h1'])
            ->assertSeeText('クチラン！')
            ->assertSeeText('管理者ログイン')
            ->assertSee('/login')
            ->assertDontSeeText('管理者登録')
            ->assertDontSee('/register')
            ->assertDontSeeText('商品を登録する')
            ->assertDontSeeText('ログアウト')
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
}
