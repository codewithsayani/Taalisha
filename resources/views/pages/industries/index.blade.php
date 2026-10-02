<x-layout.app>
    @section('title', 'Industries | Talisha Software')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Industries We Serve</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            @forelse($industries as $industry)
                <a href="{{ route('industries.show', $industry->slug) }}" class="block bg-dark-800 p-8 rounded-2xl border border-gray-800 hover:border-gray-600 transition">
                    <h3 class="text-xl font-bold mb-2">{{ $industry->name }}</h3>
                    <p class="text-gray-400 text-sm">{{ Str::limit($industry->overview, 80) }}</p>
                </a>
            @empty
                <p class="text-gray-500">No industries added yet.</p>
            @endforelse
        </div>
    </div>
</x-layout.app>