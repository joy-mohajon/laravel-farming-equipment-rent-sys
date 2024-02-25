<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\StripePaymentController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

// Authentication
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('get.login');
    Route::post('/login', 'login')->name('post.login');
    Route::get('/signup', 'signup')->name('get.signup');
    Route::post('/signup', 'postSignup')->name('post.signup');
    Route::get('logout', 'logout')->name('logout');
});

// reset password
Route::get('/forgot-password', [PasswordController::class, 'getForgotPassword'])->name('get.forgot.password');
Route::post('/forgot-password', [PasswordController::class, 'postForgotPassword'])->name('post.forgot.password');
Route::get('/reset-password/{token}', [PasswordController::class, 'getResetPassword'])->name('get.reset.password');
Route::post('/reset-password', [PasswordController::class, 'postResetPassword'])->name('post.reset.password');


Route::middleware('auth')->group(function () {
    Route::redirect('/', '/dashboard');

    Route::get('/dashboard', function () {
        $posts = Post::latest()->get();
        return view('dashboard', ['posts'=>$posts]);
    })->name('dashboard');

    Route::controller(ProfileController::class)->group(function (){
        Route::get('profile', 'index')->name('get.profile');
        Route::put('profile', 'store')->name('post.profile');
        Route::put('profile/image', 'updateProfileImage')->name('profile.image');
    });

    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('posts', PostController::class)->except(['show']);
    Route::controller(StripePaymentController::class)->group(function(){
        Route::get('stripe/{id}', 'stripe')->name('stripe');
        Route::post('stripe/{id}', 'stripePost')->name('stripe.post');
    });
    Route::resource('rents', RentController::class)->except(['show']);
});
