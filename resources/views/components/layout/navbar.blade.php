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
                <a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">All Articles</a>
                <a href="{{ route('services.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Solutions</a>
                <a href="{{ route('careers.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Career</a>
                <a href="{{ route('contact.index') }}" class="text-gray-300 hover:text-white transition text-sm font-medium">Contact</a>
            </div>
            
            <div class="hidden lg:flex items-center gap-4">

                <a href="#stay-informed" class="text-gray-400 hover:text-white text-sm font-medium transition">
                    Stay informed
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
            <a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">All Articles</a>
            <a href="{{ route('services.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Solutions</a>
            <a href="{{ route('careers.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Career</a>
            <a href="{{ route('contact.index') }}" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Contact</a>
            <a href="#stay-informed" class="text-gray-300 hover:text-white block rounded-md px-3 py-2 text-base font-medium border-t border-gray-800 mt-2 pt-2" @click="mobileMenuOpen = false">Stay informed</a>

        </div>
    </div>


</nav>