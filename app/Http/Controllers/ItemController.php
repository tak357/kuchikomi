<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Kuchikomi;
use App\User;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ItemController extends Controller
{
    /**
     * 商品登録フォームを表示する
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * 商品情報の登録
     *
     * @param  ItemRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ItemRequest $request)
    {
        // 受け取った内容をデータベースに保存する
        self::saveReceivedContent($request);

        return redirect('/')->with('flash_message', '商品を登録しました。');
    }

    /**
     * 商品の詳細情報の表示
     *
     * @param  item  $item
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(item $item)
    {
        // 投稿者の情報を取得
        $item_creator = User::where('id', $item->user_id)->first();

        // クチコミ情報の取得
        $kuchikomis = Kuchikomi::where('item_id', $item->id)->get();

        return view('items.detail', [
            'item' => $item,
            'item_creator' => $item_creator,
            'kuchikomis' => $kuchikomis,
        ]);
    }

    /**
     * 商品情報編集のフォームを表示する
     *
     * @param  item  $item
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(item $item)
    {
        return view('items.edit', [
            'item' => $item,
        ]);
    }

    /**
     * データベース内の商品情報を更新する
     *
     * @param  ItemRequest  $request  , item  $item
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ItemRequest $request, item $item)
    {
        // 受け取った内容をデータベースに保存する
        self::saveReceivedContent($request);

        return redirect('/')->with('flash_message', '商品情報を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     * 商品情報を削除する
     * @param  item  $item
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(item $item)
    {
        $item->delete();

        return redirect('/')->with('flash_message', 'アイテムを削除しました。');
    }

    /**
     * サイト内検索機能
     * （検索対象：商品名(item_name））
     *
     * @param  Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search_keyword = $request->input('search_keyword');

        // クエリ生成
        $query = Item::query();

        // 検索キーワードとマッチング
        if (!empty($search_keyword)) {
            $query->where('item_name', 'like', '%'.$search_keyword.'%');
        }

        // ページネーション
        $items = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('search_result', [
            'items' => $items,
            'search_keyword' => $search_keyword,
        ]);
    }

    /**
     * データベースに保存する
     * @param $request
     * @pram item $item
     */
    // public function isNullImage($request, $item): void
    public function saveReceivedContent($request): void
    {
        $item = new Item;

        // 画像がアップロードされたか判定し、アップロードされていない（NULL）場合はデフォルト画像のパスをセットする
        if (is_null($request->item_image)) {
            $item->fill(['item_image' => 'item_images/no_image.png']);
        } else {
            $item->fill(['item_image' => $request->item_image->store('public/item_images')]);
            // パス名の修正
            $item['item_image'] = str_replace('public/', '', $item['item_image']);
        }

        $item->fill([
            'user_id' => Auth::user()->id,
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'tag' => $request->tag,
        ]);

        $item->save();
    }
}
