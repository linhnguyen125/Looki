<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $catRepo, $productRepo;
    protected $result = [];

    public function __construct(CategoryRepositoryInterface $catRepo, ProductRepositoryInterface $productRepo)
    {
        $this->catRepo = $catRepo;
        $this->productRepo = $productRepo;
    }

    public function index($slug){
        $product_category = $this->catRepo->getBySlug($slug);
        $product_detail = $this->productRepo->findBySlug($slug);

        // is category ?
        if ($product_category) {
            session(['module' => 'product']);
            return $this->isProductCategory($product_category);
        } elseif ($product_detail) { //is product detail
            session(['module' => 'product']);
            return $this->isProductDetail($product_detail);
        }
    }

    protected function isProductCategory($category)
    {
        $child_categories = $this->catRepo->getChild($category->id);
        if (count($child_categories) > 0) {
            $products = $this->productRepo->getByCategory($child_categories, 9);
        } else {
            $products = $this->productRepo->getByCategory([$category->id], 9);
        }
        $breadcrumbs = $this->breadcrumb($category->parent_id);
        return view('client.product.index', compact('category', 'breadcrumbs', 'products'));
    }

    protected function isProductDetail($product)
    {
        $category = $product->category;
        $breadcrumbs = $this->breadcrumb($category->parent_id);
        $same_products = $this->productRepo->getByCategory([$category->id], 0);
        return view('client.product.detail', compact('product', 'category', 'breadcrumbs', 'same_products'));
    }

    protected function breadcrumb($parentId)
    {
        if ($parentId <= 2) {
            return $this->result;
        } else {
            $cat = $this->catRepo->find($parentId);
            $this->result[] = $cat;
            return $this->breadcrumb($cat->parent_id);
        }
    }
}
