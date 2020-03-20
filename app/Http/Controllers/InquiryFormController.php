<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryFormRequest;
use App\Mail\InquiryConfirmation;
use App\Models\InquiryForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InquiryFormController extends Controller
{
    public function index()
    {
        return view('forms.index');
    }

    public function confirm(InquiryFormRequest $request)
    {
        $form = new InquiryForm();

        $form->fill([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return view('forms.confirm', ['form' => $form]);
    }

    /**
     * お問い合わせ内容をデータベースに保存する
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(InquiryFormRequest $request)
    {
        $action = $request->input('action');

        // actionの値が'submit'以外なら入力フォームにリダイレクトする
        if ($action !== 'submit') {
            return redirect()->route('form')->withInput();
        } else {
            $form = new InquiryForm();

            $form->fill([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'body' => $request->body,
            ]);

            $form->save();

            // 入力されたメールアドレスにメールを送信
            Mail::to($form['email'])->send(new InquiryConfirmation($form));

            // 再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();

            return redirect('/')->with('flash_message', 'お問い合わせを受け付けました。');
        }
    }
}
