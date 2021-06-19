<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Backend\ProductInfo\Category;
use App\Models\Backend\ProductInfo\SubCategory;
use App\Models\Backend\ProductInfo\SubSubCategory;
use App\Models\Backend\ProductInfo\Product;
use Illuminate\Support\Facades\View;


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
        //Categories
        View::composer('*', function($view){
            $view->with('categories', Category::orderBy('id', 'desc')->get());
            $view->with('subCategories', SubCategory::orderBy('id', 'desc')->get());
            $view->with('subSubCategories', SubSubCategory::orderBy('id', 'desc')->get());
            $view->with('products', Product::orderBy('id', 'desc')->get());
        });
    }
}
