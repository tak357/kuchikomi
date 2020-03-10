<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Kuchikomi;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Item::select('items.*')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);
        $items = Item::all()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('top', ['items' => $items]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $item = new Item;

        $item->fill([
            'user_id' => Auth::user()->id,
            'item_name' => $request->itemName,
            'category' => $request->category,
            'price' => $request->price,
            'tag' => $request->tag,
            'item_image' => $request->itemImage,
        ]);
        $item->save();

        return redirect('items/create')->with('flash_message', '商品を登録しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        // クチコミ情報の取得
        $kuchikomis = Kuchikomi::where('item_id', $item->id)->get();

        return view('items.detail', ['item' => $item, 'kuchikomis' => $kuchikomis]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        return view('items.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, item $item)
    {
        $updated_item = $item->fill([
            'user_id' => Auth::user()->id,
            'item_name' => $request->item_name,
            'category' => $request->category,
            'price' => $request->price,
            'tag' => $request->tag,

            // TODO: 画像アップロード機能の実装
            // 'item_image' => $request->item_image,
        ]);

        $updated_item->save();

        return redirect('/')->with('flash_message', '商品情報を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        $item->delete();

        return redirect('/')
            ->with('flash_message', 'アイテムを削除しました。');
    }

    /**
     * サイト内検索機能（検索対象：商品名(item_name））
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
            $query->where('item_name', 'like', '%' . $search_keyword . '%');
        }

        // ページネーション
        $items = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('search_result', ['items' => $items, 'search_keyword' => $search_keyword]);
    }
}
