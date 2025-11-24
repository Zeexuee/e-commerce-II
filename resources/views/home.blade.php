@extends('layouts.app')

@section('title', 'Beranda - Toko Beras Berkah')

@section('content_full')
<!-- Hero Banner - Full Viewport Height -->
<div style="position: relative; margin: 0; padding: 0; width: 100vw; height: 90vh; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw; overflow: hidden;">
    <img src="{{ asset('images/banner-home.jpg') }}" alt="Hero Banner Toko Beras Berkah" style="width: 100%; height: 100%; object-fit: cover; display: block;" id="hero-banner">
    
    <!-- Text Overlay -->
    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); padding: 3rem; text-align: center; color: white;">
        <h2 style="font-size: 2rem; font-weight: bold; margin: 0; margin-bottom: 0.5rem;">Beras Berkualitas Terbaik</h2>
        <p style="font-size: 1.1rem; margin: 0; opacity: 0.95;">Langsung dari petani untuk keluarga Anda</p>
    </div>
</div>

@endsection

@section('content')

<!-- Fitur Unggulan -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
    <div class="bg-white rounded-lg shadow-md p-8 text-center border-t-4 border-primary hover:shadow-2xl hover:scale-105 hover:bg-primary/5 transition-all duration-300 cursor-pointer scroll-animate" data-scroll-animate>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Kualitas Terjamin</h3>
        <p class="text-gray-600">Semua produk telah melalui kontrol kualitas ketat dan sertifikasi standar.</p>
    </div>
    <div class="bg-white rounded-lg shadow-md p-8 text-center border-t-4 border-accent hover:shadow-2xl hover:scale-105 hover:bg-accent/5 transition-all duration-300 cursor-pointer scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">
        <h3 class="text-xl font-bold text-gray-800 mb-2">Pengiriman Cepat</h3>
        <p class="text-gray-600">Gratis ongkos kirim ke seluruh daerah yang terjangkau*.</p>
    </div>
    <div class="bg-white rounded-lg shadow-md p-8 text-center border-t-4 border-brown hover:shadow-2xl hover:scale-105 hover:bg-brown/5 transition-all duration-300 cursor-pointer scroll-animate" data-scroll-animate style="animation-delay: 0.2s;">
        <h3 class="text-xl font-bold text-gray-800 mb-2">Harga Terbaik</h3>
        <p class="text-gray-600">Harga kompetitif dengan kualitas premium dan terjangkau untuk semua.</p>
    </div>
</div>

<!-- Produk Unggulan -->
<div class="mb-12">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2 scroll-animate" data-scroll-animate>Produk Unggulan</h2>
        <p class="text-gray-600 scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">Koleksi beras pilihan terbaik kami</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $featured = App\Models\Product::where('is_active', true)->limit(4)->get();
        @endphp
        
        @forelse ($featured as $product)
            <div class="scroll-animate" data-scroll-animate style="animation-delay: {{ (0.2 + $loop->index * 0.1) }}s;">
                @include('partials.product-card')
            </div>
        @empty
            <div class="col-span-4 text-center py-8">
                <p class="text-gray-500">Produk tidak tersedia</p>
            </div>
        @endforelse
    </div>

    <div class="text-center">
        <a href="{{ route('products.index') }}" class="inline-block bg-amber-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-amber-700 transition-colors scroll-animate" data-scroll-animate>
            Lihat Semua Produk →
        </a>
    </div>
</div>

<!-- Partner Restoran Carousel -->
<div class="mb-12">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2 scroll-animate" data-scroll-animate>Restoran Terkemuka Mempercayai Kami</h2>
        <p class="text-gray-600 scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">Dipilih oleh restoran dan hotel ternama di seluruh Indonesia</p>
    </div>

    <!-- Carousel Container -->
    <div class="relative rounded-lg p-12 overflow-hidden">
        <div class="carousel-wrapper overflow-hidden rounded-lg">
            <div class="carousel-track flex gap-12" id="logoCarousel">
                <!-- Logo 1 -->
                <div class="carousel-item flex-shrink-0 w-48 h-48 rounded-lg flex items-center justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 120px; width: auto; object-fit: contain;">
                </div>
                <!-- Logo 2 -->
                <div class="carousel-item flex-shrink-0 w-48 h-48 rounded-lg flex items-center justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 120px; width: auto; object-fit: contain;">
                </div>
                <!-- Logo 3 -->
                <div class="carousel-item flex-shrink-0 w-48 h-48 rounded-lg flex items-center justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 120px; width: auto; object-fit: contain;">
                </div>
                <!-- Logo 4 -->
                <div class="carousel-item flex-shrink-0 w-48 h-48 rounded-lg flex items-center justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 120px; width: auto; object-fit: contain;">
                </div>
                <!-- Logo 5 -->
                <div class="carousel-item flex-shrink-0 w-48 h-48 rounded-lg flex items-center justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 120px; width: auto; object-fit: contain;">
                </div>
                <!-- Logo 6 -->
                <div class="carousel-item flex-shrink-0 w-48 h-48 rounded-lg flex items-center justify-center opacity-70 hover:opacity-100 transition-opacity">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 120px; width: auto; object-fit: contain;">
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <button class="carousel-prev absolute left-0 top-1/2 -translate-y-1/2 -translate-x-6 bg-primary text-white p-3 rounded-full hover:bg-primary/90 transition-colors z-10" onclick="pauseAutoScroll()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button class="carousel-next absolute right-0 top-1/2 -translate-y-1/2 translate-x-6 bg-primary text-white p-3 rounded-full hover:bg-primary/90 transition-colors z-10" onclick="pauseAutoScroll()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>

