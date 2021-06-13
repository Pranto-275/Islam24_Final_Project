<?php

use App\Http\Controllers\DatatableController;
use App\Http\Livewire\UserManagement\UserList;
use App\Http\Livewire\UserProfile\AuthLockScreen;
use App\Http\Livewire\UserProfile\ChangePassword;
use App\Http\Livewire\UserProfile\ProfileSettings;
use App\Http\Livewire\Inventory\Category;
use App\Http\Livewire\Inventory\SubCategory;
use App\Http\Livewire\Inventory\SubSubCategory;
use App\Http\Livewire\Inventory\Brand;
use App\Http\Livewire\Inventory\Product;
use App\Http\Livewire\Inventory\Customer;
use App\Http\Livewire\Inventory\Supplier;
use App\Http\Livewire\Inventory\NSupplier;
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
    Route::group(['prefix' => 'inventory', 'as' => 'inventory.'], function () {
        Route::get('category', Category::class)->name('category');
        Route::get('sub-category', SubCategory::class)->name('sub-category');
        Route::get('sub-sub-category', SubSubCategory::class)->name('sub-sub-category');
        Route::get('brand', Brand::class)->name('brand');
        Route::get('product', Product::class)->name('product');
        Route::get('customer', Customer::class)->name('customer');
        Route::get('supplier', Supplier::class)->name('supplier');
        Route::get('nsupplier', NSupplier::class)->name('nsupplier');
    });
    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        Route::get('user-table', [DatatableController::class, 'UserTable'])->name('user_table');
    });
});
