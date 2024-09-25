<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/products', function () {
        return view('products');
    })->name('products');
});


Route::resource('loans', LoanController::class);
Route::patch('loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
Route::patch('loans/{loan}/disburse', [LoanController::class, 'disburse'])->name('loans.disburse');
Route::patch('loans/{loan}/repay', [LoanController::class, 'repay'])->name('loans.repay');

Route::resource('loan_products', LoanProductController::class);
Route::resource('customers', CustomerController::class);

