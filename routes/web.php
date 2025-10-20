<?php


// use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\Front\HomeController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index'])
//     ->name('home');
// Route::get('/products', [ProductsController::class,'index'])
//     ->name('products.index');
// Route::get('/products/{product:slug}', [ProductsController::class,'show'])
//     ->name('products.show');

Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

//    ->middleware(['auth' , 'verified'])

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
