@extends('layouts.app')

@section('title', 'Pesanan Berhasil - Toko Beras Berkah')

@section('content')
<div class="max-w-md mx-auto text-center bg-white rounded-lg shadow-md p-8 my-12 scroll-animate" data-scroll-animate>
    <div class="text-6xl mb-4">✓</div>
    <h1 class="text-3xl font-bold text-primary mb-2">Pesanan Berhasil</h1>
    <p class="text-gray-600 mb-6">Terima kasih telah berbelanja di Toko Beras Berkah</p>

    <div class="bg-gray-50 rounded-lg p-6 text-left mb-6">
        <h2 class="font-bold text-gray-800 mb-3">Detail Pesanan</h2>
        
        <div class="space-y-2 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-600">Nomor Pesanan:</span>
                <span class="font-semibold">{{ $order->order_number ?? 'ORD-' . $order->id }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Nama Pemesan:</span>
                <span class="font-semibold">{{ $order->customer_name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Email:</span>
                <span class="font-semibold">{{ $order->customer_email }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Telepon:</span>
                <span class="font-semibold">{{ $order->customer_phone }}</span>
            </div>
            <div class="flex justify-between pt-2 border-t border-gray-200">
                <span class="text-gray-600">Total:</span>
                <span class="font-bold text-lg text-primary">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Status:</span>
                <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">{{ ucfirst($order->status) }}</span>
            </div>
        </div>
    </div>

    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 text-left text-sm text-blue-800 mb-6">
        <p class="font-semibold mb-2">📧 Konfirmasi akan dikirim ke email Anda</p>
        <p>Silakan periksa email Anda untuk detail pembayaran dan tracking pengiriman.</p>
    </div>

    <div class="space-y-3">
        <a href="{{ route('order.show', $order) }}" class="block w-full bg-primary text-white py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors">
            Lihat Detail Pesanan
        </a>
        <a href="{{ route('products.index') }}" class="block w-full bg-neutral text-gray-800 py-3 rounded-lg font-bold hover:bg-gray-300 transition-colors">
            Lanjut Belanja
        </a>
    </div>
</div>
@endsection
