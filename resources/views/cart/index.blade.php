<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto py-10">
        <h1 class="text-2xl font-bold mb-5">Ваша корзина</h1>

        <div class="space-y-4">
            @foreach ($cartItems as $item)
                <div class="border p-4 rounded flex justify-between">
                    <div>
                        <h3 class="font-bold text-xl">{{ $item->book->title }}</h3>
                        <p>{{ $item->quantity }} шт.</p>
                    </div>
                    <div>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('home') }}" class="mt-5 inline-block bg-blue-500 text-white px-4 py-2 rounded">Назад к книгам</a>
    </div>
</body>
</html>
