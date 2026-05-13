<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->where('stock', '>', 0);
        // Search by keyword
        if ($request->filled('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        $products = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('customer.products.index', compact('products', 'categories'));
    }

    public function detail(Product $product)
    {
        // Produk terkait dari kategori yang sama
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)
            ->where('stock', '>', 0)
            ->take(4)
            ->get();

        return view('customer.products.detail', compact('product', 'related'));
    }
}
