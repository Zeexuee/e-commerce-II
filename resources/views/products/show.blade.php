@extends('layouts.app')

@section('title', $product->name . ' - Toko Beras Berkah')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Product Image -->
    <div class="bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate>
        <div class="w-full h-96 bg-gradient-to-br from-amber-100 to-amber-50 flex items-center justify-center rounded-lg border-2 border-amber-200">
            @if ($product->image_url)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
            @else
                <div class="text-6xl">🌾</div>
            @endif
        </div>
    </div>

    <!-- Product Details -->
    <div class="bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">
        <div class="mb-4">
            <p class="text-sm text-primary bg-cream inline-block px-3 py-1 rounded-full mb-2 font-semibold">{{ $product->category }}</p>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
            <p class="text-gray-500">SKU: {{ $product->sku }}</p>
        </div>

        <!-- Price -->
        <div class="mb-6 pb-6 border-b border-gray-200">
            <p class="text-4xl font-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-1">per unit</p>
        </div>

        <!-- Stock -->
        <div class="mb-6">
            @if ($product->stock > 0)
                <p class="text-green-600 font-semibold mb-2">✓ Stok Tersedia</p>
                <p class="text-gray-600">Jumlah stok: <span class="font-bold">{{ $product->stock }}</span></p>
            @else
                <p class="text-red-600 font-semibold">✗ Stok Habis</p>
            @endif
        </div>

        <!-- Description -->
        <div class="mb-8 pb-8 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800 mb-3">Deskripsi Produk</h3>
            <p class="text-gray-700 leading-relaxed">{{ $product->description ?? 'Tidak ada deskripsi tersedia' }}</p>
        </div>

        <!-- Add to Cart -->
        @if ($product->stock > 0)
            <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-6">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                    <div class="flex items-center gap-4">
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-24 px-4 py-2 border border-primary rounded-lg focus:outline-none focus:border-accent">
                        <span class="text-gray-500">Max: {{ $product->stock }} unit</span>
                    </div>
                </div>
                <button type="submit" class="w-full bg-primary text-white py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors mb-3">
                    Tambahkan ke Keranjang
                </button>
            </form>
        @else
            <button disabled class="w-full bg-gray-300 text-gray-600 py-3 rounded-lg font-bold cursor-not-allowed mb-3">
                Stok Habis
            </button>
        @endif

        <!-- Back Link -->
        <a href="{{ route('products.index') }}" class="text-primary hover:text-primary/80 font-semibold">
            ← Kembali ke Produk
        </a>
    </div>
</div>
@endsection
