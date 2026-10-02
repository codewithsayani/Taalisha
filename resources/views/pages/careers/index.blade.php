<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">Careers</h1>
        <p class="text-xl text-gray-400 mb-12">Join our team of engineers, designers, and innovators.</p>
        
        <div class="space-y-4">
            @forelse($jobs as $job)
                <a href="{{ route('careers.show', $job->slug) }}" class="flex flex-col md:flex-row justify-between items-start md:items-center bg-dark-800 p-6 rounded-xl border border-gray-800 hover:border-gray-600 transition">
                    <div>
                        <h3 class="text-xl font-bold mb-1">{{ $job->title }}</h3>
                        <div class="flex gap-4 text-sm text-gray-400">
                            <span>{{ $job->department }}</span>
                            <span>{{ $job->location }}</span>
                            <span>{{ $job->employment_type }}</span>
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