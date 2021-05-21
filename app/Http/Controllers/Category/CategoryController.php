<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $catRepo;

    public function __construct(CategoryRepositoryInterface $catRepo)
    {
        $this->middleware('auth:admin');
        $this->catRepo = $catRepo;
    }

    public function index(){
        $name = 'phương pháp nấu ăn ngon';
        return Str::slug($name);
    }
}
