<?php

$dir = __DIR__ . '/resources/views/pages';
$subdirs = ['services', 'industries', 'technologies', 'case-studies', 'articles', 'careers'];
foreach ($subdirs as $sd) {
    if (!is_dir($dir . '/' . $sd)) mkdir($dir . '/' . $sd, 0755, true);
}

$views = [
    'services/index.blade.php' => <<<EOT
<x-layout.app>
    @section('title', 'Solutions | Talisha Software')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Enterprise Solutions</h1>
        <p class="text-xl text-gray-400 mb-12 max-w-2xl">Discover how our specialized engineering services can transform your technical infrastructure.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse(\$services as \$service)
                <a href="{{ route('services.show', \$service->slug) }}" class="group bg-dark-800 border border-gray-800 hover:border-gray-600 rounded-2xl p-8 transition-all hover:bg-dark-800 block">
                    <div class="w-12 h-12 bg-dark-700/50 rounded-xl mb-6 flex items-center justify-center text-accent-orange">
                        {!! \$service->icon ?? '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>' !!}
                    </div>
                    <h4 class="text-xl font-bold mb-3">{{ \$service->name }}</h4>
                    <p class="text-gray-400 mb-4">{{ Str::limit(\$service->short_description, 100) }}</p>
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
EOT,
    'services/show.blade.php' => <<<EOT
<x-layout.app>
    @section('title', \$service->name . ' | Solutions | Talisha Software')
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <a href="{{ route('services.index') }}" class="text-gray-400 hover:text-white flex items-center gap-2 mb-8 text-sm"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"></path></svg> Back to Solutions</a>
        <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ \$service->name }}</h1>
        <p class="text-xl text-brand-400 mb-12">{{ \$service->short_description }}</p>
        
        <div class="prose prose-invert max-w-none text-gray-300">
            {!! \$service->full_description !!}
        </div>
    </div>
</x-layout.app>
EOT,
    'industries/index.blade.php' => <<<EOT
<x-layout.app>
    @section('title', 'Industries | Talisha Software')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Industries We Serve</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            @forelse(\$industries as \$industry)
                <a href="{{ route('industries.show', \$industry->slug) }}" class="block bg-dark-800 p-8 rounded-2xl border border-gray-800 hover:border-gray-600 transition">
                    <h3 class="text-xl font-bold mb-2">{{ \$industry->name }}</h3>
                    <p class="text-gray-400 text-sm">{{ Str::limit(\$industry->overview, 80) }}</p>
                </a>
            @empty
                <p class="text-gray-500">No industries added yet.</p>
            @endforelse
        </div>
    </div>
</x-layout.app>
EOT,
    'industries/show.blade.php' => <<<EOT
<x-layout.app>
    @section('title', \$industry->name . ' | Talisha Software')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">{{ \$industry->name }}</h1>
        <div class="prose prose-invert">
            {{ \$industry->overview }}
        </div>
    </div>
</x-layout.app>
EOT,
    'technologies/index.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-12">Technologies</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse(\$technologies as \$tech)
                <div class="bg-dark-800 p-6 rounded-xl border border-gray-800 text-center">
                    <div class="font-bold mb-1">{{ \$tech->name }}</div>
                    <div class="text-xs text-gray-500 uppercase tracking-wider">{{ \$tech->category }}</div>
                </div>
            @empty
                <p class="text-gray-500 col-span-4">No technologies available.</p>
            @endforelse
        </div>
    </div>
</x-layout.app>
EOT,
    'technologies/show.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">{{ \$technology->name }}</h1>
        <div class="prose prose-invert">{{ \$technology->description }}</div>
    </div>
