
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;

use App\Http\Controllers\CustomerController;

use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect the home page to the orders page
Route::redirect('/', '/orders');

// Orders Routes
Route::resource('orders', OrderController::class );
Route::resource('customers', CustomerController::class);
Route::resource('categories', CategoryController::class);
