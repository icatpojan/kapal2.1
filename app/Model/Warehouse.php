<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $guarded = [];
    public function produk()
    {
        return $this->hasMany('App\Model\Produk', 'warehouse_id', 'id');
    }
    // public function detail()
    // {
    //     return $this->hasMany('App\Model\Detail', 'warehouse_id', 'id');
    // }

    public function province()
    {
        return $this->belongsTo('App\Model\Province', 'area', 'province_id');
    }
}
