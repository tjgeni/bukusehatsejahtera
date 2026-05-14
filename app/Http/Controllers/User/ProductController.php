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
        $products = Product::select('id', 'name', 'price', 'stock', 'image', 'description', 'category_id')
            ->with('category:id,name')
            ->where('stock', '>', 0)
            ->when($request->search, fn ($q, $search) => $q->where('name', 'like', "%{$search}%"))
            ->when($request->category, fn ($q, $category) => $q->where('category_id', $category))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();

        return view('customer.products.index', compact('products', 'categories'));
    }

    public function detail(Product $product)
    {
        $related = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)
            ->where('stock', '>', 0)
            ->take(4)
            ->get();

        return view('customer.products.detail', compact('product', 'related'));
    }
}
