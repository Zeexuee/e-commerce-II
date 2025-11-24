<!-- Navigation -->
<nav class="@if (trim($__env->yieldContent('content_full'))) bg-white/30 hover:bg-white/70 @else bg-white/95 hover:bg-white @endif backdrop-blur-md hover:shadow-lg z-50 border-b-2 border-transparent hover:border-primary/20 transition-all duration-300 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo Right -->
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 50px; width: auto; object-fit: contain;">
            </div>

            <!-- Center Navigation -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-black hover:text-primary hover:border-b-2 hover:border-primary transition-all duration-100 font-medium pb-1">Beranda</a>
                <a href="{{ route('products.index') }}" class="text-black hover:text-primary hover:border-b-2 hover:border-primary transition-all duration-100 font-medium pb-1">Produk</a>
                <div class="relative" id="kategoriContainer">
                    <button id="kategoriBtn" class="text-black hover:text-primary hover:border-b-2 hover:border-primary transition-all duration-100 font-medium flex items-center gap-1 pb-1">
                        Kategori 
                        <svg id="kategoriChevron" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Right Side: Auth & Cart -->
            <div class="flex items-center space-x-4">
                @if (Auth::check())
                    <div class="relative group">
                        <button class="text-black hover:text-primary font-medium text-sm flex items-center gap-2">
                            👤 {{ Auth::user()->name }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-0 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-black hover:bg-cream rounded-t-lg">
                                Admin Panel
                            </a>
                            <form action="{{ route('logout') }}" method="POST" class="border-t">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-lg">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>

<script>
    // Create submenu portal
    const kategoriBtn = document.getElementById('kategoriBtn');
    const kategoriChevron = document.getElementById('kategoriChevron');
    const kategoriContainer = document.getElementById('kategoriContainer');
    
    // Create menu element as portal (at body level for true z-index control)
    const kategoriMenu = document.createElement('div');
    kategoriMenu.id = 'kategoriMenuPortal';
    kategoriMenu.className = 'bg-white/80 backdrop-blur-sm rounded-lg shadow-xl opacity-0 invisible transition-all duration-300 pointer-events-none';
    kategoriMenu.style.cssText = 'position: fixed; z-index: 9999; width: 192px; pointer-events: auto;';
    
    kategoriMenu.innerHTML = `
        <a href="{{ route('products.category', 'Beras Putih') }}" class="block px-4 py-3 text-black font-medium hover:bg-primary/20 transition-colors rounded-t-lg">Beras Putih</a>
        <a href="{{ route('products.category', 'Beras Merah') }}" class="block px-4 py-3 text-black font-medium hover:bg-primary/20 transition-colors">Beras Merah</a>
        <a href="{{ route('products.category', 'Premium') }}" class="block px-4 py-3 text-black font-medium hover:bg-primary/20 transition-colors">Premium</a>
        <a href="{{ route('products.category', 'Regular') }}" class="block px-4 py-3 text-black font-medium hover:bg-primary/20 transition-colors rounded-b-lg">Regular</a>
    `;
    
    document.body.appendChild(kategoriMenu);

    function positionMenu() {
        const rect = kategoriBtn.getBoundingClientRect();
        const menuWidth = 192;
        
        kategoriMenu.style.top = (rect.bottom + 8) + 'px';
        kategoriMenu.style.left = (rect.left + rect.width / 2 - menuWidth / 2) + 'px';
    }

    kategoriBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        
        const isOpen = kategoriMenu.classList.contains('opacity-100');
        
        if (isOpen) {
            kategoriMenu.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
            kategoriMenu.classList.add('opacity-0', 'invisible', 'pointer-events-none');
            kategoriChevron.style.transform = 'rotate(0deg)';
        } else {
            positionMenu();
            kategoriMenu.classList.add('opacity-100', 'visible', 'pointer-events-auto');
            kategoriMenu.classList.remove('opacity-0', 'invisible', 'pointer-events-none');
            kategoriChevron.style.transform = 'rotate(180deg)';
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!kategoriContainer.contains(e.target) && !kategoriMenu.contains(e.target)) {
            kategoriMenu.classList.remove('opacity-100', 'visible', 'pointer-events-auto');
            kategoriMenu.classList.add('opacity-0', 'invisible', 'pointer-events-none');
            kategoriChevron.style.transform = 'rotate(0deg)';
        }
    });

    // Reposition on scroll/resize
    window.addEventListener('scroll', positionMenu, true);
    window.addEventListener('resize', positionMenu);
</script>
