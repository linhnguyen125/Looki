<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_code', 'user_id', 'total', 'address'];

    protected $casts = [
        'address' => 'array',
    ];

    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