</x-layout.app>
EOT,
    'case-studies/index.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-12">Case Studies</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse(\$caseStudies as \$cs)
                <a href="{{ route('case-studies.show', \$cs->slug) }}" class="block bg-dark-800 rounded-2xl overflow-hidden border border-gray-800 hover:border-gray-600 transition">
                    <div class="p-8">
                        <div class="text-accent-orange text-sm font-semibold mb-2">{{ \$cs->client }}</div>
                        <h3 class="text-2xl font-bold mb-4">{{ \$cs->title }}</h3>
                        <p class="text-gray-400">{{ Str::limit(\$cs->description, 120) }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-2 text-center text-gray-500 py-12 border border-dashed border-gray-700 rounded-2xl">
                    More case studies coming soon.
                </div>
            @endforelse
        </div>
        <div class="mt-8">{{ \$caseStudies->links() }}</div>
    </div>
</x-layout.app>
EOT,
    'case-studies/show.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">{{ \$caseStudy->title }}</h1>
        <div class="prose prose-invert max-w-none">
            <h3>Challenge</h3>
            <p>{{ \$caseStudy->challenge }}</p>
            <h3>Solution</h3>
            <p>{{ \$caseStudy->solution }}</p>
            <h3>Results</h3>
            <p>{{ \$caseStudy->results }}</p>
        </div>
    </div>
</x-layout.app>
EOT,
    'articles/index.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-12">Insights</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse(\$articles as \$article)
                <a href="{{ route('articles.show', \$article->slug) }}" class="block bg-dark-800 p-6 rounded-xl border border-gray-800 hover:border-gray-600 transition">
                    <h3 class="text-xl font-bold mb-3">{{ \$article->title }}</h3>
                    <p class="text-gray-400 text-sm mb-4">{{ Str::limit(\$article->excerpt, 80) }}</p>
                    <div class="text-xs text-brand-500">{{ \$article->published_at?->format('M d, Y') }}</div>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-500 py-12 border border-dashed border-gray-700 rounded-2xl">
                    No articles published yet.
                </div>
            @endforelse
        </div>
        <div class="mt-8">{{ \$articles->links() }}</div>
    </div>
</x-layout.app>
EOT,
    'articles/show.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">{{ \$article->title }}</h1>
        <div class="text-gray-500 mb-8">{{ \$article->published_at?->format('F d, Y') }}</div>
        <div class="prose prose-invert max-w-none">
            {!! \$article->content !!}
        </div>
    </div>
</x-layout.app>
EOT,
    'careers/index.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">Careers</h1>
        <p class="text-xl text-gray-400 mb-12">Join our team of engineers, designers, and innovators.</p>
        
        <div class="space-y-4">
            @forelse(\$jobs as \$job)
                <a href="{{ route('careers.show', \$job->slug) }}" class="flex flex-col md:flex-row justify-between items-start md:items-center bg-dark-800 p-6 rounded-xl border border-gray-800 hover:border-gray-600 transition">
                    <div>
                        <h3 class="text-xl font-bold mb-1">{{ \$job->title }}</h3>
                        <div class="flex gap-4 text-sm text-gray-400">
                            <span>{{ \$job->department }}</span>
                            <span>{{ \$job->location }}</span>
                            <span>{{ \$job->employment_type }}</span>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0 text-brand-500 font-medium text-sm">View Role &rarr;</div>
                </a>
            @empty
                <div class="text-center text-gray-500 py-12 border border-dashed border-gray-700 rounded-2xl">
                    No current openings. Check back later!
                </div>
            @endforelse
        </div>
    </div>
</x-layout.app>
EOT,
    'careers/show.blade.php' => <<<EOT
<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <a href="{{ route('careers.index') }}" class="text-brand-500 hover:text-brand-400 mb-6 inline-block">&larr; Back to Openings</a>
                <h1 class="text-4xl font-bold mb-4">{{ \$job->title }}</h1>
                <div class="flex flex-wrap gap-4 text-sm text-gray-400 mb-8 border-b border-gray-800 pb-8">
                    <span class="bg-dark-800 px-3 py-1 rounded-full">{{ \$job->department }}</span>
                    <span class="bg-dark-800 px-3 py-1 rounded-full">{{ \$job->location }}</span>
                    <span class="bg-dark-800 px-3 py-1 rounded-full">{{ \$job->employment_type }}</span>
                    @if(\$job->salary_range)
                        <span class="bg-dark-800 px-3 py-1 rounded-full">{{ \$job->salary_range }}</span>
                    @endif
                </div>
                
                <div class="prose prose-invert max-w-none mb-12">
                    <h3>Description</h3>
                    <p>{{ \$job->description }}</p>
                    <h3>Responsibilities</h3>
                    <p>{{ \$job->responsibilities }}</p>
                    <h3>Requirements</h3>
                    <p>{{ \$job->requirements }}</p>
                </div>
            </div>
            
            <div class="lg:col-span-1">
                <div class="bg-dark-800 border border-gray-800 rounded-2xl p-6 sticky top-24">
                    <h3 class="text-xl font-bold mb-6">Apply for this role</h3>
                    <form action="{{ route('careers.apply', \$job->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm text-gray-300 mb-1">Name *</label>
                            <input type="text" name="name" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-3 py-2 text-white">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-300 mb-1">Email *</label>
                            <input type="email" name="email" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-3 py-2 text-white">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-300 mb-1">Phone *</label>
                            <input type="text" name="phone" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-3 py-2 text-white">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-300 mb-1">Resume (PDF/DOC, max 5MB) *</label>
                            <input type="file" name="resume" accept=".pdf,.doc,.docx" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-300 mb-1">LinkedIn URL</label>
                            <input type="url" name="linkedin_url" class="w-full bg-dark-900 border border-gray-700 rounded-lg px-3 py-2 text-white">
                        </div>
                        <div class="flex items-start gap-2 mt-4">
                            <input type="checkbox" name="privacy_consent" id="privacy" required class="mt-1">
                            <label for="privacy" class="text-xs text-gray-400">I consent to Talisha Software processing my data for recruitment.</label>
                        </div>
                        <button type="submit" class="w-full bg-brand-600 hover:bg-brand-500 text-white font-medium py-3 rounded-lg mt-4 transition">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
EOT
];

foreach ($views as $name => $content) {
    file_put_contents($dir . '/' . $name, $content);
}
echo "Pages batch 2 generated.\n";
