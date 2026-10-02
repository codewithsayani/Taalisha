<x-layout.app>
    @section('title', 'Contact Us | Talisha Software')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                <h1 class="text-4xl font-bold mb-6">Let's build the future together.</h1>
                <p class="text-gray-400 text-lg mb-8">Reach out to our engineering and consulting team to discuss your enterprise requirements.</p>
                <div class="space-y-6 text-gray-300">
                    <div>
                        <h4 class="font-medium text-white mb-1">Email</h4>
                        <p>hello@talishasoftware.tech</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-dark-800/50 border border-gray-800 rounded-2xl p-8">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-accent-orange text-white">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-accent-orange text-white">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Message *</label>
                        <textarea name="message" rows="4" required class="w-full bg-dark-900 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-accent-orange text-white">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex items-start gap-3">
                        <input type="checkbox" name="privacy_consent" id="privacy" required class="mt-1 bg-dark-900 border-gray-700 rounded text-accent-orange focus:ring-accent-orange">
                        <label for="privacy" class="text-sm text-gray-400">I consent to having Talisha Software collect my details for communication purposes.*</label>
                    </div>
                    @error('privacy_consent')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    
                    <button type="submit" class="w-full bg-accent-orange hover:bg-orange-600 text-white font-medium py-4 rounded-xl transition">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>