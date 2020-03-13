<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KuchikomiRequest extends FormRequest
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
            'comment_user_name' => 'required',
            'score' => 'required|between:1,5',
            'comment_body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'comment_user_name.required' => '名前は必ず入力してください',
            'comment_body.required' => '本文は必ず入力してください',
        ];
    }
}
