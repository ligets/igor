<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все книги</title>
    @vite('resources/css/app.css')
</head>
<body >
    <header>
        <x-header/>
    </header>
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-5">Список книг</h1>

        <div class="grid grid-cols-5 gap-4">
            @foreach ($books as $book)
                <div class="border p-4 rounded">
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded">
                    @endif
                    <h3 class="font-bold text-xl">{{ $book->title }}</h3>
                    <p>{{ $book->author }}</p>
                    <p class="text-pretty break-words">{{ Str::limit($book->description, 97) }}</p>
                    <p>{{ $book->price }}</p>
                    <form action="{{ route('books.addToCart', $book->id) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="!bg-blue-500 text-white px-4 py-2 rounded mt-2">
                            В корзину
                        </button>
                    </form>

                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
