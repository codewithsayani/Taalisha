<x-layout.app>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">{{ $article->title }}</h1>
        <div class="text-gray-500 mb-8">{{ $article->published_at?->format('F d, Y') }}</div>
        <div class="prose prose-invert max-w-none">
            {!! $article->content !!}
        </div>
    </div>
</x-layout.app>