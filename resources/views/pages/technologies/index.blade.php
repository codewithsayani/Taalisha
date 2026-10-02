<x-layout.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-12">Technologies</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($technologies as $tech)
                <div class="bg-dark-800 p-6 rounded-xl border border-gray-800 text-center">
                    <div class="font-bold mb-1">{{ $tech->name }}</div>
                    <div class="text-xs text-gray-500 uppercase tracking-wider">{{ $tech->category }}</div>
                </div>
            @empty
                <p class="text-gray-500 col-span-4">No technologies available.</p>
            @endforelse
        </div>
    </div>
</x-layout.app>