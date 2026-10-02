<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-12">Case Studies</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($caseStudies as $cs)
                <a href="{{ route('case-studies.show', $cs->slug) }}" class="block bg-dark-800 rounded-2xl overflow-hidden border border-gray-800 hover:border-gray-600 transition">
                    <div class="p-8">
                        <div class="text-accent-orange text-sm font-semibold mb-2">{{ $cs->client }}</div>
                        <h3 class="text-2xl font-bold mb-4">{{ $cs->title }}</h3>
                        <p class="text-gray-400">{{ Str::limit($cs->description, 120) }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-2 text-center text-gray-500 py-12 border border-dashed border-gray-700 rounded-2xl">
                    More case studies coming soon.
                </div>
            @endforelse
        </div>
        <div class="mt-8">{{ $caseStudies->links() }}</div>
    </div>
</x-layout.app>