<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->paginate(12);
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        if (!$product->is_active) {
            abort(404);
        }
        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $products = Product::where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->paginate(12);
        
        return view('products.index', compact('products', 'query'));
    }

    public function filterByCategory($category)
    {
        $products = Product::where('is_active', true)
            ->where('category', $category)
            ->paginate(12);
        
        return view('products.index', compact('products', 'category'));
    }
}
