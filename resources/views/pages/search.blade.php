<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="mb-12">
            <h1 class="text-4xl font-bold mb-6">{{ $q ? 'Search Results for "' . $q . '"' : 'Search' }}</h1>
            <form action="{{ route('search.index') }}" method="GET" class="relative max-w-2xl">
                <input type="text" name="q" value="{{ $q }}" placeholder="Search Talisha Software..." class="w-full bg-dark-800 border border-gray-700 text-white rounded-lg pl-4 pr-12 py-3 focus:outline-none focus:border-accent-orange">
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-accent-orange">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </form>
        </div>

        @if(empty($q))
            <p class="text-gray-400">Enter a search term above to find solutions and insights.</p>
        @elseif(strlen($q) < 3)
            <p class="text-gray-400">Please enter at least 3 characters to search.</p>
        @else
            @if(isset($services) && $services->count() > 0)
                <h2 class="text-2xl font-bold mb-4 mt-8">Solutions</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($services as $service)
                        <a href="{{ route('services.show', $service->slug) }}" class="block bg-dark-800 p-6 rounded-xl hover:bg-dark-700 transition">
                            <h3 class="font-bold mb-2">{{ $service->name }}</h3>
                            <p class="text-sm text-gray-400">{{ Str::limit($service->short_description, 60) }}</p>
                        </a>
                    @endforeach
                </div>
            @endif
            
            @if(isset($articles) && $articles->count() > 0)
                <h2 class="text-2xl font-bold mb-4 mt-8">Insights</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($articles as $article)
                        <a href="{{ route('articles.show', $article->slug) }}" class="block bg-dark-800 p-6 rounded-xl hover:bg-dark-700 transition">
                            <h3 class="font-bold mb-2">{{ $article->title }}</h3>
                        </a>
                    @endforeach
                </div>
            @endif
            
            @if(count($services) === 0 && count($articles) === 0)
                <div class="bg-dark-800 rounded-xl p-12 text-center text-gray-400">
                    No results found for your query. Try a different term.
                </div>
            @endif
        @endif
    </div>
</x-layout.app>