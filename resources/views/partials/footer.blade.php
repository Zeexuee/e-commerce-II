<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 mt-20 border-t-4 border-primary">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            <!-- Tentang -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Toko Beras Berkah</h3>
                <p class="text-sm text-gray-400 mb-4">
                    Kami menyediakan beras berkualitas terbaik untuk keluarga Indonesia dengan harga terjangkau.
                </p>
            </div>

            <!-- Informasi -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Informasi</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('products.index') }}" class="text-gray-400 hover:text-primary transition-colors">Produk</a></li>
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-primary transition-colors">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Blog</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Karir</a></li>
                </ul>
            </div>

            <!-- Kebijakan -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Kebijakan</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Kebijakan Privasi</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Syarat Layanan</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">Kebijakan Pengembalian</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-primary transition-colors">FAQ</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div>
                <h3 class="text-white font-bold text-lg mb-4">Hubungi Kami</h3>
                <ul class="space-y-3 text-sm">
                    <li class="text-gray-400">(021) 1234-5678</li>
                    <li class="text-gray-400">info@tokoberasberkah.com</li>
                    <li class="text-gray-400">Jl. Merdeka No. 123, Jakarta 12345</li>
                    <li class="text-gray-400">Senin - Jumat: 09:00 - 18:00</li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-sm text-gray-400 mb-4 md:mb-0">
                    &copy; 2024 Toko Beras Berkah. Semua hak dilindungi.
                </div>
                <div class="flex space-x-6 text-sm text-gray-400">
                    <a href="#" class="hover:text-primary transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-primary transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-primary transition-colors">Contact</a>
                </div>
            </div>
        </div>
    </div>
</footer>

