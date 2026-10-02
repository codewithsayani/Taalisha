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
        
        /* Intro logic */
        html.skip-intro #talisha-intro { display: none !important; }
        html.intro-locked body { overflow: hidden; height: 100vh; }
    </style>
    @stack('styles')
    
    <script>
        // Check session storage before render to prevent black flash
        if (sessionStorage.getItem('talisha_intro_v5_played')) {
            document.documentElement.classList.add('skip-intro');
        } else {
            document.documentElement.classList.add('intro-locked');
        }
    </script>
</head>
<body class="antialiased font-sans bg-dark-900 text-white min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false }">
    
    @if(!request()->is('admin*'))
        <x-site-intro />
    @endif

    <x-layout.navbar />

    <main class="flex-grow pt-20">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-4 py-3 rounded-lg relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        {{ $slot }}
    </main>

    <x-layout.footer />

    @stack('scripts')
</body>
</html>