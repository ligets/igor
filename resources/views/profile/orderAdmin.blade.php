
<header>
    <x-header/>
</header>
<div class="flex">
    <aside class="border-r-[2px] border-gray-200 flex w-[25%] wrap items-center flex-col text-center">
        <a href="/profile" class="py-4 w-[60%] flex justify-center">
            <p class="{{ Request::is('profile') ? 'border-b-2' : '' }}">Профиль</p>
        </a>
        @if(auth()->user()->role->name == 'admin')
            <a href="/books/create" class="py-4 w-[60%] flex justify-center">
                <p class="{{ Request::is('books/create') ? 'border-b-2' : '' }}">Создание товара</p>
            </a>
            <a href="/profile/orders/admin" class="py-4 w-[60%] flex justify-center">
                <p class="{{ Request::is('books/create') ? 'border-b-2' : '' }}">Не выполненные заказы</p>
            </a>
        @else
            <a href="/profile/orders" class="py-4 w-[60%] flex justify-center">
                <p class="{{ Request::is('profile/orders') ? 'border-b-2' : '' }}">Мои заказы</p>
            </a>
        @endif
    </aside>
    <div class="p-12">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Orders') }}
            </h2>
        </x-slot>
        <div >
            <div class="grid grid-cols-4 gap-x-10 gap-y-5 mt-[30px]">
                @foreach($orders as $order)
                    <div class="flex gap-2 flex-col border border-gray-400 rounded-2xl p-3 w-[250px]">
                        <p>Заказа №{{ $order->id }}</p>
                        <p>Заказчик: {{ $order->user->email }}</p>
                        <p>Сумма: {{ $order->total_price }}</p>
                        <p>Cтатус: {{ $order->status->name }}</p>
                        <p>Дата: {{$order->created_at}}</p>
                        <div class="flex gap-x-3 h-[40px]">
                            <a href="{{ route('order.id', $order->id) }}" class="!bg-blue-500 text-white px-5 py-2 rounded w-[120px] text-center">Подробнее</a>
                            @if ($order->status->name == "В обработке")
                                <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Удалить</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

