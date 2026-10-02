<?php

$dir = __DIR__ . '/resources/views/pages';
if (!is_dir($dir)) mkdir($dir, 0755, true);

$views = [
    'home.blade.php' => <<<EOT
<x-layout.app>
    <!-- Hero Section -->
    <section class="relative min-h-[90vh] flex items-center overflow-hidden pt-20">
        <div class="absolute inset-0 z-0 bg-dark-900">
            <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-brand-600 rounded-full mix-blend-multiply filter blur-[128px] opacity-20 animate-blob"></div>
            <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-accent-orange rounded-full mix-blend-multiply filter blur-[128px] opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] [mask-image:linear-gradient(to_bottom,white,transparent)]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="max-w-3xl gsap-hero-content">
                <div class="inline-flex items-center gap-2 border border-gray-700/50 rounded-full px-4 py-1.5 text-sm font-medium text-gray-300 mb-6 bg-dark-800/50 backdrop-blur-sm">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    Redefining Business Through Artificial Intelligence
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold tracking-tight leading-[1.1] mb-6">
                    Engineering <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-orange to-brand-500">Intelligent Systems</span> for the Next Digital Era
                </h1>
                
                <p class="text-xl text-gray-400 mb-10 max-w-2xl leading-relaxed">
                    Revolutionizing Digital Experiences, Ownership & Innovation. We build Agentic AI, enterprise software, automation, cloud, and emerging technology solutions that drive transformation.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('services.index') }}" class="bg-accent-orange hover:bg-orange-600 text-white px-8 py-4 rounded-xl font-medium text-lg transition transform hover:-translate-y-1 text-center shadow-lg shadow-orange-500/25">
                        Explore Solutions
                    </a>
                    <a href="{{ route('contact.index') }}" class="bg-dark-800 hover:bg-dark-700 border border-gray-700 text-white px-8 py-4 rounded-xl font-medium text-lg transition transform hover:-translate-y-1 text-center">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions / Services -->
    <section class="py-24 bg-dark-900 relative border-t border-gray-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-8 gsap-section-header">
                <div class="max-w-2xl">
                    <h2 class="text-accent-orange font-semibold tracking-wider uppercase text-sm mb-3">Core Solutions</h2>
                    <h3 class="text-4xl font-bold">Solutions designed for modern enterprise scale.</h3>
                </div>
                <a href="{{ route('services.index') }}" class="text-gray-400 hover:text-white flex items-center gap-2 group">
                    View all solutions 
                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse(\$services as \$service)
                    <div class="gsap-card group bg-dark-800/50 border border-gray-800 hover:border-gray-600 rounded-2xl p-8 transition-all hover:bg-dark-800">
                        <div class="w-12 h-12 bg-dark-700/50 rounded-xl mb-6 flex items-center justify-center text-accent-orange group-hover:scale-110 transition-transform">
                            {!! \$service->icon ?? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>' !!}
                        </div>
                        <h4 class="text-xl font-bold mb-3">{{ \$service->name }}</h4>
                        <p class="text-gray-400 mb-6 leading-relaxed">{{ Str::limit(\$service->short_description, 100) }}</p>
                        <a href="{{ route('services.show', \$service->slug) }}" class="text-sm font-medium text-brand-500 hover:text-brand-400 flex items-center gap-2">
                            Learn more <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500 py-12 border border-dashed border-gray-700 rounded-2xl">
                        No solutions available yet.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Industries -->
    <section class="py-24 bg-dark-950 relative border-t border-gray-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 gsap-section-header">
                <h2 class="text-accent-orange font-semibold tracking-wider uppercase text-sm mb-3">Industries</h2>
                <h3 class="text-4xl font-bold">Transforming domains with precision.</h3>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach(\$industries as \$industry)
                <a href="{{ route('industries.show', \$industry->slug) }}" class="gsap-industry-card group block relative overflow-hidden rounded-2xl aspect-video bg-dark-800">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/40 to-transparent z-10 group-hover:from-brand-900/90 transition-colors duration-500"></div>
                    @if(\$industry->hero_image)
                        <img src="{{ Storage::disk('public')->url(\$industry->hero_image) }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition duration-700" alt="{{ \$industry->name }}">
                    @else
                        <div class="absolute inset-0 bg-dark-700"></div>
                    @endif
                    <div class="absolute bottom-0 left-0 p-6 z-20 w-full">
                        <h4 class="text-xl font-bold text-white mb-1">{{ \$industry->name }}</h4>
                        <p class="text-sm text-gray-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">View Industry Solutions &rarr;</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-brand-900/10"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10 gsap-fade-up">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to transform your technical infrastructure?</h2>
            <p class="text-xl text-gray-400 mb-10">Partner with our engineering team to architect and deliver your next generation of digital products.</p>
            <a href="{{ route('contact.index') }}" class="inline-block bg-accent-orange hover:bg-orange-600 text-white px-8 py-4 rounded-xl font-medium text-lg transition shadow-lg shadow-orange-500/25">
                Talk to Our Team
            </a>
        </div>
    </section>
</x-layout.app>
EOT,
    'about.blade.php' => <<<EOT
<x-layout.app>
    @section('title', 'About Us | Talisha Software')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">About Talisha Software</h1>
        <div class="prose prose-invert max-w-3xl text-gray-300">
            <p class="text-xl leading-relaxed">We are a premier technology company specializing in Agentic AI, enterprise software, Web3, and blockchain solutions.</p>
            <p>Our mission is to redefine business through Artificial Intelligence, engineering intelligent systems that scale natively and operate autonomously.</p>
        </div>
    </div>
</x-layout.app>
EOT,
    'contact.blade.php' => <<<EOT
<x-layout.app>
    @section('title', 'Contact Us | Talisha Software')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                <h1 class="text-4xl font-bold mb-6">Let's build the future together.</h1>
                <p class="text-gray-400 text-lg mb-8">Reach out to our engineering and consulting team to discuss your enterprise requirements.</p>
                <div class="space-y-6 text-gray-300">
                    <div>
                        <h4 class="font-medium text-white mb-1">Email</h4>
                        <p>hello@talishasoftware.tech</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-dark-800/50 border border-gray-800 rounded-2xl p-8">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-accent-orange text-white">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ \$message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-accent-orange text-white">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ \$message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Message *</label>
                        <textarea name="message" rows="4" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-accent-orange text-white">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-500 text-xs mt-1">{{ \$message }}</p>@enderror
                    </div>
                    <div class="flex items-start gap-3">
                        <input type="checkbox" name="privacy_consent" id="privacy" required class="mt-1 bg-dark-900 border-gray-700 rounded text-accent-orange focus:ring-accent-orange">
                        <label for="privacy" class="text-sm text-gray-400">I consent to having Talisha Software collect my details for communication purposes.*</label>
                    </div>
                    @error('privacy_consent')<p class="text-red-500 text-xs mt-1">{{ \$message }}</p>@enderror
                    
                    <button type="submit" class="w-full bg-accent-orange hover:bg-orange-600 text-white font-medium py-4 rounded-xl transition">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
EOT,
    'privacy.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-24 prose prose-invert">
        <h1>Privacy Policy</h1>
        <p>Effective Date: {{ date('Y') }}</p>
        <p>We respect your privacy and are committed to protecting it through our compliance with this policy.</p>
    </div>
</x-layout.app>
EOT,
    'terms.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-24 prose prose-invert">
        <h1>Terms of Service</h1>
        <p>Please read these terms and conditions carefully before using Our Service.</p>
    </div>
</x-layout.app>
EOT,
    'search.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-8">Search Results for "{{ \$q }}"</h1>
        @if(strlen(\$q) < 3)
            <p class="text-gray-400">Please enter at least 3 characters to search.</p>
        @else
            @if(isset(\$services) && \$services->count() > 0)
                <h2 class="text-2xl font-bold mb-4 mt-8">Solutions</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach(\$services as \$service)
                        <a href="{{ route('services.show', \$service->slug) }}" class="block bg-dark-800 p-6 rounded-xl hover:bg-dark-700 transition">
                            <h3 class="font-bold mb-2">{{ \$service->name }}</h3>
                            <p class="text-sm text-gray-400">{{ Str::limit(\$service->short_description, 60) }}</p>
                        </a>
                    @endforeach
                </div>
            @endif
            
            @if(isset(\$articles) && \$articles->count() > 0)
                <h2 class="text-2xl font-bold mb-4 mt-8">Insights</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach(\$articles as \$article)
                        <a href="{{ route('articles.show', \$article->slug) }}" class="block bg-dark-800 p-6 rounded-xl hover:bg-dark-700 transition">
                            <h3 class="font-bold mb-2">{{ \$article->title }}</h3>
                        </a>
                    @endforeach
                </div>
            @endif
            
            @if(count(\$services) === 0 && count(\$articles) === 0)
                <div class="bg-dark-800 rounded-xl p-12 text-center text-gray-400">
                    No results found for your query. Try a different term.
                </div>
            @endif
        @endif
    </div>
</x-layout.app>
EOT
];

foreach ($views as $name => $content) {
    file_put_contents($dir . '/' . $name, $content);
}
echo "Pages batch 1 generated.\n";
