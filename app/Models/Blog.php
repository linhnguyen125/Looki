<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['name', 'description', 'detail', 'thumbnail', 'status', 'blog_category_id',
        'admin_id', 'view', 'slug', 'meta_description', 'meta_keywords'];

    public function blog_category()
    {
        return $this->belongsTo('App\Models\BlogCategory');
    }

    public function admin()
    {
        return $this->belongsTo('App\Model\Admin');
    }
}
