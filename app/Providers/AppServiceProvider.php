<?php

namespace App\Providers;

use App\Models\Backend\ProductInfo\Category;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\ProductInfo\SubCategory;
use App\Models\Backend\ProductInfo\SubSubCategory;
// use App\Models\Backend\Setting\CompanyInfo as SettingCompanyInfo;
use App\Models\Backend\Setting\InvoiceSetting;
use App\Models\Inventory\Currency;
use App\Models\Setting\Slider;
use Illuminate\Support\Facades\Auth;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Categories
        View::composer('*', function ($view) {
            $view->with('categories', Category::orderBy('id', 'desc')->get());
            $view->with('topCategories', Category::whereTopShow(1)->take(5)->get());
            $view->with('subCategories', SubCategory::orderBy('id', 'desc')->get());
            $view->with('subSubCategories', SubSubCategory::orderBy('id', 'desc')->get());
            $view->with('products', Product::orderBy('id', 'desc')->get());
            $view->with('sliderImages', Slider::orderBy('position')->take(4)->get());
            // $view->with('companyInfo', SettingCompanyInfo::first());
            $view->with('InvoiceSetting', InvoiceSetting::whereCreatedBy(Auth::id())->first());
            $view->with('currencySymbol', Currency::whereIsActive(1)->first());
        });
    }
}
