<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class , 'index']);

Route::prefix('dashboard')->group(function () {
    Route::get('/', [ProductController::class , 'create']);
    Route::get('show', [ProductController::class , 'show']);
    Route::post('store', [ProductController::class , 'store'])->name('product.store');

});
require __DIR__.'/auth.php';
