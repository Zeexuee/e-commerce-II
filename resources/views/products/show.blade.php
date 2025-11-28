@extends('layouts.app')

@section('title', $product->name . ' - Toko Beras Berkah')

@section('content')
<div class="py-8">
    <div class="max-w-6xl mx-auto px-4 mb-6">
        <a href="{{ route('products.index') }}" class="text-primary hover:text-primary/80 font-semibold inline-flex items-center gap-2">
            ← Kembali ke Produk
        </a>
    </div>
    
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Left: Images (40% width) -->
            <div class="w-full lg:w-2/5 scroll-animate" data-scroll-animate>
                <!-- Main Image -->
                <div class="w-full bg-gray-100 rounded-lg overflow-hidden mb-6 flex items-center justify-center"
                     style="max-height: 550px;">
                    <img id="mainImage" 
                         src="{{ asset('storage/' . $product->image1) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-full object-cover object-center">
                </div>

                <!-- Thumbnail Images -->
                <div class="grid grid-cols-3 gap-3">
                    <!-- First thumbnail -->
                    <div class="thumbnail-item group cursor-pointer" data-image="{{ asset('storage/' . $product->image1) }}">
                        <div class="w-full aspect-square bg-gray-200 rounded-lg overflow-hidden border-2 border-gray-300 group-hover:border-gray-900 transition-all">
                            @if ($product->image1)
                                <img src="{{ asset('storage/' . $product->image1) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-3xl">🌾</div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Second thumbnail -->
                    <div class="thumbnail-item group cursor-pointer" data-image="{{ asset('storage/' . $product->image2) }}">
                        <div class="w-full aspect-square bg-gray-200 rounded-lg overflow-hidden border-2 border-gray-300 group-hover:border-gray-900 transition-all">
                            @if ($product->image2)
                                <img src="{{ asset('storage/' . $product->image2) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-3xl">🌾</div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Third thumbnail -->
                    <div class="thumbnail-item group cursor-pointer" data-image="{{ asset('storage/' . $product->image3) }}">
                        <div class="w-full aspect-square bg-gray-200 rounded-lg overflow-hidden border-2 border-gray-300 group-hover:border-gray-900 transition-all">
                            @if ($product->image3)
                                <img src="{{ asset('storage/' . $product->image3) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-3xl">🌾</div>
                            @endif
                        </div>
                    </div>
                </div>

                <script>
                    document.querySelectorAll('.thumbnail-item').forEach(item => {
                        item.addEventListener('click', function() {
                            const imageUrl = this.getAttribute('data-image');
                            document.getElementById('mainImage').src = imageUrl;
                            
                            // Update border style for active thumbnail
                            document.querySelectorAll('.thumbnail-item').forEach(t => {
                                t.querySelector('div').classList.remove('border-gray-900');
                                t.querySelector('div').classList.add('border-gray-300');
                            });
                            this.querySelector('div').classList.remove('border-gray-300');
                            this.querySelector('div').classList.add('border-gray-900');
                        });
                    });
                    
                    // Set first thumbnail as active on page load
                    document.querySelector('.thumbnail-item div').classList.add('border-gray-900');
                    document.querySelector('.thumbnail-item div').classList.remove('border-gray-300');
                </script>
            </div>

            <!-- Right: Details (60% width) -->
            <div class="w-full lg:w-3/5 scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">
                <!-- Category -->
                <p class="text-sm text-gray-500 font-medium uppercase tracking-wide mb-2">{{ $product->category }}</p>
                
                <!-- Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $product->name }}</h1>

                <!-- Delivery Info -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <p class="text-sm text-gray-600 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                        Pengiriman dalam 1-3 hari
                    </p>
                </div>

                <!-- Price -->
                <div class="mb-6 pb-6 border-b border-gray-200">
                    <div class="flex items-baseline gap-3 mb-4">
                        <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Description -->
                @if ($product->description)
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <p class="text-gray-700 text-sm leading-relaxed">{{ $product->description }}</p>
                    </div>
                @endif

                <!-- Marketplace Section -->
                <p class="text-sm text-gray-600 font-medium text-center mb-3">Dapat barang kami di:</p>
                
                <!-- Action Buttons -->
                <div class="mb-6 grid grid-cols-2 gap-3">
                    <a href="#" class="border-2 border-gray-900 text-gray-900 font-medium py-3 px-4 rounded-full hover:bg-gray-900 hover:text-white transition-colors text-center">
                        Shopee
                    </a>
                    <a href="#" class="border-2 border-gray-900 text-gray-900 font-medium py-3 px-4 rounded-full hover:bg-gray-900 hover:text-white transition-colors text-center">
                        Tokopedia
                    </a>
                </div>

                <!-- WhatsApp Contact -->
                <p class="text-sm text-gray-900 font-medium text-center mb-3">Hubungi kami:</p>
                <button class="w-full bg-white border-2 border-gray-900 text-gray-900 font-medium py-3 rounded-full hover:bg-gray-50 transition-colors text-center mb-6">
                    WhatsApp
                </button>

                <!-- Collapsible Sections -->
                <div class="space-y-0 border border-gray-200 rounded-lg divide-y divide-gray-200">
                    <!-- Product Details Section -->
                    <details class="group">
                        <summary class="flex items-center justify-between p-4 cursor-pointer hover:bg-gray-50 font-semibold text-gray-900">
                            <span>DETAIL PRODUK</span>
                            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </summary>
                        <div class="p-4 bg-gray-50 space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">SKU:</span>
                                <span class="font-semibold text-gray-900">{{ $product->sku }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Kategori:</span>
                                <span class="font-semibold text-gray-900">{{ $product->category }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Stok:</span>
                                <span class="font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->stock > 0 ? $product->stock . ' unit' : 'Habis' }}
                                </span>
                            </div>
                        </div>
                    </details>

                    <!-- Additional Info Section -->
                    <details class="group">
                        <summary class="flex items-center justify-between p-4 cursor-pointer hover:bg-gray-50 font-semibold text-gray-900">
                            <span>INFORMASI TAMBAHAN</span>
                            <svg class="w-5 h-5 transform transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </summary>
                        <div class="p-4 bg-gray-50 space-y-2 text-sm text-gray-700">
                            <p>✓ Berkualitas premium dari Toko Beras Berkah</p>
                            <p>✓ Gratis ongkos kirim untuk pembelian di atas Rp 100.000</p>
                            <p>✓ Garansi uang kembali 100% jika tidak puas</p>
                            <p>✓ Tersedia di Shopee dan Tokopedia</p>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
