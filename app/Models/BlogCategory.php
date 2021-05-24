<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';

    protected $fillable = ['name', 'parent_id', 'description', 'slug'];

    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }
}
