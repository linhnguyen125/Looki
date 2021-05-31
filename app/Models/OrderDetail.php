<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = ['order_id', 'product_id', 'discount'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
