<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');

Route::get('books/{bookId}/add', [BookController::class, 'addToCart'])->name('books.addToCart');
Route::get('/cart', [BookController::class, 'showCart'])->name('cart.index');
Route::delete('/cart/{cartItemId}', [BookController::class, 'removeFromCart'])->name('cart.remove');


require __DIR__.'/auth.php';
