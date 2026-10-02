<x-layout.app>
    @section('title', 'Solutions | Talisha Software')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Enterprise Solutions</h1>
        <p class="text-xl text-gray-400 mb-12 max-w-2xl">Discover how our specialized engineering services can transform your technical infrastructure.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="group bg-dark-800 border border-gray-800 hover:border-gray-600 rounded-2xl p-8 transition-all hover:bg-dark-800 block">
                    <div class="w-12 h-12 bg-dark-700/50 rounded-xl mb-6 flex items-center justify-center text-accent-orange">
                        {!! $service->icon ?? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>' !!}
                    </div>
                    <h4 class="text-xl font-bold mb-3">{{ $service->name }}</h4>
                    <p class="text-gray-400 mb-4">{{ Str::limit($service->short_description, 100) }}</p>
                    <span class="text-sm font-medium text-brand-500 flex items-center gap-2 group-hover:text-brand-400">
                        View Details <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
                    </span>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-12 border border-dashed border-gray-700 rounded-2xl">
                    No solutions available at the moment.
                </div>
            @endforelse
        </div>
    </div>
</x-layout.app>