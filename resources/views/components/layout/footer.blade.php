<footer class="bg-dark-900 border-t border-gray-800 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-2">
                <span class="text-2xl font-bold tracking-tighter text-white">Talisha<span class="text-accent-orange">.</span></span>
                <p class="mt-4 text-gray-400 max-w-sm text-sm leading-relaxed">Engineering Intelligent Systems for the Next Digital Era. We build AI, enterprise software, and emerging technology solutions.</p>
            </div>

            <div>
                <h3 class="text-base font-semibold mb-5 text-white">Company</h3>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-accent-orange transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-accent-orange transition">About Us</a></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-accent-orange transition">Solutions</a></li>
                    <li><a href="{{ route('articles.index') }}" class="hover:text-accent-orange transition">All Articles</a></li>
                    <li><a href="{{ route('careers.index') }}" class="hover:text-accent-orange transition">Career</a></li>
                    <li><a href="{{ route('contact.index') }}" class="hover:text-accent-orange transition">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 id="stay-informed" class="text-base font-semibold mb-5 text-white scroll-mt-24">Stay Informed</h3>
                <p class="text-gray-400 text-sm mb-4 leading-relaxed">Subscribe for insights and technical deep dives.</p>
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email" required
                           class="bg-dark-800 border border-gray-700 rounded-lg px-4 py-2 w-full focus:outline-none focus:border-accent-orange text-sm text-white placeholder-gray-500">
                    <button type="submit"
                            class="bg-accent-orange hover:bg-orange-600 px-4 py-2 rounded-lg font-medium text-white transition text-sm">
                        Subscribe
                    </button>
                </form>
                <div class="mt-6 space-y-2 text-sm text-gray-400">
                    <p>📞 +91 8001087752 (Customer)</p>
                    <p>📞 +91 8217707328 (CTO-Office)</p>
                    <a href="mailto:info@talishasoftware.tech" class="block hover:text-accent-orange transition">✉ info@talishasoftware.tech</a>
                </div>
            </div>
        </div>

        <div class="mt-16 pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm gap-4">
            <div>by <span class="text-white font-semibold">Talisha Software</span> &copy; {{ date('Y') }}. All rights reserved.</div>
            <div class="flex gap-6">
                <a href="{{ route('privacy') }}" class="hover:text-white transition">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="hover:text-white transition">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>