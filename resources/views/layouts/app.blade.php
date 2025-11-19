<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Agen Beras')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Check if no_header section is set -->
    @if (!trim($__env->yieldContent('no_header')))
        <!-- Check if there's a full-width section (hero banner) -->
        @if (trim($__env->yieldContent('content_full')))
            <!-- Full Width Content (Hero Banner) - First Item -->
            @yield('content_full')

            <!-- Header Overlay (Only on hero pages) -->
            <div style="position: fixed; top: 0; left: 0; right: 0; z-index: 50; width: 100%; opacity: 1; transform: none;">
                @include('partials.header')
            </div>
        @else
            <!-- Header Normal (First item on non-hero pages) -->
            @include('partials.header')
        @endif
    @endif

    <!-- Flash Messages -->
    @include('partials.flash-messages')

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        // Intersection Observer untuk scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    
                    // Tambah class untuk trigger animasi
                    element.classList.add('animate-in');
                    
                    // Unobserve setelah animasi
                    observer.unobserve(element);
                }
            });
        }, observerOptions);

        // Observe all scroll-animate elements
        document.querySelectorAll('[data-scroll-animate]').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>
