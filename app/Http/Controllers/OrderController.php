<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', auth()->id())->orderBy('updated_at', 'asc')->get();
        return view("profile.order", compact('orders'));
    }

    public function getById(int $id) {
        $order = Order::with("books")->findOrFail($id);
        if ($order->user_id != auth()->id() && auth()->user()->role->name != 'admin') {
            abort(403);
        }
        return view("profile.orderId", compact('order'));
    }

    public function getAdmin() {
        $orders = Order::where("status_id", Status::where('name', 'В обработке')->first()->id)->get();
        return view("profile.orderAdmin", compact('orders'));
    }

    public function store() {
        $req = request()->validate([
            'type' => 'required|string',
            'book_id' => 'integer|min:0',
            'quantity' => 'integer|min:0'
        ]);
        if (request()->type == 'cart') {
            $cartSummary = Cart::where('user_id', auth()->id())
                ->with('book')
                ->get()
                ->map(function ($cart) {
                    return [
                        'book_id' => $cart->book_id,
                        'quantity' => $cart->quantity,
                        'total_price' => $cart->quantity * $cart->book->price,
                    ];
                });
            $totalPrice = $cartSummary->sum('total_price');
            $order = Order::create([
                'total_price' => $totalPrice,
                'user_id' => auth()->id(),
                'status_id' => Status::where('name', 'В обработке')->first()->id
            ]);
            foreach ($cartSummary as $item) {
                $order->books()->attach([
                    $item['book_id'] => ['quantity' => $item['quantity']]
                ]);
            }
            Cart::where("user_id", auth()->id())->delete();
        }
        else if ($req['type'] == 'book') {
            $book = Book::findOrFail($req['book_id']);
            $order = Order::create([
                'total_price' => $book->price * $req['quantity'],
                'user_id' => auth()->id(),
                'status_id' => Status::where('name', 'В обработке')->first()->id
            ]);
            $order->books()->attach($book->id, ['quantity' => $req['quantity']]);
        }
        else {
            abort(400);
        }
        return redirect()->route('profile.orders');
    }

    public function destroy(int $id) {
        $order = Order::findOrFail($id);
        if ($order->status->name != 'В обработке') {
            abort(400);
        }
        $order->status_id = Status::where("name", "Отменен")->first()->id;
        $order->save();
        return redirect(url()->previous());
    }

    public function confirm(int $order_id) {
        $order = Order::findOrFail($order_id);
        $order->status_id = Status::where('name', 'Выполнен')->first()->id;
        $order->save();
        return redirect(url()->previous());
    }
}
