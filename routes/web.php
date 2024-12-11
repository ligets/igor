<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/books/create', [BookController::class, 'createBook'])->name('books.create')->middleware(["auth", "role:admin"]);
Route::post('/books', [BookController::class, 'store'])->middleware(["auth", "role:admin"])->name('books.store');
Route::get('/books/{id}', [BookController::class, 'getById'])->name('books.show');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

Route::post('/cart/{bookId}', [CartController::class, 'addToCart'])->name('books.addToCart')->middleware("auth");
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index')->middleware("auth");
Route::delete('/cart/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware("auth");

Route::get('/profile/orders', [OrderController::class, 'index'])->name('profile.orders')->middleware("auth");
Route::get('/profile/orders/admin', [OrderController::class, 'getAdmin'])->name('profile.orders.admin')->middleware(["auth", "role:admin"]);

Route::post('/orders', [OrderController::class, 'store'])->name("order.store")->middleware("auth");
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('order.destroy')->middleware("auth");


require __DIR__.'/auth.php';
