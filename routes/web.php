<?php

use App\Http\Controllers\DatatableController;
use App\Http\Livewire\Backend\ProductInfo\Category;
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
    });
    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        Route::get('user-table', [DatatableController::class, 'UserTable'])->name('user_table');
    });
});
