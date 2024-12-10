<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', auth()->id())->orderBy('updated_at', 'asc')->get();
        return view("", compact('orders'));
    }

    public function cancel(int $order_id) {
        $order = Order::findOrFail($order_id);
        if ($order->user_id != auth()->id() && auth()->user()->role->name != 'admin') {
            abort(403);
        }
        $order->status_id = Status::where('name', 'Отменен')->first()->id;
        $order->save();
        return redirect()->route("");
    }

    public function getAdmin() {
        $orders = Order::where("status_id", Status::where('name', 'В обработке')->first()->id)->get();
        return view("", compact('orders'));
    }

    public function store() {
        $req = request()->validate([
            'type' => 'required|string'
        ]);
        if ($req->type == 'cart') {
            $items =
        }
    }

}
