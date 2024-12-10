<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все книги</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Список книг</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($books as $book)
                <div class="bg-white shadow rounded p-4">
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded">
                    @endif
                    <h2 class="text-xl font-semibold mt-4">{{ $book->title }}</h2>
                    <p class="text-gray-600">Автор: {{ $book->author }}</p>
                    <p class="text-gray-700 mt-2">{{ Str::limit($book->description, 100) }}</p>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
