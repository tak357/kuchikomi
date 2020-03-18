<?php

namespace App\Http\Controllers;

use App\Http\Requests\KuchikomiRequest;
use App\Models\Item;
use App\Models\Kuchikomi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KuchikomiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(KuchikomiRequest $request)
    {
        $kuchikomi = new Kuchikomi;

        // ログインユーザーならユーザーIDをセット、非ログインユーザーなら0をセット
        if (isset(Auth::user()->id)) {
            $kuchikomi->fill(['user_id' => Auth::user()->id]);
        } else {
            $kuchikomi->fill(['user_id' => 0]);
        }

        $kuchikomi->fill([
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Kuchikomi $kuchikomi)
    {
        // クチコミスコアを再計算する処理
        $item = new Item();
        $item->kuchikomiScoreRecalculation($kuchikomi);

        $kuchikomi->delete();

        return redirect()->back()->with('flash_message', 'クチコミを削除しました。');
    }
}
