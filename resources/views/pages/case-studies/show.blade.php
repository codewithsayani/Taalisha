<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">{{ $caseStudy->title }}</h1>
        <div class="prose prose-invert max-w-none">
            <h3>Challenge</h3>
            <p>{{ $caseStudy->challenge }}</p>
            <h3>Solution</h3>
            <p>{{ $caseStudy->solution }}</p>
            <h3>Results</h3>
            <p>{{ $caseStudy->results }}</p>
        </div>
    </div>
</x-layout.app>