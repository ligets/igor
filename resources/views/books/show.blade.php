<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }}</title>
    @vite('resources/css/app.css')
    <style>
        .description {
            max-width: 600px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            text-overflow: ellipsis;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <header>
        <x-header/>
    </header>
    <div class="container mx-auto py-10 flex">
        <div>
        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-[40%] h-[500px] object-cover rounded float-left">
        <form action="{{ route('books.addToCart', $book->id) }}" method="POST" class="inline-block">
                @csrf
                <button type="submit" class="!bg-blue-500 text-white px-4 py-2 rounded mt-2">
                            В корзину
                </button>
        </form>
        <a href="{{ route('home') }}" class="mt-5 inline-block bg-blue-500 text-white px-4 py-2 rounded">Назад</a>
        </div>
        <div class="ml-[5%]">
            <h1 class="text-3xl font-bold mb-5">{{ $book->title }}</h1>
            <p class="text-lg mb-3">{{ $book->author }}</p>
            <p class="text-lg mb-3 description">{{ $book->description }}</p>
            <p class="text-xl font-semibold">Цена: {{ $book->price }} руб.</p>
        </div>
    </div>
</body>
</html>
