<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'email.required' => 'Eメールアドレスを入力してください',
            'email.email' => 'Eメールアドレスを正しく入力してください',
            'subject.required' => '件名を入力してください',
            'body.required' => '本文を入力してください',
        ];
    }
}
