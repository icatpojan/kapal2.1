<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany('App\Model\Produk', 'status', 'id');
    }
}
