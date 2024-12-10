<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Cart;

class BookController extends Controller
{
    // Отображение всех книг на главной странице
    public function index()
{
    $books = Book::all(); // Получаем все книги
    return view('home', compact('books')); // Возвращаем представление home
}
    
public function create()
{
    return view('books.create'); // Здесь предполагается, что у вас есть представление books/create.blade.php
}

public function store(Request $request)
{
    // Валидация данных формы
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'price' => 'required|numeric',
        // Добавьте другие поля, если нужно
    ]);

    // Создание книги в базе данных
    Book::create($validated);

    // Перенаправление на страницу со списком книг (или любую другую страницу)
    return redirect()->route('books.index');
}

    // Добавление книги в корзину
    public function addToCart($bookId)
    {
        // Получаем книгу
        $book = Book::findOrFail($bookId);

        // Проверяем, есть ли уже книга в корзине
        $cartItem = Cart::where('book_id', $book->id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1; // Увеличиваем количество, если книга уже в корзине
            $cartItem->save();
        } else {
            // Если книги нет в корзине, добавляем её
            Cart::create([
                'book_id' => $book->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('home');
    }

    // Отображение корзины
    public function showCart()
    {
        $cartItems = Cart::with('book')->get();
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
