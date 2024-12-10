<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все книги</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-5">Список книг</h1>

        <div class="grid grid-cols-3 gap-4">
            @foreach ($books as $book)
                <div class="border p-4 rounded">
                    <h3 class="font-bold text-xl">{{ $book->title }}</h3>
                    <p>{{ $book->author }}</p>
                    <p>{{ Str::limit($book->description, 100) }}</p>
                    <a href="{{ route('books.addToCart', $book->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 inline-block">В корзину</a>
                </div>
            @endforeach
        </div>

        <a href="{{ route('cart.index') }}" class="mt-5 inline-block bg-green-500 text-white px-4 py-2 rounded">Перейти в корзину</a>
    </div>
</body>
</html>
