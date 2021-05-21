<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepo;
    protected $catRepo;

    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterface $catRepo)
    {
        $this->middleware('auth:admin');
        $this->productRepo = $productRepo;
        $this->catRepo = $catRepo;
    }

    public function index()
    {
        $products = $this->productRepo->getAll();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->catRepo->getAllWithoutPaginate();
        $division_categories = $this->catRepo->data_tree($categories, 0, 0);
        return view('admin.product.create', compact('division_categories'));
    }
}
