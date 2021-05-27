<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_categories';

    protected $fillable = ['name', 'parent_id', 'description', 'slug'];

    public function newses()
    {
        return $this->hasMany('App\Models\News');
    }
}
