<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'detail',
        'thumbnail',
        'category_id',
        'status',
        'sale',
        'view',
        'stock',
        'discount_id',
        'slug',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'meta_keywords' => 'array',
    ];

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function discount()
    {
        return $this->belongsTo('App\Models\Discount');
    }
}
