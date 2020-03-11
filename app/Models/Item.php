<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = ['id'];

    public function kuchikomi()
    {
        return $this->hasMany('App\Models\Kuchikomi');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }
}
