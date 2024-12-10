<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($bookId)
    {
        // Получаем книгу
        $book = Book::findOrFail($bookId);

        // Проверяем, есть ли уже книга в корзине
        $cartItem = Cart::where('book_id', $book->id)->where("user_id", auth()->id())->first();

        if ($cartItem) {
            $cartItem->quantity += 1; // Увеличиваем количество, если книга уже в корзине
            $cartItem->save();
        } else {
            // Если книги нет в корзине, добавляем её
            Cart::create([
                'book_id' => $book->id,
                'user_id' => auth()->id(),
                'quantity' => 1,
            ]);
        }

        return redirect()->route('home');
    }

    // Отображение корзины
    public function showCart()
    {
        $cartItems = Cart::where("user_id", auth()->id())->with('book')->get();
        return view('cart.index', compact('cartItems'));
    }

    // Удаление книги из корзины
    public function removeFromCart($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);
        $cartItem->delete();
        return redirect()->route('cart.index');
    }
}
