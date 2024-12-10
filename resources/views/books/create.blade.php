<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить книгу</title>
    @vite('resources/css/app.css')  <!-- Подключение стилей, если используете Vite -->
</head>
<body>
    <header>
        <x-header/>
    </header>
    <div class="flex">
    <aside class="border-r-[2px] border-gray-200 flex w-[25%] wrap items-center flex-col text-center">
            <a href="/profile" class="py-4 w-[60%] flex justify-center">
                <p class="{{ Request::is('profile') ? 'border-b-2' : '' }}">Профиль</p>
            </a>
            <a href="/books/create" class="py-4 w-[60%] flex justify-center">
                <p class="{{ Request::is('books/create') ? 'border-b-2' : '' }}">Создание товара</p>
            </a>
        </aside>
    <div class="container mx-auto py-10 flex flex-col items-center">

        <!-- Форма для добавления книги -->
        <form class="bg-white p-4 text-lg font-medium text-gray-900 w-[60%] font-sans sm:p-8 shadow sm:rounded-lg" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p class="text-lg font-medium text-gray-900 ">Добавить новую книгу</p>
            <!-- Поле для названия книги -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium">Название</label>
                <input type="text" id="title" name="title" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Поле для автора книги -->
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium">Автор</label>
                <input type="text" id="author" name="author" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ old('author') }}" required>
                @error('author')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Поле для описания книги -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Описание</label>
                <textarea id="description" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Поле для цены -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium">Прайс</label>
                <input id="price" name="price" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ old('price') }}"/>
                @error('price')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Поле для загрузки изображения обложки -->
            <div class="mb-4">
                <label for="cover_image" class="block text-sm font-medium">Обложка</label>
                <input type="file" id="cover_image" name="cover_image" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                @error('cover_image')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Кнопка для отправки формы -->
            <button type="submit" class="inline-flex items-center px-4 py-2 !bg-gray-600  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">добавить</button>
        </form>
    </div>
    </div>
</body>
</html>
