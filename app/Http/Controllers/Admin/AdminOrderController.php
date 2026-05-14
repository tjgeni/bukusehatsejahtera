<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::when($request->status, fn ($q, $status) => $q->where('status', $status))
            ->when($request->search, function ($q, $search) {
                $q->where(function ($q2) use ($search) {
                    $q2->where('order_number', 'like', "%{$search}%")
                        ->orWhereHas('user', fn ($q3) => $q3->where('name', 'like', "%{$search}%"));
                });
            });

        $orderCounts = Order::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $orders = (clone $query)
            ->select('id', 'user_id', 'order_number', 'total_price', 'address', 'phone', 'status', 'created_at')
            ->with(['user:id,name,email', 'items.product:id,name,price'])
            ->withCount('items')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.orders.index', compact('orders', 'orderCounts'));

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
