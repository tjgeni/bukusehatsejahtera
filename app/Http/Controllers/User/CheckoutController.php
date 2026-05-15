<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::with('cartItems.product')
            ->where('user_id', Auth::id())
            ->first();

        return view('customer.checkout', compact('carts'));
    }

    public function process(Request $request)
    {
        // kita validasi dulu inputan dari user di FE
        $request->validate([
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        // kemudian, cek dulu di keranjang apakah ada produk yang ditaruh atau tidak
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartItems.product')
            ->first();

        if (! $cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang kamu kosong!');
        }

        // kalo ada produk, lanjutkan proses checkout menggunakan DB transaction
        //  kalo ada error, transaksi bisa dirollback
        // misalkan order sudah dibuat, tapi order item tidak dapat dibuat maka order akan dirollback
        try {
            DB::transaction(function () use ($cart, $request) {
                $total = $cart->cartItems->sum(
                    fn ($item) => $item->product->price * $item->quantity
                );

                $customerEmail = auth()->guard('web')->user()->email;

                $order = Order::create([
                    'order_number' => 'ORD-'.date('Ymd').'-'.strtoupper(Str::random(6)),
                    'user_id' => Auth::id(),
                    'total_price' => $total,
                    'status' => 'pending',
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'created_by' => $customerEmail,
                ]);

                foreach ($cart->cartItems as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                        'created_by' => $customerEmail,
                    ]);

                    $item->product->update([
                        'stock' => $item->product->stock - $item->quantity,
                        'updated_by' => $customerEmail,
                    ]);
                }

                // hapus item di keranjang.
                $cart->cartItems()->delete();
            });

            return redirect()->route('orders.index')
                ->with('success', 'Pesanan berhasil dibuat!');

        } catch (\Exception $e) {
            \Log::error('Checkout error: '.$e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan, pesanan gagal dibuat. Silakan coba lagi.');
        }
    }
}
