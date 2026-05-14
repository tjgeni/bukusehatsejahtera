<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {

        $customers = User::select('id', 'name', 'email', 'phone', 'address', 'role', 'created_at')
            ->whereNot('role', 'admin')
            ->withCount('orders')
            ->withSum('orders', 'total_price')
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)->appends(request()->query());

        return view('admin.customers', compact('customers'));
    }
}
