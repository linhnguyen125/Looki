<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    protected $catRepo;

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
            \App\Repositories\Product\ProductRepositoryInterface::class,
            \App\Repositories\Product\ProductRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ProductImage\ProductImageRepositoryInterface::class,
            \App\Repositories\ProductImage\ProductImageRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CategoryRepositoryInterface $catRepo)
    {
        $this->catRepo = $catRepo;
        Schema::defaultStringLength(255);
        $fashions = $this->catRepo->getByCategory(1);
        $cosmetics = $this->catRepo->getByCategory(2);
        View::share(['fashions' => $fashions, 'cosmetics' => $cosmetics]);
    }
}
