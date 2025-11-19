@extends('layouts.app')

@section('title', 'Daftar Produk - Toko Beras Berkah')

@section('content')
<div class="mb-8 scroll-animate" data-scroll-animate>
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Produk Kami</h1>
    <p class="text-gray-600">Pilih beras berkualitas terbaik untuk keluarga Anda</p>
</div>

@if ($products->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
        @foreach ($products as $product)
            <div class="scroll-animate" data-scroll-animate style="animation-delay: {{ ($loop->index % 4) * 0.1 }}s;">
                @include('partials.product-card')
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex justify-center scroll-animate" data-scroll-animate>
        {{ $products->links() }}
    </div>
@else
    <div class="text-center py-12 scroll-animate" data-scroll-animate>
        <p class="text-gray-600 text-lg">Produk tidak ditemukan</p>
    </div>
@endif
@endsection
