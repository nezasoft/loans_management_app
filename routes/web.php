<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoanController;


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
    Route::get('/customers', function () {
        return view('customers.index');
    })->name('customers.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/products', function () {
        return view('products.index');
    })->name('products.index');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/loans', function () {
        return view('loans.index');
    })->name('loans.index');
});

//Routes for customers
Route::get('/customers/index', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('customers/{customer}/loans/report', [LoanController::class, 'report'])->name('loans.report');

//Routes for products
//Route::get('/products',[LoanProductController::class,'index'])->name('products.index');
Route::get('/products/index',[LoanProductController::class,'index'])->name('products.index');
Route::get('/products/create',[LoanProductController::class,'create'])->name('products.create');
Route::post('/products/store',[LoanProductController::class,'store'])->name('products.store');
Route::get('/products/{product}/edit',[LoanProductController::class,'edit'])->name('products.edit');
Route::put('/products/{product}',[LoanProductController::class,'update'])->name('products.update');
Route::delete('/products/{product}',[LoanProductController::class,'destroy'])->name('products.destroy');

//Routes for loan management
Route::get('/loans/index', [LoanController::class, 'index'])->name('loans.index');
Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loans/store', [LoanController::class, 'store'])->name('loans.store');
Route::get('/loans/{loan}/edit', [LoanController::class, 'edit'])->name('loans.edit');
Route::put('/loans/{loan}', [LoanController::class, 'update'])->name('loans.update');
Route::delete('/loans/{loan}', [LoanController::class, 'destroy'])->name('loans.destroy');
Route::patch('/loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
Route::patch('/loans/{loan}/disburse', [LoanController::class, 'disburse'])->name('loans.disburse');
Route::patch('/loans/{loan}/repay', [LoanController::class, 'repay'])->name('loans.repay');



