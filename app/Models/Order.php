<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['order_code', 'user_id', 'user_name', 'total', 'address', 'status'];

    protected $casts = [
        'address' => 'array',
    ];

    public function details()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
