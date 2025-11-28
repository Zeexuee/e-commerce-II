<div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden cursor-pointer">
    <!-- Image Container with Like Button and Discount Badge -->
    <div class="relative overflow-hidden bg-gray-100 rounded-2xl" style="height: 280px;">
        @if ($product->image1)
            <img src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        @else
            <div class="w-full h-full flex items-center justify-center">
                <div class="text-6xl">🌾</div>
            </div>
        @endif

        <!-- Like Button -->
        <button class="absolute top-3 right-3 bg-white rounded-full p-2 hover:bg-gray-100 transition-colors">
            <svg class="w-5 h-5 text-gray-400 hover:text-red-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Discount Badge -->
        @if ($product->discount)
            <div class="absolute bottom-3 left-3 bg-yellow-400 text-gray-900 font-bold text-xs px-2 py-1 rounded">
                -{{ $product->discount }}%
            </div>
        @endif
    </div>

    <!-- Product Info -->
    <div class="p-4">
        <a href="{{ route('products.show', $product) }}" class="block">
            <!-- Title -->
            <h3 class="font-bold text-gray-900 line-clamp-1 mb-1 group-hover:text-primary transition-colors">
                {{ $product->name }}
            </h3>

            <!-- Category/Description -->
            <p class="text-xs text-gray-500 mb-3">{{ $product->category }}</p>

            <!-- Price -->
            <div class="mb-3">
                <div class="flex items-baseline gap-2">
                    <span class="text-lg font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    @if ($product->original_price)
                        <span class="text-sm text-gray-400 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                    @endif
                </div>
            </div>
        </a>

        <!-- Add to Cart Button -->
        <button class="w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-full transition-colors">
            Tambah Keranjang
        </button>
    </div>
</div>
