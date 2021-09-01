<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id', 'id');
    }
    public function product()
    {
        return $this->hasMany('App\Model\Product', 'tipe_id', 'id');
    }
    // public function detail()
    // {
    //     return $this->belongsTo('App\Model\Detail', 'tipe_id', 'id');
    // }
}
