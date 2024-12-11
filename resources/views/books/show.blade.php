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
        <div class="flex flex-col">
            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class=" h-[500px] object-cover rounded float-left">
            <div class="flex justify-between"> 
                <form action="{{ route('books.addToCart', $book->id) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="!bg-blue-500 text-white px-4 py-2 rounded mt-2 w-[120px] text-center">
                                    В корзину
                        </button>
                </form>
                <a href="{{ route('home') }}" class="!bg-blue-500 text-white px-5 py-2 rounded mt-2 w-[120px] text-center">Назад</a>
            </div>
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
