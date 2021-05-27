<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\NewsCategory\NewsCategoryRepositoryInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    protected $catRepo;
    protected $newsCategoryRepo;

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Admin\AdminRepositoryInterface::class,
            \App\Repositories\Admin\AdminRepository::class
        );
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\NewsCategory\NewsCategoryRepositoryInterface::class,
            \App\Repositories\NewsCategory\NewsCategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\BlogCategory\BlogCategoryRepositoryInterface::class,
            \App\Repositories\BlogCategory\BlogCategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ProductImage\ProductImageRepositoryInterface::class,
            \App\Repositories\ProductImage\ProductImageRepository::class
        );
        $this->app->singleton(
            \App\Repositories\News\NewsRepositoryInterface::class,
            \App\Repositories\News\NewsRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Blog\BlogRepositoryInterface::class,
            \App\Repositories\Blog\BlogRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CategoryRepositoryInterface $catRepo, NewsCategoryRepositoryInterface $newsCategoryRepo)
    {
        $this->catRepo = $catRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
        Schema::defaultStringLength(255);
        $fashions = $this->catRepo->getByCategory(1);
        $cosmetics = $this->catRepo->getByCategory(2);
        $news_categories = $this->newsCategoryRepo->getAll();
        View::share(['fashions' => $fashions, 'cosmetics' => $cosmetics, 'news_categories' => $news_categories]);
    }
}
