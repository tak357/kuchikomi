<?php

namespace App\Http\Controllers;

use App\Http\Requests\KuchikomiRequest;
use App\Models\Item;
use App\Models\Kuchikomi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KuchikomiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(KuchikomiRequest $request)
    {
        $kuchikomi = new Kuchikomi;

        $kuchikomi->fill([
            'user_id' => 1, // dummy
            'name' => $request->comment_user_name,
            'item_id' => $request->item_id,
            'email' => $request->comment_user_email,
            'score' => $request->score,
            // TODO:画像投稿機能をつける
            'img' => 'testimg', // dummy
            'body' => $request->comment_body,
        ]);

        $items = Item::find($request->item_id);

        // クチコミのスコアを計算
        $items->kuchikomi_count += 1;
        $items->kuchikomi_sum_score += $request->score;
        $items->kuchikomi_avg_score = $items->kuchikomi_sum_score / $items->kuchikomi_count;

        // 保存
        $kuchikomi->save();
        $items->save();

        return redirect()->back()->with('flash_message', 'クチコミを投稿しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(kuchikomi $kuchikomi)
    {
        // クチコミスコアを再計算する処理
        $item = new Item();
        $item->kuchikomiScoreRecalculation($kuchikomi);

        $kuchikomi->delete();

        return redirect()->back()->with('flash_message', 'クチコミを削除しました。');
        // return back()->with('flash_message', 'クチコミを削除しました。');
    }
}
