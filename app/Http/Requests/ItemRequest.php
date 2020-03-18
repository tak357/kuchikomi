<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'item_name' => 'required|max:128',
            'category_id' => 'required|not_in:0',
            'price' => 'required|integer|max:999999999',    // 価格が1,000万円以上はエラーにする
            'buying_url' => 'required|url',
            'tag' => 'max:128',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array|void
     */
    public function messages()
    {
        return [
            'item_name.required' => '商品名は必ず入力してください',
            'item_name.max' => '商品名は128文字以内で入力してください',
            'category_id.required' => 'カテゴリーは必ず選択してください',
            'category_id.not_in' => 'カテゴリーは必ず選択してください',
            'price.required' => '価格は必ず入力してください',
            'price.integer' => '価格は整数（半角数字）で入力してください',
            'price.max' => '価格は999999999以下（1千万）以下で入力してください',
            'buying_url.required' => '購入URLを入力してください',
            'buying_url.url' => '購入URLは正しいURLで入力してください',
            'tag.max' => 'タグは128文字以下で入力してください',
        ];
    }
}
