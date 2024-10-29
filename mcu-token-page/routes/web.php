<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\stripeController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\RefreshTokens;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReferralCheckController;
use App\Http\Middleware\MultiFactorAuth;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', [DashboardController::class,'index'])
->middleware(['auth',MultiFactorAuth::class])->name('dashboard');

Route::post('/dashboard-auth',[DashboardController::class, 'authToggle'])
->middleware(['auth',MultiFactorAuth::class])->name('dashboard-2fa');

Route::get('/referral-check', [ReferralCheckController::class , 'index'])
->middleware('auth')->name('referral-check');

Route::post('/referral-check', [ReferralCheckController::class , 'check'])
->middleware('auth')->name('referral-check');

Route::middleware(['auth',RefreshTokens::class,MultiFactorAuth::class])->group(function(){
    
Route::get('/store',[StoreController::class , 'index'])->name('store');
Route::get('/store/show',[StoreController::class , 'show'])->name('store-show');
Route::post('/store/payment',[StoreController::class,'store'])->name('store-pay');

});

Route::middleware(['auth','verified', RefreshTokens::class,MultiFactorAuth::class])->group(function(){

    Route::get('/transactions/form', [TransactionController::class , 'index'])->name('transactions-form');
    Route::get('/transactions/show', [TransactionController::class , 'show'])->name('transactions-show');
    Route::post('/transactions/form', [TransactionController::class , 'store'])->name('transactions-store');
    
});

Route::middleware(['auth',MultiFactorAuth::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth',MultiFactorAuth::class])->group(function(){
    Route::get('/stripe', [stripeController::class , 'index'])->name('stripe');
    Route::post('/stripeCheckout', [stripeController::class, 'checkout'])->name('stripe-Checkout');
    Route::get('/stripe/success',[stripeController::class, 'success'])->name('stripe-Success');
    Route::get('/stripe/cancel', [stripeController::class, 'cancel'])->name('stripe-Cancel');
});

require __DIR__.'/auth.php';
