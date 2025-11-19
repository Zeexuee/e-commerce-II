<!-- Admin Navigation -->
<nav class="bg-primary text-black shadow-lg z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo & Brand -->
            <div class="flex items-center space-x-3 min-w-fit">
                <div>
                    <h1 class="font-bold text-lg text-black">Admin Panel</h1>
                    <p class="text-xs text-black/80">Toko Beras Berkah</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="flex items-center space-x-1 flex-1 justify-center">
                <a href="{{ route('admin.dashboard') }}" 
                   class="text-black hover:bg-primary/80 px-4 py-2 rounded-lg transition-all font-medium text-sm
                   {{ request()->routeIs('admin.dashboard') ? 'bg-primary/80 border-b-2 border-black' : '' }}">
                    Dashboard
                </a>
                
                <a href="{{ route('admin.products.index') }}" 
                   class="text-black hover:bg-primary/80 px-4 py-2 rounded-lg transition-all font-medium text-sm
                   {{ request()->routeIs('admin.products*') ? 'bg-primary/80 border-b-2 border-black' : '' }}">
                    Produk
                </a>
                
                <a href="#" title="Fitur akan datang"
                   class="text-black hover:bg-primary/80 px-4 py-2 rounded-lg transition-all font-medium text-sm opacity-60 cursor-not-allowed">
                    Pesanan
                </a>
                
                <a href="#" title="Fitur akan datang"
                   class="text-black hover:bg-primary/80 px-4 py-2 rounded-lg transition-all font-medium text-sm opacity-60 cursor-not-allowed">
                    Pelanggan
                </a>
                
                <a href="#" title="Fitur akan datang"
                   class="text-black hover:bg-primary/80 px-4 py-2 rounded-lg transition-all font-medium text-sm opacity-60 cursor-not-allowed">
                    Laporan
                </a>
                
                <a href="#" title="Fitur akan datang"
                   class="text-black hover:bg-primary/80 px-4 py-2 rounded-lg transition-all font-medium text-sm opacity-60 cursor-not-allowed">
                    Pengaturan
                </a>
            </div>

            <!-- User Profile & Logout -->
            <div class="flex items-center space-x-4 min-w-fit">
                <!-- Info Badge -->
                <div class="flex items-center gap-2 px-3 py-1.5 bg-primary/80 rounded-lg">
                    <span class="text-xs text-black/90">Online</span>
                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                </div>

                <!-- User Dropdown -->
                <div class="relative group">
                    <button class="text-black hover:bg-primary/80 font-medium text-sm flex items-center gap-2 px-3 py-2 rounded-lg transition-colors">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-1 w-56 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden">
                        <!-- User Info Section -->
                        <div class="px-4 py-3 bg-gradient-to-r from-primary/10 to-accent/10 border-b border-gray-200">
                            <p class="text-sm text-gray-900 font-bold">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-600">{{ Auth::user()->email }}</p>
                        </div>

                        <!-- Menu Items -->
                        <div class="py-2">
                            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-cream/50 transition-colors">
                                Kembali ke Toko
                            </a>
                            
                            <button type="button" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-cream/50 transition-colors opacity-60 cursor-not-allowed" title="Fitur akan datang">
                                Ubah Password
                            </button>
                            
                            <button type="button" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-cream/50 transition-colors opacity-60 cursor-not-allowed" title="Fitur akan datang">
                                Pengaturan Akun
                            </button>
                        </div>

                        <!-- Logout -->
                        <form action="{{ route('logout') }}" method="POST" class="border-t">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors font-semibold">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
