<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <a href="{{ route('careers.index') }}" class="text-brand-500 hover:text-brand-400 mb-6 inline-block">&larr; Back to Openings</a>
                <h1 class="text-4xl font-bold mb-4">{{ $job->title }}</h1>
                <div class="flex flex-wrap gap-4 text-sm text-gray-400 mb-8 border-b border-gray-800 pb-8">
                    <span class="bg-dark-800 px-3 py-1 rounded-full">{{ $job->department }}</span>
                    <span class="bg-dark-800 px-3 py-1 rounded-full">{{ $job->location }}</span>
                    <span class="bg-dark-800 px-3 py-1 rounded-full">{{ $job->employment_type }}</span>
                    @if($job->salary_range)
                        <span class="bg-dark-800 px-3 py-1 rounded-full">{{ $job->salary_range }}</span>
                    @endif
                </div>
                
                <div class="prose prose-invert max-w-none mb-12">
                    <h3>Description</h3>
                    <p>{{ $job->description }}</p>
                    <h3>Responsibilities</h3>
                    <p>{{ $job->responsibilities }}</p>
                    <h3>Requirements</h3>
                    <p>{{ $job->requirements }}</p>
                </div>
            </div>
            
            <div class="lg:col-span-1">
                <div class="bg-dark-800 border border-gray-800 rounded-2xl p-6 sticky top-24">
                    <h3 class="text-xl font-bold mb-6">Apply for this role</h3>
                    <form action="{{ route('careers.apply', $job->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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