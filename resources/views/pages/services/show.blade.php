<x-layout.app>
    @section('title', $service->name . ' | Solutions | Talisha Software')
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <a href="{{ route('services.index') }}" class="text-gray-400 hover:text-white flex items-center gap-2 mb-8 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"></path></svg> Back to Solutions</a>
        <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $service->name }}</h1>
        <p class="text-xl text-brand-400 mb-12">{{ $service->short_description }}</p>
        
        <div class="prose prose-invert max-w-none text-gray-300">
            {!! $service->full_description !!}
        </div>
    </div>
</x-layout.app>