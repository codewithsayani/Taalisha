<x-layout.app>
    @section('title', $industry->name . ' | Talisha Software')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <h1 class="text-4xl font-bold mb-6">{{ $industry->name }}</h1>
        <div class="prose prose-invert">
            {{ $industry->overview }}
        </div>
    </div>
</x-layout.app>