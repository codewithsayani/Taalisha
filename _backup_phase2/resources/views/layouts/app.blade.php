<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Talisha Software | Agentic AI Solutions & Software Development Company')</title>
    <meta name="description" content="@yield('meta_description', 'Leading Web3, Blockchain & Software Development Company serving Kolkata, Durgapur, Gujarat and Bangalore.')">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'Talisha Software | Emerging Technology Experts')">
    <meta property="og:description" content="@yield('og_description', 'Driving Business Growth with Agentic AI, Web3, Blockchain & Advanced Software Solutions.')">
    <meta property="og:type" content="website">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS (Tailwind placeholder for manual setup) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            900: '#0c4a6e',
                        },
                        accent: {
                            orange: '#ff7a1a',
                            red: '#ff3b30'
                        },
                        dark: {
                            900: '#0a0a0a',
                            800: '#171717',
                            700: '#262626',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Custom Styles -->
    <style>
        body { background-color: #0a0a0a; color: #ffffff; }
        .glass-nav { background: rgba(10, 10, 10, 0.7); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.05); }
    </style>
    @stack('styles')
</head>
<body class="antialiased font-sans bg-dark-900 text-white min-h-screen flex flex-col">
    
    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass-nav transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tighter">
                        Talisha<span class="text-accent-orange">.</span>
                    </a>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition">About</a>
                    <a href="{{ route('services.index') }}" class="text-gray-300 hover:text-white transition">Solutions</a>
                    <a href="{{ route('industries.index') }}" class="text-gray-300 hover:text-white transition">Industries</a>
                    <a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-white transition">Insights</a>
                    <a href="{{ route('contact.index') }}" class="text-gray-300 hover:text-white transition">Contact</a>
                </div>
                <div class="hidden md:flex">
                    <a href="{{ route('contact.index') }}" class="bg-accent-red hover:bg-red-600 text-white px-6 py-2.5 rounded-full font-medium transition transform hover:-translate-y-0.5">
                        Start a Project
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark-800 border-t border-gray-800 mt-20 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-2">
                    <span class="text-2xl font-bold tracking-tighter">Talisha<span class="text-accent-orange">.</span></span>
                    <p class="mt-4 text-gray-400 max-w-sm">Engineering Intelligent Systems for the Next Digital Era. We build AI, enterprise software, and emerging technology solutions.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex gap-2">
                        @csrf
                        <input type="email" name="email" placeholder="Enter your email" required class="bg-dark-700 border border-gray-700 rounded-lg px-4 py-2 w-full focus:outline-none focus:border-accent-orange">
                        <button type="submit" class="bg-accent-orange px-4 py-2 rounded-lg font-medium hover:bg-orange-600 transition">Join</button>
                    </form>
                </div>
            </div>
            <div class="mt-16 pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} Talisha Software. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Alpine.js for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</body>
</html>
