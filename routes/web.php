<?php

use App\Http\Controllers\DatatableController;
use App\Http\Livewire\UserManagement\UserList;
use App\Http\Livewire\UserProfile\AuthLockScreen;
use App\Http\Livewire\UserProfile\ChangePassword;
use App\Http\Livewire\UserProfile\ProfileSettings;
use App\Http\Livewire\Inventory\Category;
use App\Http\Livewire\Inventory\Currency;
use App\Http\Livewire\Inventory\Language;
use App\Http\Livewire\Inventory\PointPolicy;
use App\Http\Livewire\Inventory\DelieveryMethod;
use App\Http\Livewire\Inventory\WareHouse;




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
    Route::group(['prefix'=>'Inventory', 'as'=>'Inventory.'], function (){
        Route::get('category', Category::class)->name('category');
        Route::get('currency',Currency::class)->name('currency');
        Route::get('language',Language::class)->name('language');
        Route::get('pointPolicy', PointPolicy::class)->name('pointPolicy');
        Route::get('delivery-method', DelieveryMethod::class)->name('delivery-method');
        Route::get('ware-house',WareHouse::class)->name('ware-house');
    });
    Route::group(['prefix' => 'user-profile', 'as' => 'user-profile.'], function () {
        Route::get('profile-settings', ProfileSettings::class)->name('profile-settings');
        Route::get('change-password', ChangePassword::class)->name('change-password');
        Route::get('auth-lock-screen', AuthLockScreen::class)->name('auth-lock-screen');
    });
    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        Route::get('user-table', [DatatableController::class, 'UserTable'])->name('user_table');
    });
});
