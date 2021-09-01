<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $guarded = [];

    // public function transaksi()
    // {
    //     return $this->hasMany('App\Models\Transaksi', 'kapal_id', 'id');
    // }

    public function customer()
    {
        return $this->belongsTo('App\Model\Customer', 'customer_id', 'id');
    }
}
