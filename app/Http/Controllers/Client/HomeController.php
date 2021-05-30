<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $catRepo;
    protected $productRepo;
    protected $newsRepo;

    public function __construct(CategoryRepositoryInterface $cateRepo, ProductRepositoryInterface $productRepo,
                                NewsRepositoryInterface $newsRepo)
    {
        $this->catRepo = $cateRepo;
        $this->productRepo = $productRepo;
        $this->newsRepo = $newsRepo;
        $this->middleware(function ($request, $next) {
            session(['module' => 'home']);
            return $next($request);
        });
    }

    public function index()
    {
        $popular_products = $this->productRepo->getPopularProduct(6);
        $new_products = $this->productRepo->getNewProduct(6);
        $sale_products = $this->productRepo->getSaleProduct(6);
        $coming_products = $this->productRepo->getComingUpProduct(6);
        $featured_products = $this->productRepo->getFeaturedProduct(6);
        $newses = $this->newsRepo->getNewNews(6);
        return view('client.home.index',
            compact('popular_products', 'new_products', 'sale_products', 'coming_products',
                'featured_products', 'newses'));
    }
}
