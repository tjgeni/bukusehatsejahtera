<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')
            ->select('id', 'name', 'description', 'category_id', 'price', 'stock', 'image', 'created_at')
            ->latest()->paginate(10);

        return view('admin.products.index', compact('products'));
    }
}
