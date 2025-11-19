@extends('layouts.app')

@section('title', 'Detail Pesanan - Toko Beras Berkah')

@section('content')
<div class="max-w-2xl mx-auto">
    <a href="{{ route('products.index') }}" class="text-primary hover:text-primary/80 font-semibold mb-8 inline-block scroll-animate" data-scroll-animate>
        ← Kembali
    </a>

    <div class="bg-white rounded-lg shadow-md p-8 scroll-animate" data-scroll-animate>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Detail Pesanan</h1>
        <p class="text-gray-500 mb-6">{{ $order->order_number }}</p>

        <!-- Order Status -->
        <div class="mb-8 pb-8 border-b border-gray-200">
            <h2 class="font-bold text-gray-800 mb-4">Status Pesanan</h2>
            <div class="inline-block px-4 py-2 rounded-full font-semibold
                @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                @elseif($order->status === 'paid') bg-blue-100 text-blue-800
                @elseif($order->status === 'processing') bg-purple-100 text-purple-800
                @elseif($order->status === 'shipped') bg-indigo-100 text-indigo-800
                @elseif($order->status === 'delivered') bg-green-100 text-green-800
                @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                @endif
            ">
                @switch($order->status)
                    @case('pending')
                        Menunggu Pembayaran
                        @break
                    @case('paid')
                        Pembayaran Dikonfirmasi
                        @break
                    @case('processing')
                        Sedang Diproses
                        @break
                    @case('shipped')
                        Sedang Dikirim
                        @break
                    @case('delivered')
                        Sampai Tujuan
                        @break
                    @case('cancelled')
                        Dibatalkan
                        @break
                    @default
                        {{ ucfirst($order->status) }}
                @endswitch
            </div>
        </div>

        <!-- Customer Information -->
        <div class="mb-8 pb-8 border-b border-gray-200">
            <h2 class="font-bold text-gray-800 mb-4">Informasi Pemesan</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500">Nama</p>
                    <p class="text-gray-800 font-semibold">{{ $order->customer_name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="text-gray-800 font-semibold">{{ $order->customer_email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Telepon</p>
                    <p class="text-gray-800 font-semibold">{{ $order->customer_phone }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Tanggal Pesanan</p>
                    <p class="text-gray-800 font-semibold">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Shipping Address -->
        <div class="mb-8 pb-8 border-b border-gray-200">
            <h2 class="font-bold text-gray-800 mb-4">Alamat Pengiriman</h2>
            <p class="text-gray-800 whitespace-pre-wrap">{{ $order->shipping_address }}</p>
        </div>

        <!-- Order Items -->
        <div class="mb-8 pb-8 border-b border-gray-200">
            <h2 class="font-bold text-gray-800 mb-4">Daftar Produk</h2>
            <div class="space-y-4">
                @foreach ($order->items as $item)
                    <div class="flex items-center justify-between pb-4 border-b border-gray-100 last:border-b-0">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $item->product->name }}</p>
                            <p class="text-sm text-gray-500">{{ $item->product->sku }}</p>
                            <p class="text-sm text-gray-600">{{ $item->quantity }} x Rp {{ number_format($item->unit_price, 0, ',', '.') }}</p>
                        </div>
                        <p class="font-bold text-amber-700">Rp {{ number_format($item->total_price, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Order Summary -->
        <div class="bg-gray-50 rounded-lg p-4 mb-8">
            <div class="space-y-3">
                <div class="flex justify-between text-gray-600">
                    <span>Subtotal:</span>
                    <span class="font-semibold">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Ongkos Kirim:</span>
                    <span class="font-semibold">Gratis</span>
                </div>
                <div class="border-t border-gray-200 pt-3 flex justify-between text-lg">
                    <span class="font-bold">Total:</span>
                    <span class="font-bold text-primary">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Notes -->
        @if ($order->notes)
            <div class="mb-8 pb-8 border-b border-gray-200">
                <h2 class="font-bold text-gray-800 mb-2">Catatan</h2>
                <p class="text-gray-700">{{ $order->notes }}</p>
            </div>
        @endif

        <!-- Actions -->
        <div class="text-center">
            <a href="{{ route('products.index') }}" class="inline-block bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary/90 transition-colors">
                Lanjut Belanja
            </a>
        </div>
    </div>
</div>
@endsection
