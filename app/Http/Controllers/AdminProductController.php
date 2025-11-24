<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

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
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // Handle image1 (required)
        if ($request->hasFile('image1')) {
            $path = $request->file('image1')->store('products', 'public');
            $validated['image1'] = $path;
        }

        // Handle image2 (optional)
        if ($request->hasFile('image2')) {
            $path = $request->file('image2')->store('products', 'public');
            $validated['image2'] = $path;
        }

        // Handle image3 (optional)
        if ($request->hasFile('image3')) {
            $path = $request->file('image3')->store('products', 'public');
            $validated['image3'] = $path;
        }

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
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        // Handle image1
        if ($request->hasFile('image1')) {
            if ($product->image1) {
                Storage::disk('public')->delete($product->image1);
            }
            $path = $request->file('image1')->store('products', 'public');
            $validated['image1'] = $path;
        }

        // Handle image2
        if ($request->hasFile('image2')) {
            if ($product->image2) {
                Storage::disk('public')->delete($product->image2);
            }
            $path = $request->file('image2')->store('products', 'public');
            $validated['image2'] = $path;
        }

        // Handle image3
        if ($request->hasFile('image3')) {
            if ($product->image3) {
                Storage::disk('public')->delete($product->image3);
            }
            $path = $request->file('image3')->store('products', 'public');
            $validated['image3'] = $path;
        }

        $product->update($validated);
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        if ($product->image1) {
            Storage::disk('public')->delete($product->image1);
        }
        if ($product->image2) {
            Storage::disk('public')->delete($product->image2);
        }
        if ($product->image3) {
            Storage::disk('public')->delete($product->image3);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus');
    }
}
