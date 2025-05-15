<x-app-layout>
    <body class="bg-gray-50 font-sans">
        <!-- ya ini bagian pala -->
        <section class="bg-blue-700 text-white py-16">
            <div class="max-w-6xl mx-auto px-4 text-center">
                <h1 class="text-4xl font-bold mb-4">Your Digital Library</h1>
                <p class="text-xl mb-8 max-w-2xl mx-auto">Access thousands of books anytime, anywhere. No downloads, no hassle.</p>
                <div class="space-x-4">
                    <a href="{{ route('books.index') }}" class="bg-white text-blue-800 px-6 py-3 rounded font-bold inline-block">Browse Books</a>
                </div>
            </div>
        </section>

        <!-- ini kelebihan Guramedia -->
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Why Choose Guramedia</h2>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <h3 class="text-xl font-bold mb-3">Wide Selection</h3>
                        <p class="text-gray-600">Over 25,000 books across all genres, from classics to contemporary works.</p>
                    </div>
                    
                    <div class="text-center p-6">
                        <h3 class="text-xl font-bold mb-3">Read Anywhere</h3>
                        <p class="text-gray-600">Access your books on any device with just a web browser.</p>
                    </div>
                    
                    <div class="text-center p-6">
                        <h3 class="text-xl font-bold mb-3">Personal Library</h3>
                        <p class="text-gray-600">Save books to your personal shelf and track your reading progress.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ini buat bikin akun -->
        <section class="py-16 bg-blue-800 text-white">
            <div class="max-w-6xl mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-6">Ready to Start Reading?</h2>
                <p class="text-xl mb-8 max-w-2xl mx-auto">Join thousands of happy readers today. It's completely free.</p>
                <a href="{{ route('register') }}" class="bg-white text-blue-800 px-8 py-4 rounded-lg font-bold inline-block">Create Your Free Account</a>
            </div>
        </section>

    
        <footer class="bg-gray-900 text-white py-12">
            <div class="max-w-6xl mx-auto px-4">
                <div class="grid md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h3 class="text-lg font-bold mb-4">SimpleReads</h3>
                        <p>Your digital library for the modern reader.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Browse</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Featured</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">New Releases</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">About</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Our Story</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Legal</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Terms</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Privacy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                    <p></p>
                </div>
            </div>
        </footer>
    </body>
</x-app-layout>