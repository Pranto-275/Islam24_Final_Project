<?php

use App\Http\Controllers\DatatableController;
use App\Http\Livewire\Backend\ProductInfo\Category;
use App\Http\Livewire\Backend\ContactInfo\Contact;
use App\Http\Livewire\Backend\ContactInfo\ContactCategory;
use App\Http\Livewire\Backend\Inventory\Invoice;
use App\Http\Livewire\Backend\Inventory\StockAdjustment;
use App\Http\Livewire\Backend\Inventory\StockManager;
use App\Http\Livewire\Backend\ProductInfo\Brand;
use App\Http\Livewire\Backend\ProductInfo\Product;
use App\Http\Livewire\Backend\ProductInfo\ProductImage;
use App\Http\Livewire\Backend\ProductInfo\ProductProperties;
use App\Http\Livewire\Backend\ProductInfo\SubSubCategory;
use App\Http\Livewire\Backend\ProductInfo\Unit;
use App\Http\Livewire\UserManagement\UserList;
use App\Http\Livewire\UserProfile\AuthLockScreen;
use App\Http\Livewire\UserProfile\ChangePassword;
use App\Http\Livewire\UserProfile\ProfileSettings;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('livewire.dashboard');
})->name('dashboard');

Route::group(['prefix' => 'member', 'middleware' => ['auth']], function () {
    Route::group(['prefix' => 'user-management', 'as' => 'user-management.'], function () {
        Route::get('user-list', UserList::class)->name('user-list');
    });
    Route::group(['prefix' => 'user-profile', 'as' => 'user-profile.'], function () {
        Route::get('profile-settings', ProfileSettings::class)->name('profile-settings');
        Route::get('change-password', ChangePassword::class)->name('change-password');
        Route::get('auth-lock-screen', AuthLockScreen::class)->name('auth-lock-screen');
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('category', Category::class)->name('category');
        Route::get('brand',Brand::class)->name('brand');
        Route::get('product',Product::class)->name('product');
        Route::get('product-image',ProductImage::class)->name('product-image');
        Route::get('product-properties',ProductProperties::class)->name('product-properties');
        Route::get('sub-sub-category',SubSubCategory::class)->name('sub-sub-category');
        Route::get('unit',Unit::class)->name('unit');
    });

    Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
        Route::get('invoice', Invoice::class)->name('invoice');
        Route::get('stock-adjustment',StockAdjustment::class)->name('stock-adjustment');
        Route::get('stock-manager',StockManager::class)->name('stock-manager');
    });

    Route::group(['prefix' => 'contact-info', 'as' => 'contact-info.'], function () {
        Route::get('contact', Contact::class)->name('contact');
        Route::get('contact-category', ContactCategory::class)->name('contact-category');
    });
    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        Route::get('user-table', [DatatableController::class, 'UserTable'])->name('user_table');
    });

    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        Route::get('category_table', [DatatableController::class, 'CategoryTable'])->name('category_table');
        Route::get('contact_table', [DatatableController::class, 'ContactTable'])->name('contact_table');
        Route::get('invoice_table', [DatatableController::class, 'InvoiceTable'])->name('invoice_table');
        Route::get('stockAdjustment_table', [DatatableController::class, 'StockAdjustmentTable'])->name('stockAdjustment_table');
        Route::get('stockManager_table', [DatatableController::class, 'StockManagerTable'])->name('stockManager_table');
        Route::get('brandInfo_table', [DatatableController::class, 'BrandInfoTable'])->name('brandInfo_table');
        Route::get('productInfo_table', [DatatableController::class, 'ProductInfoTable'])->name('productInfo_table');
        Route::get('productImageInfo_table', [DatatableController::class, 'ProductImageInfoTable'])->name('productImageInfo_table');
        Route::get('productPropertiesInfo_table', [DatatableController::class, 'ProductPropertiesInfoTable'])->name('productPropertiesInfo_table');
        Route::get('productSubSubCategoryInfo_table', [DatatableController::class, 'ProductSubSubCategoryInfoTable'])->name('productSubSubCategoryInfo_table');
        Route::get('productUnitInfo_table', [DatatableController::class, 'ProductUnitTable'])->name('productUnitInfo_table');

    });
});
