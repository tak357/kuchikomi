<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = ['id'];

    /**
     * クチコミスコア上位３製品を出力する
     * @return string
     */
    public static function kuchkomiRankingOutput()
    {
        // TODO:クチコミ登録された商品が3件未満の時の処理を追加

        $ranking_items = Item::orderBy('kuchikomi_avg_score', 'desc')->limit(3)->get();

        return $ranking_items;
    }

    /**
     * クチコミ関連の数値を再計算する
     * @param $kuchikomi
     */
    public function kuchikomiScoreRecalculation(Kuchikomi $kuchikomi): void
    {
        $item = Item::find($kuchikomi->item_id);

        // クチコミの合計スコアから削除するクチコミのスコアを減算する
        $item->kuchikomi_sum_score
            = $item->kuchikomi_sum_score - $kuchikomi->score;

        // クチコミ数をデクリメント
        $item->kuchikomi_count--;

        // クチコミ数が1以上の時は平均値を算出し、口コミ数が0の時は平均値に0をセットする
        if ($item->kuchikomi_count > 0) {
            $item->kuchikomi_avg_score =
                $item->kuchikomi_sum_score / $item->kuchikomi_count;
        } else {
            $item->kuchikomi_avg_score = 0;
        }

        $item->save();
    }

    public function kuchikomi()
    {
        return $this->hasMany('App\Models\Kuchikomi');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }
}
