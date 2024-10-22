<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReferralCheckController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', [DashboardController::class,'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/referral-check', [ReferralCheckController::class , 'index'])
->middleware(['auth', 'verified'])->name('referral-check');

Route::post('/referral-check', [ReferralCheckController::class , 'check'])
->middleware(['auth', 'verified'])->name('referral-check');


Route::middleware(['auth','verified'])->group(function(){

    Route::get('/transactions/form', [TransactionController::class , 'index'])->name('transactions-form');
    
    Route::get('/transactions/show', [TransactionController::class , 'show'])->name('transactions-show');

    Route::post('/transactions/form', [TransactionController::class , 'store'])->name('transactions-store');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
