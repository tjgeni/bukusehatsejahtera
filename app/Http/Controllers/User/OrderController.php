<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $loggedinUser = auth()->guard('web')->user();

        $orders = Order::with('items', 'user')
            ->whereHas('user', function ($query) use ($loggedinUser) {
                $query->where('user_id', $loggedinUser->id);
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('customer.orders.index', compact('orders'));
    }

    public function detail(Order $order)
    {
        return view('customer.orders.detail', compact('order'));
    }
}
