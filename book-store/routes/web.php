<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShipmentController;


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

Route::get('/', [BookController::class, 'index'])->name('books.index');

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/cart', [CartController::class, 'getCart'])->name('cart.cart');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/payment', [CartController::class, 'payment'])->name('cart.payment');
Route::get('/cart/buy', [CartController::class, 'buy'])->name('cart.buy');

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
    Route::get('/', [UserController::class, 'index'])->name('dashboard');
    Route::get('/admin', [UserController::class, 'index'])->name('dashboard');

    // Users
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');

    // Books
    Route::delete('/admin/books/{book}', [BookController::class, 'destroy'])->name('admin.books.destroy');
    Route::get('/admin/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/admin/books/store', [BookController::class, 'store'])->name('admin.books.store');
    Route::get('/admin/books/{book}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::put('/admin/books/{book}', [BookController::class, 'update'])->name('admin.books.update');

    // Orders
    Route::delete('/admin/orders/{order}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    Route::get('/admin/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
    Route::get('/admin/orders/{order}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');

    // Shipments
    Route::delete('/admin/shipments/{shipment}', [ShipmentController::class, 'destroy'])->name('admin.shipments.destroy');
    Route::get('/admin/shipments/{order_id}/create', [ShipmentController::class, 'create'])->name('admin.shipments.create');
    Route::post('/admin/shipments/{order_id}/store', [ShipmentController::class, 'store'])->name('admin.shipments.store');
    Route::get('/admin/shipments/{shipment}/edit', [ShipmentController::class, 'edit'])->name('admin.shipments.edit');
    Route::put('/admin/shipments/{shipment}', [ShipmentController::class, 'update'])->name('admin.shipments.update');

    // Categories
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
});
