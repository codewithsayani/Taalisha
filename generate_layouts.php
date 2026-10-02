<?php

$dir = __DIR__ . '/resources/views/components/layout';
if (!is_dir($dir)) mkdir($dir, 0755, true);

$views = [
    'app.blade.php' => <<<EOT
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Talisha Software | Agentic AI & Enterprise Technology')</title>
    <meta name="description" content="@yield('meta_description', 'Engineering Intelligent Systems for the Next Digital Era.')">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'Talisha Software | Emerging Technology Experts')">
    <meta property="og:description" content="@yield('og_description', 'Driving Business Growth with Agentic AI, Web3, Blockchain & Advanced Software Solutions.')">
    <meta property="og:type" content="website">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { background-color: #0a0a0a; color: #ffffff; }
        .glass-nav { background: rgba(10, 10, 10, 0.7); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.05); }
    </style>
    @stack('styles')
</head>
<body class="antialiased font-sans bg-dark-900 text-white min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false }">
    
    <x-layout.navbar />

    <main class="flex-grow pt-20">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-lg relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    <x-layout.footer />

    @stack('scripts')
</body>
</html>
EOT,
    'navbar.blade.php' => <<<EOT
<nav class="fixed w-full z-50 glass-nav transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tighter">
                    Talisha<span class="text-accent-orange">.</span>
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden lg:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Home</a>
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">About</a>
                <a href="{{ route('services.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Solutions</a>
                <a href="{{ route('industries.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Industries</a>
                <a href="{{ route('technologies.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Technologies</a>
                <a href="{{ route('case-studies.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Case Studies</a>
                <a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Insights</a>
                <a href="{{ route('careers.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Careers</a>
            </div>
            
            <div class="hidden lg:flex items-center gap-4">
                <a href="{{ route('search.index') }}" class="text-gray-400 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </a>
                <a href="{{ route('contact.index') }}" class="bg-accent-orange hover:bg-orange-600 text-white px-5 py-2 rounded-lg font-medium text-sm transition">
                    Contact Us
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-gray-400 hover:text-white focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!mobileMenuOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobileMenuOpen" style="display:none;" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" style="display:none;" class="lg:hidden glass-nav border-t border-gray-800" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Home</a>
            <a href="{{ route('about') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">About</a>
            <a href="{{ route('services.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Solutions</a>
            <a href="{{ route('industries.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Industries</a>
            <a href="{{ route('technologies.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Technologies</a>
            <a href="{{ route('case-studies.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Case Studies</a>
            <a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Insights</a>
            <a href="{{ route('careers.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Careers</a>
            <a href="{{ route('contact.index') }}" class="bg-accent-orange text-white block rounded-md px-3 py-2 text-base font-medium mt-4 text-center">Contact Us</a>
        </div>
    </div>
</nav>
EOT,
    'footer.blade.php' => <<<EOT
<footer class="bg-dark-800 border-t border-gray-800 mt-20 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-2">
                <span class="text-2xl font-bold tracking-tighter">Talisha<span class="text-accent-orange">.</span></span>
                <p class="mt-4 text-gray-400 max-w-sm">Engineering Intelligent Systems for the Next Digital Era. We build AI, enterprise software, and emerging technology solutions.</p>
                <div class="mt-6 flex gap-4">
                    <!-- Social icons placeholder -->
                    <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">LinkedIn</span><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd"/></svg></a>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4 text-white">Company</h3>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-accent-orange transition">About Us</a></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-accent-orange transition">Solutions</a></li>
                    <li><a href="{{ route('industries.index') }}" class="hover:text-accent-orange transition">Industries</a></li>
                    <li><a href="{{ route('careers.index') }}" class="hover:text-accent-orange transition">Careers</a></li>
                    <li><a href="{{ route('contact.index') }}" class="hover:text-accent-orange transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4 text-white">Newsletter</h3>
                <p class="text-gray-400 text-sm mb-4">Subscribe to our newsletter for insights and technical deep dives.</p>
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email" required class="bg-dark-900 border border-gray-700 rounded-lg px-4 py-2 w-full focus:outline-none focus:border-accent-orange text-sm text-white">
                    <button type="submit" class="bg-accent-orange px-4 py-2 rounded-lg font-medium text-white hover:bg-orange-600 transition text-sm">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="mt-16 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm gap-4">
            <div>&copy; {{ date('Y') }} Talisha Software. All rights reserved.</div>
            <div class="flex gap-4">
                <a href="{{ route('privacy') }}" class="hover:text-white transition">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="hover:text-white transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
EOT
];

foreach ($views as $name => $content) {
    file_put_contents($dir . '/' . $name, $content);
}
echo "Layout components generated.\n";
