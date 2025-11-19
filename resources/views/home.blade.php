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
        <div class="bg-gradient-to-br from-amber-100 to-amber-50 rounded-lg p-8 flex items-center justify-center h-64">
            <div class="text-6xl">🌾</div>
        </div>
    </div>
</div>

<!-- Testimoni -->
<div class="mb-12">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2 scroll-animate" data-scroll-animate>Kepuasan Pelanggan</h2>
        <p class="text-gray-600 scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">Apa kata pelanggan kami</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate style="animation-delay: 0.2s;">
            <div class="flex items-center mb-3">
                <span class="text-yellow-400">★★★★★</span>
            </div>
            <p class="text-gray-700 mb-4">"Beras yang saya beli sangat berkualitas dan harganya terjangkau. Pelayanan juga sangat baik!"</p>
            <p class="font-semibold text-gray-800">- Ibu Siti</p>
            <p class="text-sm text-gray-500">Jakarta</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate style="animation-delay: 0.3s;">
            <div class="flex items-center mb-3">
                <span class="text-yellow-400">★★★★★</span>
            </div>
            <p class="text-gray-700 mb-4">"Pengiriman cepat dan produk sampai dengan aman. Pasti pesan lagi di sini!"</p>
            <p class="font-semibold text-gray-800">- Pak Budi</p>
            <p class="text-sm text-gray-500">Surabaya</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate style="animation-delay: 0.4s;">
            <div class="flex items-center mb-3">
                <span class="text-yellow-400">★★★★★</span>
            </div>
            <p class="text-gray-700 mb-4">"Beras premium dengan harga yang sangat kompetitif. Recommend untuk semua orang!"</p>
            <p class="font-semibold text-gray-800">- Mba Rina</p>
            <p class="text-sm text-gray-500">Bandung</p>
        </div>
    </div>
</div>

<!-- FAQ -->
<div class="mb-12">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2 scroll-animate" data-scroll-animate>Pertanyaan Umum</h2>
        <p class="text-gray-600 scroll-animate" data-scroll-animate style="animation-delay: 0.1s;">Jawaban untuk pertanyaan Anda</p>
    </div>

    <div class="max-w-2xl mx-auto space-y-4">
        <div class="bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate style="animation-delay: 0.2s;">
            <h3 class="font-bold text-gray-800 mb-2">Berapa lama waktu pengiriman?</h3>
            <p class="text-gray-700">Pengiriman kami membutuhkan waktu 1-3 hari kerja tergantung lokasi Anda. Ongkos kirim gratis untuk pembelian apapun.</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate style="animation-delay: 0.3s;">
            <h3 class="font-bold text-gray-800 mb-2">Apakah ada jaminan kualitas?</h3>
            <p class="text-gray-700">Ya, semua produk kami memiliki garansi kualitas. Jika ada masalah, hubungi kami dan kami akan menggantinya tanpa biaya tambahan.</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate style="animation-delay: 0.4s;">
            <h3 class="font-bold text-gray-800 mb-2">Apa saja metode pembayaran yang tersedia?</h3>
            <p class="text-gray-700">Kami menerima transfer bank, e-wallet (GCash, PayMaya, OVO, Dana), dan COD (Bayar di Tempat).</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 scroll-animate" data-scroll-animate style="animation-delay: 0.5s;">
            <h3 class="font-bold text-gray-800 mb-2">Bagaimana cara menghubungi customer service?</h3>
            <p class="text-gray-700">Anda bisa menghubungi kami melalui telepon (021) 1234-5678 atau email info@tokoberasberkah.com. Tim kami siap membantu 24/7.</p>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-primary to-primary/80 text-black rounded-lg p-12 text-center scroll-animate" data-scroll-animate>
    <h2 class="text-3xl font-bold mb-4">Siap Memulai Perjalanan Belanja Anda?</h2>
    <p class="text-lg text-black mb-8">Dapatkan beras berkualitas terbaik dengan harga yang kompetitif hari ini juga!</p>
    <a href="{{ route('products.index') }}" class="inline-block bg-white text-primary px-8 py-3 rounded-lg font-bold hover:bg-cream transition-colors">
        Belanja Sekarang →
    </a>
</div>
@endsection
