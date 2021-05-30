<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['name', 'percent', 'from_date', 'to_date'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
