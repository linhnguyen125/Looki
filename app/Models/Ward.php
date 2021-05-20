<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = ['id', 'name', 'gso_id', 'district_id'];

    function district()
    {
        return $this->belongsTo('App\Models\District');
    }
}
