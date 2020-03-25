<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'new_category_title' => 'required|unique:categories,title'
        ];
    }

    public function messages()
    {
        return [
            'new_category_title.required' => 'カテゴリー名を入力してください',
            'new_category_title.unique' => '既存カテゴリー名と重複しています',
        ];
    }
}
