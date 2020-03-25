<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * カテゴリー作成ページへreturn
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * カテゴリーを新規作成
     * @param  CategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->new_category_title;
        $category->save();

        return redirect('categories')->with('flash_message', '新カテゴリーを作成しました');
    }

    /**
     * カテゴリー修正ページにreturn
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', ['category' => $category]);
    }

    /**
     * カテゴリー修正
     * @param  CategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CategoryRequest $request)
    {
        $category = Category::find($request->old_category_title);

        $category->title = $request->new_category_title;
        $category->save();

        return redirect('categories')->with('flash_message', 'カテゴリーを修正しました');
    }

    /**
     * カテゴリー削除
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('flash_message', 'カテゴリーを削除しました');
    }

}
