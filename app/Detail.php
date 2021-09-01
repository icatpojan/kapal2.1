<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public $guarded = [];

    public function status()
    {
        return $this->belongsTo('App\Model\Status', 'status_id', 'id');
    }
    public function warehouse()
    {
        return $this->belongsTo('App\Model\Warehouse', 'warehouse_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo('App\Model\Type', 'type_id', 'id');
    }
}
