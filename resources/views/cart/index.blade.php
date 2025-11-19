@extends('layouts.app')

@section('title', 'Keranjang Belanja - Toko Beras Berkah')

@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-8 scroll-animate" data-scroll-animate>Keranjang Belanja</h1>

@if (count($items) > 0)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate>
            <div class="space-y-4">
                @foreach ($items as $item)
                    <div class="flex items-center gap-4 pb-4 border-b border-gray-200 last:border-b-0">
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-800">{{ $item['product']->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $item['product']->sku }}</p>
                            <p class="text-primary font-semibold">Rp {{ number_format($item['product']->price, 0, ',', '.') }} x {{ $item['quantity'] }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-bold text-gray-800">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</p>
                            <form action="{{ route('cart.remove', $item['product']) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 pt-6 border-t border-gray-200">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-600 hover:text-gray-800 text-sm font-semibold">
                        Kosongkan Keranjang
                    </button>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="bg-white rounded-lg shadow-md p-6 h-fit scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Ringkasan Pesanan</h2>
            
            <div class="space-y-3 pb-4 border-b border-gray-200">
                <div class="flex justify-between">
                    <span class="text-gray-600">Subtotal:</span>
                    <span class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Ongkos Kirim:</span>
                    <span class="font-semibold">Gratis</span>
                </div>
            </div>

            <div class="flex justify-between py-4 mb-6">
                <span class="font-bold text-lg">Total:</span>
                <span class="font-bold text-lg text-primary">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>

            <a href="{{ route('checkout') }}" class="w-full bg-primary text-white py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors text-center block">
                Lanjut ke Pembayaran
            </a>

            <a href="{{ route('products.index') }}" class="w-full mt-3 bg-neutral text-gray-800 py-3 rounded-lg font-bold hover:bg-gray-300 transition-colors text-center block">
                Lanjut Belanja
            </a>
        </div>
    </div>
@else
    <div class="text-center py-12 bg-white rounded-lg shadow-md scroll-animate" data-scroll-animate>
        <p class="text-2xl text-gray-500 mb-4">🛒</p>
        <p class="text-lg text-gray-600 mb-6">Keranjang Anda kosong</p>
        <a href="{{ route('products.index') }}" class="inline-block bg-amber-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-amber-700 transition-colors">
            Mulai Belanja
        </a>
    </div>
@endif
@endsection
