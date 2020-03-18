<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * カテゴリー一覧ページを出力する
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $category = Category::all();

        return view('categories.index', ['categories' => $category]);
    }

    /**
     * 選択されたカテゴリー内の記事一覧を出力する
     *
     * @param  Category  $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category)
    {
        $items = Item::where('category_id', $category->id)->paginate(10);;

        return view('categories.detail', [
            'categories' => $category,
            'items' => $items,
        ]);
    }
}
