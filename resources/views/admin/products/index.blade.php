@extends('layouts.admin')

@section('title', 'Kelola Produk - Admin')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Kelola Produk</h1>
        <p class="text-gray-600">Tambah, edit, atau hapus produk</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="bg-green-600 text-black px-6 py-3 rounded-lg hover:bg-green-700 transition-colors font-semibold">
        + Tambah Produk
    </a>
</div>

@if ($message = Session::get('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
        {{ $message }}
    </div>
@endif

<!-- Product Table -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    @if ($products->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Produk</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">SKU</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Harga</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Stok</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Kategori</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-cream rounded-lg flex items-center justify-center overflow-hidden">
                                        @if ($product->image1)
                                            <img src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                        @else
                                            <span class="text-xl">🌾</span>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                                        <p class="text-xs text-gray-500">{{ Str::limit($product->description, 30) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $product->sku }}</td>
                            <td class="px-4 py-3 text-sm font-semibold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if ($product->stock > 20) bg-green-100 text-green-800
                                    @elseif ($product->stock > 0) bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800
                                    @endif
                                ">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $product->category }}</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if ($product->is_active) bg-blue-100 text-blue-800
                                    @else bg-gray-100 text-gray-800
                                    @endif
                                ">
                                    @if ($product->is_active) Aktif @else Nonaktif @endif
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-primary hover:text-primary/80 text-sm font-semibold">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-4 border-t">
            {{ $products->links() }}
        </div>
    @else
        <div class="p-12 text-center">
            <p class="text-gray-500 text-lg mb-4">Belum ada produk</p>
            <a href="{{ route('admin.products.create') }}" class="text-primary hover:text-primary/80 font-semibold">
                Tambah produk pertama Anda
            </a>
        </div>
    @endif
</div>
@endsection
