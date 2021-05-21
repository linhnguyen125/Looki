<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'name', 'description', 'slug', 'parent_id', 'admin_id'];

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
