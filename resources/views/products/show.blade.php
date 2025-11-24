@extends('layouts.app')

@section('title', $product->name . ' - Toko Beras Berkah')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-12">
    <!-- Product Image -->
    <div class="scroll-animate" data-scroll-animate>
        <div class="w-full h-96 bg-gradient-to-br from-cream to-neutral flex items-center justify-center rounded-2xl overflow-hidden">
            @if ($product->image1)
                <img src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            @else
                <div class="text-6xl">🌾</div>
            @endif
        </div>

        <!-- Additional Images (if available) -->
        @if ($product->image2 || $product->image3)
            <div class="grid grid-cols-2 gap-4 mt-6">
                @if ($product->image2)
                    <div class="w-full h-32 bg-gradient-to-br from-cream to-neutral flex items-center justify-center rounded-lg overflow-hidden cursor-pointer hover:opacity-80 transition-opacity">
                        <img src="{{ asset('storage/' . $product->image2) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                @endif
                @if ($product->image3)
                    <div class="w-full h-32 bg-gradient-to-br from-cream to-neutral flex items-center justify-center rounded-lg overflow-hidden cursor-pointer hover:opacity-80 transition-opacity">
                        <img src="{{ asset('storage/' . $product->image3) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        @endif
    </div>

    <!-- Product Details -->
    <div class="scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">
        <div class="mb-6">
            <p class="text-sm text-primary font-semibold uppercase tracking-wide mb-3">{{ $product->category }}</p>
            <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
            <p class="text-gray-500">SKU: {{ $product->sku }}</p>
        </div>

        <!-- Price -->
        <div class="mb-8 pb-8 border-b border-gray-200">
            <p class="text-5xl font-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-2">per unit</p>
        </div>

        <!-- Stock -->
        <div class="mb-8 pb-8 border-b border-gray-200">
            @if ($product->stock > 0)
                <p class="text-green-600 font-semibold mb-2">✓ Stok Tersedia</p>
                <p class="text-gray-600">Jumlah stok: <span class="font-bold text-lg">{{ $product->stock }} unit</span></p>
            @else
                <p class="text-red-600 font-semibold">✗ Stok Habis</p>
            @endif
        </div>

        <!-- Description -->
        <div class="mb-8 pb-8 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Deskripsi Produk</h3>
            <p class="text-gray-700 leading-relaxed text-justify">{{ $product->description ?? 'Tidak ada deskripsi tersedia' }}</p>
        </div>

        <!-- Buy on Marketplace -->
        @if ($product->stock > 0)
            <div class="grid grid-cols-2 gap-4 mb-6">
                <a href="#" class="group bg-white border-2 border-red-500 py-4 rounded-lg font-bold hover:bg-red-50 transition-all flex items-center justify-center gap-3">
                    <img src="{{ asset('images/logo-shopee.png') }}" alt="Shopee" class="h-8 w-auto object-contain">
                    <span class="text-gray-800">Beli di Shopee</span>
                </a>
                <a href="#" class="group bg-white border-2 border-green-600 py-4 rounded-lg font-bold hover:bg-green-50 transition-all flex items-center justify-center gap-3">
                    <img src="{{ asset('images/logo-tokopedia.png') }}" alt="Tokopedia" class="h-8 w-auto object-contain">
                    <span class="text-gray-800">Beli di Tokopedia</span>
                </a>
            </div>
        @else
            <div class="grid grid-cols-2 gap-4 mb-6">
                <button disabled class="bg-gray-300 text-gray-600 py-4 rounded-lg font-bold cursor-not-allowed">
                    Stok Habis
                </button>
                <button disabled class="bg-gray-300 text-gray-600 py-4 rounded-lg font-bold cursor-not-allowed">
                    Stok Habis
                </button>
            </div>
        @endif

        <!-- Back Link -->
        <a href="{{ route('products.index') }}" class="text-primary hover:text-primary/80 font-semibold inline-flex items-center gap-2">
            ← Kembali ke Produk
        </a>
    </div>
</div>
@endsection
