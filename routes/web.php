
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use App\Http\Controllers\category;
use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect the home page to the orders page
Route::redirect('/', '/orders');

// Orders Routes
Route::resource('orders', OrderController::class );
