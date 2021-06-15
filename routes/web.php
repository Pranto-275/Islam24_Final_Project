<?php

use App\Http\Controllers\DatatableController;
use App\Http\Livewire\Backend\ContactInfo\Contact;
use App\Http\Livewire\Backend\ContactInfo\ContactCategory;
use App\Http\Livewire\Backend\Inventory\Invoice;
use App\Http\Livewire\Backend\Inventory\StockAdjustment;
use App\Http\Livewire\Backend\Inventory\StockManager;
use App\Http\Livewire\Backend\ProductInfo\Brand;
use App\Http\Livewire\Backend\ProductInfo\Category;
use App\Http\Livewire\Backend\ProductInfo\SubCategory;
use App\Http\Livewire\Backend\ProductInfo\Product;
use App\Http\Livewire\Backend\ProductInfo\ProductImage;
use App\Http\Livewire\Backend\ProductInfo\ProductProperties;
use App\Http\Livewire\Backend\ProductInfo\SubSubCategory;
use App\Http\Livewire\Backend\ProductInfo\Unit;
use App\Http\Livewire\Backend\setting\Branch;
use App\Http\Livewire\Backend\setting\Currency;
use App\Http\Livewire\Backend\Setting\DeliveryMethod;
use App\Http\Livewire\Backend\Setting\InvoiceSetting;
use App\Http\Livewire\Backend\Setting\PaymentMethod;
use App\Http\Livewire\Backend\Setting\Vat;
use App\Http\Livewire\Backend\Setting\Warehouse;
use App\Http\Livewire\Backend\Transaction\Payment;
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
        Route::get('sub-category',SubCategory::class)->name('sub-category');
        Route::get('brand', Brand::class)->name('brand');
        Route::get('product', Product::class)->name('product');
        Route::get('product-image', ProductImage::class)->name('product-image');
        Route::get('product-properties', ProductProperties::class)->name('product-properties');
        Route::get('sub-sub-category', SubSubCategory::class)->name('sub-sub-category');
        Route::get('unit', Unit::class)->name('unit');
    });

    Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
        Route::get('invoice', Invoice::class)->name('invoice');
        Route::get('stock-adjustment', StockAdjustment::class)->name('stock-adjustment');
        Route::get('stock-manager', StockManager::class)->name('stock-manager');
    });
    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('branch', Branch::class)->name('branch');
        Route::get('currency', Currency::class)->name('currency');
        Route::get('delivery-method', DeliveryMethod::class)->name('delivery-method');
        Route::get('invoice-setting', InvoiceSetting::class)->name('invoice-setting');
        Route::get('payment-method', PaymentMethod::class)->name('payment-method');
        Route::get('vat', Vat::class)->name('vat');
        Route::get('warehouse', Warehouse::class)->name('warehouse');
    });

    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
        Route::get('payment', Payment::class)->name('payment');
    });

    Route::group(['prefix' => 'contact-info', 'as' => 'contact-info.'], function () {
        Route::get('contact', Contact::class)->name('contact');
        Route::get('contact-category', ContactCategory::class)->name('contact-category');
    });
    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        Route::get('index', [DatatableController::class, 'index'])->name('index');

        Route::get('user-table', [DatatableController::class, 'UserTable'])->name('user_table');
    });
});
