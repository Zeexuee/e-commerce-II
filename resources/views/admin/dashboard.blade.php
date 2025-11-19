@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-2">Admin Dashboard</h1>
    <p class="text-gray-600">Kelola toko beras Anda dari sini</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
    <!-- Total Produk -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-primary">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Produk</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalProducts }}</p>
            </div>
            <div class="text-5xl text-primary/20">📦</div>
        </div>
    </div>

    <!-- Total Pesanan -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-accent">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Pesanan</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalOrders }}</p>
            </div>
            <div class="text-5xl text-accent/20">📋</div>
        </div>
    </div>

    <!-- Total Revenue -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-brown">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Revenue</p>
                <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
            </div>
            <div class="text-5xl text-brown/20">💰</div>
        </div>
    </div>

    <!-- Manage Products -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-primary">
        <div class="flex flex-col justify-between h-full">
            <p class="text-gray-500 text-sm mb-4">Kelola Produk</p>
            <a href="{{ route('admin.products.index') }}" class="inline-block bg-primary text-white px-4 py-2 rounded hover:bg-primary/90 transition-colors">
                Lihat Produk
            </a>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Pesanan Terbaru</h2>
    
    @if ($recentOrders->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">ID Pesanan</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Nama Pembeli</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Total</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentOrders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-800">#{{ $order->id }}</td>
                            <td class="px-4 py-3 text-sm text-gray-800">{{ $order->customer_name ?? 'N/A' }}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-primary">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if ($order->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif ($order->status === 'completed') bg-green-100 text-green-800
                                    @elseif ($order->status === 'cancelled') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800
                                    @endif
                                ">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 text-center py-8">Belum ada pesanan</p>
    @endif
</div>
@endsection
