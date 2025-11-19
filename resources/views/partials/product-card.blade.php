<a href="{{ route('products.show', $product) }}" class="group bg-white rounded-lg shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 border-t-4 border-accent cursor-pointer transform hover:-translate-y-2">
    <!-- Product Image -->
    <div class="w-full h-48 bg-gradient-to-br from-cream to-neutral flex items-center justify-center border-b-2 border-neutral relative overflow-hidden">
        @if ($product->image_url)
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
        @else
            <div class="text-center">
                <div class="text-5xl mb-2">🌾</div>
                <p class="text-gray-500 text-sm">Tidak ada gambar</p>
            </div>
        @endif
        
        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <span class="text-white font-bold text-lg">Lihat Detail</span>
        </div>
    </div>

    <!-- Product Info -->
    <div class="p-4">
        <h3 class="font-bold text-gray-800 mb-1 line-clamp-2 group-hover:text-primary transition-colors">{{ $product->name }}</h3>
        <p class="text-sm text-gray-500 mb-2">{{ $product->sku }}</p>
        <p class="text-xs text-primary bg-cream inline-block px-2 py-1 rounded mb-3 font-semibold">{{ $product->category }}</p>

        <div class="mb-0">
            <p class="text-lg font-bold text-primary group-hover:text-primary/80 transition-colors">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-xs text-gray-500">
                @if ($product->stock > 0)
                    <span class="text-accent font-semibold">{{ $product->stock }} tersedia</span>
                @else
                    <span class="text-red-600 font-semibold">Stok Habis</span>
                @endif
            </p>
        </div>
    </div>
</a>
