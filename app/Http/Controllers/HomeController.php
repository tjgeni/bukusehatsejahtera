<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->select('id', 'category_id', 'name', 'description', 'price', 'stock', 'image', 'created_by')
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::select('id', 'name', 'created_at');

        return view('customer.home', compact('products', 'categories'));
    }
}
