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
    // 画像がアップロードされなかった時にセットされるデフォルト画像のパス
    const NO_IMAGE_PATH = 'item_images/no_image.png';
    const STORAGE_PATH = 'public/item_images';

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
        $item = new Item();

        if (is_null($request->item_image)) {
            $item->fill(['item_image' => self::NO_IMAGE_PATH]);
        } else {
            $item->fill(['item_image' => $request->item_image->store(self::STORAGE_PATH)]);
            // パス名の修正
            $item['item_image'] = str_replace('public/', '', $item['item_image']);
        }

        // データベースに保存する
        $this->fillItem($request, $item);

        return redirect('/')->with('flash_message', '商品を登録しました。');
    }

    /**
     * 商品の詳細情報の表示
     *
     * @param  Item  $item
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Item $item)
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
     * @param  Item  $item
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Item $item)
    {
        return view('items.edit', [
            'item' => $item,
        ]);
    }

    /**
     * 商品情報を更新する
     *
     * @param  ItemRequest  $request
     * @param  Item  $item
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ItemRequest $request, Item $item)
    {
        // 画像がアップロードされたか判定し、アップロードされたら反映する。
        // アップロードされていない場合は以前の画像をそのまま使用する
        if (is_null($request->item_image)) {
            if ($item->item_image === self::NO_IMAGE_PATH) {
                $item->fill(['item_image' => self::NO_IMAGE_PATH]);
            }
        } else {
            $item->fill(['item_image' => $request->item_image->store(self::STORAGE_PATH)]);
            // パス名の修正
            $item['item_image'] = str_replace('public/', '', $item['item_image']);
        }

        // データベースに保存する
        $this->fillItem($request, $item);

        return redirect('/')->with('flash_message', '商品情報を更新しました。');
    }

    /**
     * 商品情報を削除する
     *
     * @param  Item  $item
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect('/')->with('flash_message', '記事を削除しました。');
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
     * 入力された項目をデータベースに保存する
     *
     * @param $request
     * @param $item
     * @return Item $item
     */
    public function fillItem(Request $request, Item $item): void
    {
        $item->fill([
            'user_id' => Auth::user()->id,
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'buying_url' => $request->buying_url,
            'price' => $request->price,
            'tag' => $request->tag,
        ]);

        $item->save();
    }
}
