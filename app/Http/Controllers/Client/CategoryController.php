<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\NewsCategory\NewsCategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $newsCategoryRepo, $newsRepo, $blogCategoryRepo, $blogRepo;
    protected $result = [];

    public function __construct(
        NewsCategoryRepositoryInterface $newsCategoryRepo,
        NewsRepositoryInterface $newsRepo,
        BlogCategoryRepositoryInterface $blogCategoryRepo,
        BlogRepositoryInterface $blogRepo
    ) {
        $this->newsRepo = $newsRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
        $this->blogRepo = $blogRepo;
        $this->blogCategoryRepo = $blogCategoryRepo;
    }

    public function index($slug)
    {
        if ($slug === 'tin-tuc') { // is news category
            session(['module' => 'news']);
            return $this->news();
        } elseif ($slug === 'blog') { // is blog category
            session(['module' => 'blog']);
            return $this->blog();
        } elseif ($slug === 'lien-he') {
            session(['module' => 'contact']);
            return $this->contact();
        }
    }

    protected function blog()
    {
        $blogs_col_1 = $this->blogRepo->getByCol(0, 1);
        $blogs_col_2 = $this->blogRepo->getByCol(1, 2);
        $categories = $this->blogCategoryRepo->getAll();
        foreach ($categories as $category) {
            $blogs_by_category[$category->name] = $this->blogRepo->getByCategoryAndNum($category->id, 6);
        }
        return view('client.blog.index', compact('blogs_col_1',
            'blogs_col_2', 'blogs_by_category'));
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

    protected function contact(){
        return view('client.contact.index');
    }
}
