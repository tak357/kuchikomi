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
        $ranking_items = Item::orderBy('kuchikomi_avg_score', 'desc')
            ->limit(3)
            ->get();

        // dd($ranking_items);

        return $ranking_items;
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
