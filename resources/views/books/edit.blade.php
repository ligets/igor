<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать книгу</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <x-header/>
    </header>
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold mb-5">Редактировать книгу</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block font-medium mb-2">Название</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}" class="border rounded w-full px-3 py-2">
            </div>

            <div>
                <label for="author" class="block font-medium mb-2">Автор</label>
                <input type="text" id="author" name="author" value="{{ $book->author }}" class="border rounded w-full px-3 py-2">
            </div>

            <div>
                <label for="description" class="block font-medium mb-2">Описание</label>
                <textarea id="description" name="description" class="border rounded w-full px-3 py-2">{{ $book->description }}</textarea>
            </div>

            <div>
                <label for="price" class="block font-medium mb-2">Цена</label>
                <input type="number" id="price" name="price" value="{{ $book->price }}" class="border rounded w-full px-3 py-2">
            </div>

            <div>
                <label for="cover_image" class="block font-medium mb-2">Обложка</label>
                <input type="file" id="cover_image" name="cover_image" class="border rounded w-full px-3 py-2">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Сохранить</button>
            <a href="{{ route('books.show', $book->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Отмена</a>
        </form>
    </div>
</body>
</html>
