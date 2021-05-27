<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\NewsCategory\NewsCategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $catRepo;
    protected $productRepo;
    protected $newsCategoryRepo;
    protected $newsRepo;
    protected $blogCategoryRepo;
    protected $blogRepo;
    protected $result = [];

    public function __construct(
        CategoryRepositoryInterface $catRepo,
        ProductRepositoryInterface $productRepo,
        NewsCategoryRepositoryInterface $newsCategoryRepo,
        NewsRepositoryInterface $newsRepo,
        BlogCategoryRepositoryInterface $blogCategoryRepo,
        BlogRepositoryInterface $blogRepo
    ) {
        $this->catRepo = $catRepo;
        $this->productRepo = $productRepo;
        $this->newsRepo = $newsRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
        $this->blogRepo = $blogRepo;
        $this->blogCategoryRepo = $blogCategoryRepo;
    }

    public function index($slug)
    {
        $product_category = $this->catRepo->getBySlug($slug);
        $product_detail = $this->productRepo->findBySlug($slug);
        $news_category = $this->newsCategoryRepo->findBySlug($slug);
        // is category ?
        if ($product_category) {
            return $this->isProductCategory($product_category);
        } elseif ($product_detail) { //is product detail
            return $this->isProductDetail($product_detail);
        } elseif ($news_category) { // is news category
            return $this->isNewsCategory($news_category);
        }
    }

    protected function isNewsCategory($category)
    {
        $newses = $this->newsRepo->getByCategory($category->id, 9);
        return view('client.news.index', compact('newses', 'category'));
    }

    protected function isNews($news){

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
