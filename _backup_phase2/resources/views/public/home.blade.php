@extends('layouts.app')

@section('title', 'Talisha Software | Agentic AI & Enterprise Technology')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-[90vh] flex items-center overflow-hidden">
    <!-- Abstract Background Element -->
    <div class="absolute inset-0 z-0">
        <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-brand-600 rounded-full mix-blend-multiply filter blur-[128px] opacity-20"></div>
        <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-accent-orange rounded-full mix-blend-multiply filter blur-[128px] opacity-20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] [mask-image:linear-gradient(to_bottom,white,transparent)]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="max-w-3xl">
            <div class="inline-block border border-gray-700 rounded-full px-4 py-1.5 text-sm font-medium text-gray-300 mb-6 bg-dark-800/50 backdrop-blur">
                <span class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    Now accepting new enterprise clients for Q4 2026
                </span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold tracking-tight leading-[1.1] mb-6">
                Engineering <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-orange to-brand-500">Intelligent Systems</span> for the Next Digital Era
            </h1>
            
            <p class="text-xl text-gray-400 mb-10 max-w-2xl leading-relaxed">
                We build Agentic AI, enterprise software, automation, cloud, and emerging technology solutions that drive business transformation.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('contact.index') }}" class="bg-accent-red hover:bg-red-600 text-white px-8 py-4 rounded-xl font-medium text-lg transition transform hover:-translate-y-1 text-center">
                    Start a Project
                </a>
                <a href="{{ route('services.index') }}" class="bg-dark-800 hover:bg-dark-700 border border-gray-700 text-white px-8 py-4 rounded-xl font-medium text-lg transition transform hover:-translate-y-1 text-center">
                    Explore Solutions
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services / Capabilities -->
<section class="py-24 bg-dark-900 relative border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-8">
            <div class="max-w-2xl">
                <h2 class="text-accent-orange font-semibold tracking-wider uppercase text-sm mb-3">Core Capabilities</h2>
                <h3 class="text-4xl font-bold">Solutions designed for modern enterprise scale.</h3>
            </div>
            <a href="{{ route('services.index') }}" class="text-gray-400 hover:text-white flex items-center gap-2 group">
                View all solutions 
                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
                <div class="group bg-dark-800 border border-gray-800 hover:border-gray-600 rounded-2xl p-8 transition-all hover:shadow-2xl hover:shadow-brand-900/20">
                    <div class="w-12 h-12 bg-dark-700 rounded-xl mb-6 flex items-center justify-center text-accent-orange">
                        {!! $service->icon ?? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>' !!}
                    </div>
                    <h4 class="text-xl font-bold mb-3">{{ $service->name }}</h4>
                    <p class="text-gray-400 mb-6 leading-relaxed">{{ Str::limit($service->short_description, 100) }}</p>
                    <a href="{{ route('services.show', $service->slug) }}" class="text-sm font-medium text-brand-500 hover:text-brand-400 flex items-center gap-2">
                        Learn more <svg class="w-4 h-4 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            @empty
                <!-- Fallback content if DB is empty -->
                <div class="group bg-dark-800 border border-gray-800 rounded-2xl p-8">
                    <h4 class="text-xl font-bold mb-3">Agentic AI & Machine Learning</h4>
                    <p class="text-gray-400 mb-6">Autonomous AI agents and predictive models to automate complex decision-making processes.</p>
                </div>
                <div class="group bg-dark-800 border border-gray-800 rounded-2xl p-8">
                    <h4 class="text-xl font-bold mb-3">Enterprise Software</h4>
                    <p class="text-gray-400 mb-6">Scalable, secure, and resilient backend architectures built for massive data throughput.</p>
                </div>
                <div class="group bg-dark-800 border border-gray-800 rounded-2xl p-8">
                    <h4 class="text-xl font-bold mb-3">Web3 & Blockchain</h4>
                    <p class="text-gray-400 mb-6">Smart contracts, dApps, and decentralized infrastructure engineering.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-brand-900/20"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to transform your technical infrastructure?</h2>
        <p class="text-xl text-gray-300 mb-10">Partner with our engineering team to architect and deliver your next generation of digital products.</p>
        <a href="{{ route('contact.index') }}" class="bg-accent-orange hover:bg-orange-600 text-white px-8 py-4 rounded-xl font-medium text-lg transition shadow-lg shadow-orange-500/25">
            Talk to Our Team
        </a>
    </div>
</section>

@endsection
