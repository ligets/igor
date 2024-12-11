<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все книги</title>
    @vite('resources/css/app.css')
</head>
<body>
<header>
    <x-header/>
</header>

<div class="container mx-auto py-10">


    <h1 class="text-2xl font-bold mb-5">Заказ №{{ $order->id }}. Общая сумма: {{ $order->total_price }} руб.</h1>
    <h2 class="text-xl font-bold mb-5">Статус: {{$order->status->name}}</h2>
    <div class="grid grid-cols-5 gap-4">
        @foreach ($order->books as $book)
            <div class="border p-4 rounded">
                <a href="{{ route('books.show', $book->id) }}">
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded">
                    @endif
                    <h3 class="font-bold text-xl">{{ $book->title }}</h3>
                    <p>Автор: {{ $book->author }}</p>
                    <p>Количество: {{ $book->pivot->quantity }}</p>
                    <p>Общая цена: {{ $book->price * $book->pivot->quantity }} руб.</p>
                </a>

            </div>
        @endforeach
    </div>
</div>
</body>
</html>
