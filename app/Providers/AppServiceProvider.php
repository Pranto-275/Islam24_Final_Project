<?php

namespace App\Providers;

use App\Models\Backend\ProductInfo\Category;
use App\Models\Backend\ProductInfo\Product;
use App\Models\Backend\ProductInfo\SubCategory;
use App\Models\Backend\ProductInfo\SubSubCategory;
use App\Models\Backend\Setting\CompanyInfo;
use App\Models\Backend\Setting\InvoiceSetting;
use App\Models\Backend\Setting\BreakingNews;
use App\Models\Inventory\Currency;
use App\Models\Setting\Slider;
use App\Models\Backend\ProductInfo\Brand;
use App\Models\District;
use App\Models\FrontEnd\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Services\AddToCardService;

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
            // $view->with('skipTopTencategories', Category::orderBy('id', 'desc')->skip(10)->get());
            // $view->with('topCategories', Category::whereTopShow(1)->get());
            $view->with('topFourCategories', Category::take(4)->get());
            $view->with('topCategories', Category::skip(4)->take(200)->get());
            $view->with('categoryImageLast', Category::whereTopShow(1)->orderBy('id', 'desc')->first());
            $view->with('subCategories', SubCategory::orderBy('id', 'desc')->get());
            $view->with('subSubCategories', SubSubCategory::orderBy('id', 'desc')->get());
            $view->with('subSubCategories', SubSubCategory::orderBy('id', 'desc')->get());
            $view->with('newProducts', Product::whereFeatured('New Product')->whereIsActive(1)->orderBy('id', 'desc')->take(3)->get());
            $view->with('brands', Brand::get());
            // $view->with('products', Product::orderBy('id', 'desc')->get());
            $view->with('sliderImages', Slider::orderBy('position')->whereIsActive(1)->get());
            $view->with('sliderImageLast', Slider::orderBy('id','desc')->whereIsActive(1)->first());
            $view->with('companyInfo', CompanyInfo::first());
            $view->with('InvoiceSetting', InvoiceSetting::whereCreatedBy(Auth::id())->first());
            $view->with('currencySymbol', Currency::whereIsActive(1)->first());
            $view->with('cardBadge', AddToCardService::cardTotalProductAndAmount());
            $view->with('BreakingNews', BreakingNews::get());
            $view->with('Districts', District::orderBy('name', 'asc')->get());
            $view->with('orders_count', Order::whereStatus('pending')->count());
        });
    }
}
