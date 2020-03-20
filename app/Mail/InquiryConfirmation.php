<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;
    protected $name;
    protected $mail_subject;
    protected $body;

    /**
     * コンストラクター
     * @param  $form
     */
    // public function __construct($email, string $name, string $subject, $body)
    public function __construct($form)
    {
        $this->email = $form->email;
        $this->name = $form->name;
        $this->mail_subject = $form->subject;
        $this->body = $form->body;
    }

    /**
     * メッセージ内容を作成する
     * @return $this
     */
    public function build()
    {
        return $this->from('info.kuchikomi7@gmail.com')
            ->subject('自動送信メール')
            ->view('mail.confirm_mail')
            ->with([
                'email' => $this->email,
                'name' => $this->name,
                'subject' => $this->mail_subject,
                'body' => $this->body,
            ]);
    }
}
