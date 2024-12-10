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

Route::post('/cart/{bookId}', [CartController::class, 'addToCart'])->name('books.addToCart')->middleware("auth");
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index')->middleware("auth");
Route::delete('/cart/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware("auth");

Route::get('/profile/orders', [OrderController::class, 'index'])->middleware("auth");


require __DIR__.'/auth.php';