<script>
    const carousel = document.getElementById('logoCarousel');
    const items = carousel.querySelectorAll('.carousel-item');
    const itemWidth = 192; // w-48 = 192px
    const gap = 48; // gap-12 = 48px
    const itemWithGap = itemWidth + gap; // 240px
    const totalItems = items.length;
    let isAnimating = false;
    let isPaused = false;

    // Clone items for infinite loop
    items.forEach(item => {
        const clone = item.cloneNode(true);
        carousel.appendChild(clone);
    });

    let currentPosition = 0;
    let scrollSpeed = 0.5; // pixels per frame (diperlambat)

    function animate() {
        if (!isPaused) {
            currentPosition -= scrollSpeed;
            carousel.style.transform = `translateX(${currentPosition}px)`;

            // Reset position untuk infinite loop
            if (Math.abs(currentPosition) >= itemWithGap * totalItems) {
                currentPosition = 0;
            }
        }
        requestAnimationFrame(animate);
    }

    function pauseAutoScroll() {
        isPaused = !isPaused;
    }

    // Start animation
    animate();
</script>

<!-- Tentang Kami -->
<div id="tentang" class="bg-white rounded-lg shadow-md p-8 md:p-12 mb-12 scroll-animate" data-scroll-animate>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang Toko Beras Berkah</h2>
            <p class="text-gray-700 mb-4">
                Toko Beras Berkah telah melayani masyarakat Indonesia selama bertahun-tahun dengan komitmen memberikan beras berkualitas terbaik dengan harga terjangkau.
            </p>
            <p class="text-gray-700 mb-4">
                Kami bekerja langsung dengan petani lokal untuk memastikan setiap butir beras yang sampai ke tangan Anda adalah produk terbaik dan segar.
            </p>
            <p class="text-gray-700">
                Kepercayaan pelanggan adalah prioritas utama kami. Kami berkomitmen untuk terus berinovasi dan memberikan layanan terbaik.
            </p>
        </div>
        <div class=" from-amber-100 to-amber-50 rounded-l-lg pl-8 flex items-center justify-center h-64 max-h-80">
            <img src="{{ asset('images/gambar-sementara.jpg') }}" alt="Toko Beras Berkah" style="height: 100%; width: 100%; object-fit: cover; border-radius: 0rem;">
        </div>
    </div>
</div>

    <!-- Belanja di Marketplace -->
    <div class="mb-16 bg-gradient-to-r from-red-50 to-green-50 rounded-lg p-12">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-2 scroll-animate" data-scroll-animate>Belanja Sekarang</h2>
            <p class="text-gray-600 scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">Pilih marketplace favorit Anda untuk berbelanja produk Toko Beras Berkah</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-2xl mx-auto">
            <!-- Shopee Card -->
            <a href="#" class="group bg-white rounded-lg p-8 text-center shadow-md hover:shadow-2xl hover:scale-105 transition-all duration-300 scroll-animate" data-scroll-animate>
                <div class="mb-6 flex justify-center">
                    <img src="{{ asset('images/logo-shopee.png') }}" alt="Shopee" class="h-20 w-auto object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                <p class="text-gray-600 mb-6">Belanja mudah dengan berbagai pilihan pembayaran dan pengiriman cepat</p>
                <div class="bg-red-500 text-white py-3 rounded-lg font-bold group-hover:bg-red-600 transition-colors">
                    Buka Shopee →
                </div>
            </a>

            <!-- Tokopedia Card -->
            <a href="#" class="group bg-white rounded-lg p-8 text-center shadow-md hover:shadow-2xl hover:scale-105 transition-all duration-300 scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">
                <div class="mb-6 flex justify-center">
                    <img src="{{ asset('images/logo-tokopedia.png') }}" alt="Tokopedia" class="h-20 w-auto object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                <p class="text-gray-600 mb-6">Belanja terpercaya dengan perlindungan pembeli dan gratis ongkir</p>
                <div class="bg-green-600 text-white py-3 rounded-lg font-bold group-hover:bg-green-700 transition-colors">
                    Buka Tokopedia →
                </div>
            </a>
        </div>
    </div>

    <!-- Visi & Misi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <!-- Visi -->
        <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-lg shadow-md p-8 scroll-animate" data-scroll-animate>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                Visi Kami
            </h3>
            <p class="text-gray-700 leading-relaxed">
                Menjadi penyedia beras terpercaya dan terdepan di Indonesia dengan menyediakan produk berkualitas premium yang terjangkau untuk setiap keluarga Indonesia, serta mendukung kesejahteraan petani lokal.
            </p>
        </div>

        <!-- Misi -->
        <div class="bg-gradient-to-br from-accent/10 to-accent/5 rounded-lg shadow-md p-8 scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                Misi Kami
            </h3>
            <ul class="text-gray-700 space-y-2">
                <li class="flex items-start gap-2">
                    <span class="text-primary font-bold">•</span>
                    <span>Menyediakan beras berkualitas dengan harga yang kompetitif</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-primary font-bold">•</span>
                    <span>Memberikan layanan terbaik kepada setiap pelanggan</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-primary font-bold">•</span>
                    <span>Mendukung ekonomi lokal melalui kerjasama dengan petani</span>
                </li>
            </ul>
        </div>
    </div><!-- CTA Section -->
<div class="bg-gradient-to-r from-primary to-primary/80 text-black rounded-lg p-12 text-center scroll-animate" data-scroll-animate>
    <h2 class="text-3xl font-bold mb-4">Siap Memulai Perjalanan Belanja Anda?</h2>
    <p class="text-lg text-black mb-8">Dapatkan beras berkualitas terbaik dengan harga yang kompetitif hari ini juga!</p>
    <a href="{{ route('products.index') }}" class="inline-block bg-white text-primary px-8 py-3 rounded-lg font-bold hover:bg-cream transition-colors">
        Belanja Sekarang →
    </a>
</div>
@endsection
