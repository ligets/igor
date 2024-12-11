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
        $query = request()->input('search'); // Получаем значение из GET-параметра search

        $books = Book::query()
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('author', 'like', '%' . $query . '%');
            })
            ->get();
        return view('home', compact('books'));
    }
    public function getById(int $id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
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
}
