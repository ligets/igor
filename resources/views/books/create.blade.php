<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить книгу</title>
    @vite('resources/css/app.css')  <!-- Подключение стилей, если используете Vite -->
</head>
<body>
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-5">Добавить новую книгу</h1>

        <!-- Форма для добавления книги -->
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Поле для названия книги -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium">Название</label>
                <input type="text" id="title" name="title" class="border px-4 py-2 w-full" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Поле для автора книги -->
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium">Автор</label>
                <input type="text" id="author" name="author" class="border px-4 py-2 w-full" value="{{ old('author') }}" required>
                @error('author')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Поле для описания книги -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Описание</label>
                <textarea id="description" name="description" class="border px-4 py-2 w-full">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Поле для загрузки изображения обложки -->
            <div class="mb-4">
                <label for="cover_image" class="block text-sm font-medium">Обложка</label>
                <input type="file" id="cover_image" name="cover_image" class="border px-4 py-2 w-full">
                @error('cover_image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Кнопка для отправки формы -->
            <button type="submit" class=" px-4 py-2 rounded">Создать книгу</button>
        </form>
    </div>
</body>
</html>
