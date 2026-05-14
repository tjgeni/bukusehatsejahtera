<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Auth;

class CartController extends Controller
{
    public function index()
    {
        $loggedinUser = auth()->guard('web')->user();

        $cart = Cart::where('user_id', $loggedinUser->id)->first();

        $cartItems = $cart ? $cart->cartItems()->with('product')->get() : collect();

        return view('customer.cart.index', compact('cartItems'));
    }

    public function add(Product $product)
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
            'created_by' => Auth::user()->email,
        ]);

        $cartItem = $cart->cartItems()->where('product_id', $product->id)->first();

        $cart->cartItems()->updateOrCreate(
            ['product_id' => $product->id],
            ['quantity' => $cartItem ? $cartItem->quantity + 1 : 1],
            ['updated_by' => Auth::user()->email]
        );

        return back()->with('success', $product->name.' '.'berhasil ditambahkan ke cart');
    }

    public function increaseQuantity(CartItem $cartItem)
    {
        if ($cartItem->quantity >= $cartItem->product->stock) {
            return back()->with('warning', 'Jumlah stok tidak memadai');
        }

        $cartItem->update([
            'quantity' => $cartItem->quantity + 1,
            'updated_by' => auth()->guard('web')->user()->email,
        ]);

        return back()->with('success', 'Jumlah produk berhasil ditambah');
    }

    public function decreaseQuantity(CartItem $cartItem)
    {
        if ($cartItem->quantity <= 1) {
            // Kalau quantity sudah 1, hapus item dari cart
            $cartItem->delete();

            return back()->with('success', 'Produk dihapus dari keranjang');
        }

        $cartItem->update([
            'quantity' => $cartItem->quantity - 1,
            'updated_by' => auth()->guard('web')->user()->email,
        ]);

        return back()->with('success', 'Jumlah produk berhasil dikurangi');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return back()->with('success', 'Produk berhasil dihapus dari keranjang');
    }
}
