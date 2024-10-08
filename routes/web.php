<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BottlesController;
use App\Http\Controllers\GlovesController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChooseBottleController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('signin');
});

Route::middleware(['web'])->group(function () {
    Route::get('/signup', [AuthController::class, 'showSignUpForm'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signUp'])->name('signup.submit');

    Route::get('/signin', [AuthController::class, 'showSignInForm'])->name('signin');
    Route::post('/signin', [AuthController::class, 'signIn'])->name('signin.submit');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/choose-glove', function () {
        return view('choose-glove');
    })->name('choose-glove');

    // Removed duplicate route to avoid conflict
    Route::get('/choose-bottle', 'BottleController@choose')->name('choose-bottle-get');
    Route::post('/choose-bottle', 'BottleController@submitChoice')->name('choose-bottle-post');
    
    Route::get('/mobile-glove', function () {
        return view('mobile-glove-page');
    })->name('mobile-glove');
    
    Route::get('/lite-glove', function () {
        return view('lite-glove-page');
    })->name('lite-glove');

    Route::post('/purchase', [TransactionController::class, 'purchase'])->name('purchase');

    Route::get('/bottles', [BottlesController::class, 'index'])->name('bottles');

    Route::get('/gloves', [GlovesController::class, 'index'])->name('gloves');

    Route::get('/points', [PointsController::class, 'index'])->name('points');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/donatebottles', function () {
        return view('donatebottles');
    })->name('donatebottles');

    Route::post('/donate', [DonationController::class, 'store'])->name('donate');

    Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard')->middleware('auth.admin');  
    
    Route::get('/customers', [AdminController::class, 'showCustomers'])->name('customers');
    Route::get('/bottle-donations', [AdminController::class, 'showBottleDonations'])->name('bottle.donations');
    Route::get('/glove-purchases', [AdminController::class, 'showGlovePurchases'])->name('glove.purchases');
});