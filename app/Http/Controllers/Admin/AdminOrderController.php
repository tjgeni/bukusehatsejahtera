<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('id', 'user_id', 'order_number', 'total_price', 'address', 'phone', 'status', 'created_at')
            ->with([
                'user:id,name,email',
                'items.product:id,name,price',
            ])
            ->withCount('items')
            ->when(request('search'), function ($query, $search) {
                $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('user', fn ($q) => $q->where('name', 'like', "%{$search}%"));
            })
            ->when(request('status'), fn ($query, $status) => $query->where('status', $status))
            ->latest()
            ->paginate(10)->appends(request()->query());

        return view('admin.orders.index', compact('orders'));
    }

    public function detail(Order $order)
    {
        return view('admin.orders.detail', compact('order'));
    }

    public function changeOrderStatus(Request $request, Order $order)
    {
        $order->update(['status' => $request->status]);

        return back()->with('success', 'Status pesanan berhasil diubah');
    }
}
