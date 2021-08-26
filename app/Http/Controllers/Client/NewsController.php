<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\NewsCategory\NewsCategoryRepositoryInterface;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsCategoryRepo, $newsRepo;

    public function __construct(NewsCategoryRepositoryInterface $newsCategoryRepo, NewsRepositoryInterface $newsRepo)
    {
        $this->newsRepo = $newsRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
    }

    public function index($slug)
    {
        $news = $this->newsRepo->findBySlug($slug);
        $news_category = $this->newsCategoryRepo->findBySlug($slug);

        if ($news_category) {
            session(['module' => 'news']);
            return $this->isNewsCategory($news_category);
        } elseif ($news) { // is news detail
            session(['module' => 'news']);
            return $this->isNews($news);
        }
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
        if (count($same_newses) > 4) {
            $same_newses = $same_newses->random(4);
        }
        return view('client.news.detail', compact('news', 'category', 'same_newses'));
    }
}
