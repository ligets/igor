<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Cart;

class BookController extends Controller
{
    public function createBook() {
        return view("books.create");
    }

    // Отображение всех книг на главной странице
    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }
    public function getById(int $id)
    {
        $book = Book::findOrFail($id);

        return view('', compact('book'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'string',
            'price' => 'required|numeric',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Сохраняем данные книги
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->price = $request->price;

        // Обработка загрузки обложки
        if ($request->hasFile('cover_image')) {
            $filePath = $request->file('cover_image')->store('cover_images', 'public');
            $book->cover_image = $filePath;
        }

        $book->save(); // Сохраняем книгу в базу данных

        return redirect()->route('books.create')->with('success', 'Книга добавлена успешно!');
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
