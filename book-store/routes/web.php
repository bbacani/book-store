<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'getBooks'])->name('books');

Route::get('/cart', [CartController::class, 'getCart'])->name('cart');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::get('/locations', function () {
    return view('locations');
})->name('locations');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware('auth', 'verified');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
