
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
        @else
            <a href="/profile/orders" class="py-4 w-[60%] flex justify-center">
                <p class="{{ Request::is('profile/orders') ? 'border-b-2' : '' }}">Мои заказы</p>
            </a>
        @endif
    </aside>
    <div class="w-[45%] mx-auto">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Orders') }}
            </h2>
        </x-slot>
        <div>
            @foreach($orders as $order)
                <div>
                    <p>Id-Заказа {{ $order->id }}</p>
                    <p>Сумма {{ $order->total_price }}</p>
                    <p>Cтатус {{ $order->status_id }}</p>
                    <a href="{{ route('home') }}" class="!bg-blue-500 text-white px-5 py-2 rounded w-[120px] text-center">Назад</a>
                </div>
            @endforeach
        </div>
    </div>
</div>

