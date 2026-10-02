<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-12">Insights</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($articles as $article)
                <a href="{{ route('articles.show', $article->slug) }}" class="block bg-dark-800 p-6 rounded-xl border border-gray-800 hover:border-gray-600 transition">
                    <h3 class="text-xl font-bold mb-3">{{ $article->title }}</h3>
                    <p class="text-gray-400 text-sm mb-4">{{ Str::limit($article->excerpt, 80) }}</p>
                    <div class="text-xs text-brand-500">{{ $article->published_at?->format('M d, Y') }}</div>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-12 border border-dashed border-gray-700 rounded-2xl">
                    No articles published yet.
                </div>
            @endforelse
        </div>
        <div class="mt-8">{{ $articles->links() }}</div>
    </div>
</x-layout.app>