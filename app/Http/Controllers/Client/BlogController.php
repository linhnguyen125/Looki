<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogCategoryRepo, $blogRepo;
    protected $result = [];

    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepo, BlogRepositoryInterface $blogRepo)
    {
        $this->blogRepo = $blogRepo;
        $this->blogCategoryRepo = $blogCategoryRepo;
    }

    public function index($slug)
    {
        $blog_category = $this->blogCategoryRepo->findBySlug($slug);
        $blog = $this->blogRepo->findBySlug($slug);

        if ($blog_category) {
            session(['module' => 'blog']);
            return $this->isBlogCategory($blog_category);
        } elseif ($blog) { // is blog detail
            session(['module' => 'blog']);
            return $this->isBlog($blog);
        }
    }

    protected function isBlogCategory($category)
    {
        $blogs = $this->blogRepo->getByCategory($category->id, 9);
        return view('client.blog.category', compact('category', 'blogs'));
    }

    protected function isBlog($blog)
    {
        $category = $blog->blog_category;
        $same_blogs = $this->blogRepo->getSameBlogs($category->id);
        if (count($same_blogs) > 4) {
            $same_blogs = $same_blogs->random(4);
        }
        return view('client.blog.detail', compact('blog', 'category', 'same_blogs'));
    }
}
