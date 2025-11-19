<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sku' => 'required|string|unique:products',
            'category' => 'required|string',
            'is_active' => 'boolean',
        ]);

        Product::create($validated);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
            'category' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus');
    }
}
