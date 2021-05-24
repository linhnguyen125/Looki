<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['name', 'description', 'detail', 'thumbnail', 'status', 'news_category_id',
        'admin_id', 'view', 'slug', 'meta_description', 'meta_keywords'];

    public function news_category()
    {
        return $this->belongsTo('App\Models\NewsCategory');
    }

    public function admin()
    {
        return $this->belongsTo('App\Model\Admin');
    }
}
