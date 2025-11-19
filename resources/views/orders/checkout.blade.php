@extends('layouts.app')

@section('title', 'Checkout - Toko Beras Berkah')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-8 scroll-animate" data-scroll-animate>Checkout</h1>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Checkout Form -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate>
        <form action="{{ route('order.store') }}" method="POST">
            @csrf

            <!-- Customer Information -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Data Diri Pemesan</h2>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                <input type="text" name="customer_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('customer_name') border-red-500 @enderror" value="{{ old('customer_name') }}">
                @error('customer_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                <input type="email" name="customer_email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('customer_email') border-red-500 @enderror" value="{{ old('customer_email') }}">
                @error('customer_email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon *</label>
                <input type="tel" name="customer_phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('customer_phone') border-red-500 @enderror" value="{{ old('customer_phone') }}">
                @error('customer_phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Shipping Address -->
            <h2 class="text-xl font-bold text-gray-800 mb-4">Alamat Pengiriman</h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap *</label>
                <textarea name="shipping_address" required rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary @error('shipping_address') border-red-500 @enderror">{{ old('shipping_address') }}</textarea>
                @error('shipping_address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Notes -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Tambahan</label>
                <textarea name="notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" placeholder="Masukkan catatan khusus untuk pesanan Anda...">{{ old('notes') }}</textarea>
            </div>

            <button type="submit" class="w-full bg-primary text-white py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors">
                Buat Pesanan
            </button>
        </form>
    </div>

    <!-- Order Summary -->
    <div class="bg-white rounded-lg shadow-md p-6 h-fit scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Ringkasan Pesanan</h2>
        
        @php
            $cart = session()->get('cart', []);
            $total = 0;
        @endphp

        <div class="space-y-3 mb-4 pb-4 border-b border-gray-200">
            @forelse ($cart as $productId => $quantity)
                @php
                    $product = App\Models\Product::find($productId);
                    if ($product) {
                        $subtotal = $product->price * $quantity;
                        $total += $subtotal;
                @endphp
                    <div class="text-sm">
                        <p class="text-gray-700 font-semibold">{{ $product->name }}</p>
                        <p class="text-gray-500">{{ $quantity }} x Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-gray-700 font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                    </div>
                @php
                    }
                @endphp
            @empty
                <p class="text-gray-500">Keranjang kosong</p>
            @endforelse
        </div>

        <div class="space-y-3 pb-4 border-b border-gray-200">
            <div class="flex justify-between text-gray-600">
                <span>Subtotal:</span>
                <span class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between text-gray-600">
                <span>Ongkos Kirim:</span>
                <span class="font-semibold">Gratis</span>
            </div>
        </div>

        <div class="flex justify-between py-4">
            <span class="font-bold">Total:</span>
            <span class="font-bold text-lg text-amber-700">Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>

        <a href="{{ route('cart.show') }}" class="w-full text-center text-primary hover:text-primary/80 font-semibold py-2">
            ← Edit Keranjang
        </a>
    </div>
</div>
@endsection
