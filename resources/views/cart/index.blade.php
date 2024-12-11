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
        <div class="flex justify-between mt-5">
            <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded">Назад к книгам</a>
            <form action="{{ route('order.store') }}" method="POST" class="inline-block">
                @csrf
                <input name="type" type="text" value="cart" class="hidden">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Оформить заказ</button>
            </form>
        </div>
    </div>
</body>
</html>
