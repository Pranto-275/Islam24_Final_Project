<?php

use App\Http\Controllers\DatatableController;
use App\Http\Controllers\FrontEnt\HomeController;
use App\Http\Controllers\FrontEnt\LoginController;
use App\Http\Livewire\Frontend\Customer;
use App\Http\Livewire\Frontend\Error;
use App\Http\Livewire\Frontend\SignIn;
use App\Http\Livewire\Frontend\SignUp;
use App\Http\Livewire\Frontend\LogIn;
use App\Http\Livewire\Frontend\Imam\Home;
use App\Http\Livewire\Frontend\Imam\Post;
use App\Http\Livewire\Frontend\Imam\Quiz;
use App\Http\Livewire\Frontend\Imam\Question;
use App\Http\Livewire\Frontend\Imam\AddHadis;
use App\Http\Livewire\Frontend\Imam\Appointment;
use App\Http\Livewire\Frontend\Imam\Donation;
use App\Http\Livewire\Frontend\User\Post as UserPost;
use App\Http\Livewire\Frontend\User\UserQuizList;
use App\Http\Livewire\Frontend\User\AppointmentList;
use App\Http\Livewire\Frontend\User\BloodDonation;
use App\Http\Livewire\Frontend\User\MoneyDonation as MoneyDonationInfo;
use App\Http\Livewire\Backend\Admin\Post as AllPost;
use App\Http\Livewire\Backend\Admin\QuizList;
use App\Http\Livewire\Backend\Admin\UserList;
use App\Http\Livewire\Backend\Admin\CreateMap;
use App\Http\Livewire\Frontend\User\Home as NormalUserHome;
use App\Http\Livewire\Frontend\User\AttemptQuiz;
use App\Http\Livewire\Frontend\User\ShowHadis;
use App\Http\Livewire\Frontend\User\Map;
use App\Http\Livewire\Frontend\User\MoneyDonation;
use App\Http\Livewire\FrontendHomeUserImam;
use App\Http\Livewire\Frontend\CheckUserType;;
use App\Http\Livewire\Inventory\DelieveryMethod;
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

// Start Imam Route
Route::get('check-user-type', CheckUserType::class)->name('check-user-type');
Route::group(['middleware' => ['role:imam', 'user_permission']], function () {
    Route::get('imam', Home::class)->name('imam');
    Route::get('post', Post::class)->name('post');
    Route::get('quiz', Quiz::class)->name('quiz');
    Route::get('add-hadis', AddHadis::class)->name('add-hadis');
    Route::get('question/{id?}', Question::class)->name('question');
    Route::get('appointment', Appointment::class)->name('appointment');
    Route::get('donation', Donation::class)->name('donation');
});
Route::group(['middleware' => ['role:user', 'user_permission']], function () {
    Route::get('user1', NormalUserHome::class)->name('user1');
    Route::get('user_post', UserPost::class)->name('user_post');
    Route::get('user_quiz_list', UserQuizList::class)->name('user_quiz_list');
    Route::get('attempt-quiz/{id}', AttemptQuiz::class)->name('attempt-quiz');
    Route::get('show-hadis', ShowHadis::class)->name('show-hadis');
    Route::get('map', Map::class)->name('map');
    Route::get('appointment-list', AppointmentList::class)->name('appointment-list');
    Route::get('blood-donation', BloodDonation::class)->name('blood-donation');
    Route::get('money-donation', MoneyDonationInfo::class)->name('money-donation');
});
// End Imam Route
Route::get('/', function () {
    return view('auth.login');
});
Route::group(['prefix' => 'customer'], function () {
    Route::get('customer_login', Customer::class)->name('customer_login');
});

Route::get('/', FrontendHomeUserImam::class)->name('home');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/customer-login', [HomeController::class, 'CustomerLogin'])->name('customer-login');
Route::get('sign-in', SignIn::class)->name('sign-in');
Route::get('sign-up', SignUp::class)->name('sign-up');
Route::get('log-in', LogIn::class)->name('log-in');


Route::get('error', Error::class)->name('error');
// Route::get('order-completed', OrderCompleted::class)->name('order-completed');

Route::Post('customer_sign_in', [LoginController::class, 'authenticate'])->name('customer_sign_in');
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('user-list', UserList::class)->name('user-list');
    Route::get('all-post', AllPost::class)->name('all-post');
    Route::get('quiz-list', QuizList::class)->name('quiz-list');
    Route::get('create-map', CreateMap::class)->name('create-map');
    Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
        return view('livewire.dashboard');
    })->name('dashboard');
});
