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
        $news = $this->newsRepo->findBySlug($slug);
        $news_category = $this->newsCategoryRepo->findBySlug($slug);
        // is category ?
        if ($product_category) {
            session(['module' => 'product']);
            return $this->isProductCategory($product_category);
        } elseif ($product_detail) { //is product detail
            session(['module' => 'product']);
            return $this->isProductDetail($product_detail);
        } elseif ($slug === 'tin-tuc') { // is news category
            session(['module' => 'news']);
            return $this->news();
        } elseif ($news_category) {
            session(['module' => 'news']);
            return $this->isNewsCategory($news_category);
        } elseif ($news) { // is news detail
            session(['module' => 'news']);
            return $this->isNews($news);
        }
    }

    protected function news()
    {
        $featured_newses_col_1 = $this->newsRepo->getByCol(0, 2);
        $featured_newses_col_2 = $this->newsRepo->getByCol(2, 1);
        $featured_newses_col_3 = $this->newsRepo->getByCol(3, 2);
        $news_newses = $this->newsRepo->getByCategoryAndNum(1, 6);
        $news_events = $this->newsRepo->getByCategoryAndNum(2, 6);
        return view('client.news.index', compact('featured_newses_col_1',
            'featured_newses_col_2', 'featured_newses_col_3', 'news_newses', 'news_events'));
    }

    protected function isNewsCategory($category)
    {
        $newses = $this->newsRepo->getByCategory($category->id, 9);
        return view('client.news.category', compact('category', 'newses'));
    }

    protected function isNews($news)
    {
        $category = $news->news_category;
        $same_newses = $this->newsRepo->getSameNewses($category->id);
        if(count($same_newses) > 4){
            $same_newses = $same_newses->random(4);
        }
        return view('client.news.detail', compact('news', 'category', 'same_newses'));
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
