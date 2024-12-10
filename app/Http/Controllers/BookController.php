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
}
