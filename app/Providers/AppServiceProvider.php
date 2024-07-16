<?php

namespace App\Providers;

use App\Tag;
use App\Category;
use App\Review;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Manually set the pagination view to use Bootstrap 4
        Paginator::defaultView('pagination::bootstrap-4');
        Paginator::defaultSimpleView('pagination::simple-bootstrap-4');

        View::composer('*', function ($view) {
            $view->with('categories_menu', Category::with('children')->whereNull('category_id')->get());
            $view->with('tags_menu', Tag::withCount('products')->get());
            $view->with('recent_reviews', Review::with('product', 'user')->whereStatus(true)->latest()->limit(5)->get());
        });
    }
}