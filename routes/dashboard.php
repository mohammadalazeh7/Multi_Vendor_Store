<?php

// use App\Http\Controllers\Dashboard\CategoriesController;
// use App\Http\Controllers\Dashboard\ProductsController;
// use App\Http\Controllers\Dashboard\ProfileController;
// use App\Http\Controllers\DashboardController;
// use Illuminate\Support\Facades\Route;


// Route::group(
//     [
//         'middleware' => ['auth'],
//         // لما بدي انده شي راوت ف بنادي dashboard.------
//         'as'=>'dashboard.',
//         'prefix' => 'dashboard'

//     ],
//     function () {
//         Route::get('profile', [ProfileController::class, 'edit'])
//             ->name('profile.edit');
//         Route::patch('profile', [ProfileController::class, 'update'])
//             ->name('profile.update');

//         Route::get('/', [DashboardController::class, 'index'])
//             ->name('dashboard');

//         Route::get('/categories/trash', [CategoriesController::class, 'trash'])
//             ->name('categories.trash');

//         Route::put('/categories/{category}/restore', [CategoriesController::class, 'restore'])
//             ->name('categories.restore');

//         Route::delete('/categories/{category}/force-delete', [CategoriesController::class, 'forceDelete'])
//             ->name('categories.force-delete');

//         // route for products
//         Route::get('/products/trash', [ProductsController::class, 'trash'])
//             ->name('products.trash');

//         Route::put('/products/{product}/restore', [ProductsController::class, 'restore'])
//             ->name('products.restore');

//         Route::delete('/products/{product}/force-delete', [ProductsController::class, 'forceDelete'])
//             ->name('products.force-delete');

//         Route::resource('/categories', CategoriesController::class);
//         Route::resource('/products', ProductsController::class);
//        }
// );
