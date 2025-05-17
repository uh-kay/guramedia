<x-app-layout>
    <body class="bg-gray-50 font-sans">
        <!-- ya ini bagian pala -->
        
        <section class="bg-blue-700 text-white py-8 md:py-12 lg:py-16">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center justify-between gap-4 lg:gap-32">
                    <div class="order-2 lg:order-2 text-center lg:text-left w-full lg:w-1/2">
                        <h1 class="text-3xl md:text-4xl font-bold mb-3 md:mb-4">Your Digital Library</h1>
                        <p class="text-lg md:text-xl mb-6 md:mb-8 max-w-md">Access thousands of books anytime, anywhere. No downloads, no hassle.</p>
                        <div>
                            <a href="{{ route('books.index') }}" class="bg-white text-blue-800 px-5 py-2 md:px-6 md:py-3 rounded font-bold inline-block hover:bg-blue-50 transition duration-200">Browse Books</a>
                        </div>
                    </div>
                    <div class="order-1 lg:order-1 w-full lg:w-1/2 flex justify-center lg:justify-end">
                        <img src="{{ asset('assets/app.png') }}" alt="Digital Library App" class="h-48 sm:h-64 md:h-80 lg:h-96 object-contain">
                    </div>
                </div>
            </div>
        </section>

        <!-- ini kelebihan Guramedia -->
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Why Choose Guramedia</h2>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="mx-auto mb-4 h-32 w-32">
                            <img src="{{ asset('assets/many-collection.png') }}" alt="Features Icon" class="h-full w-full object-contain">
                        </div>
                        <h3 class="text-xl font-bold mb-3">Wide Selection</h3>
                        <p class="text-gray-600">Over 25,000 books across all genres, from classics to contemporary works.</p>
                    </div>
                    
                    <div class="text-center p-6">
                        <div class="mx-auto mb-4 h-32 w-32">
                            <img src="{{ asset('assets/anywhere.png') }}" alt="Features Icon" class="h-full w-full object-contain">
                        </div>
                        <h3 class="text-xl font-bold mb-3">Read Anywhere</h3>
                        <p class="text-gray-600">Access your books on any device with just a web browser.</p>
                    </div>
                    
                    <div class="text-center p-6">
                        <div class="mx-auto mb-4 h-32 w-32">
                            <img src="{{ asset('assets/library.png') }}" alt="Features Icon" class="h-full w-full object-contain">
                        </div>
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
                        <h3 class="text-lg font-bold mb-4">Guramedia</h3>
                        <p>Your digital library for the modern reader.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">Browse</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('books.index') }}" class="text-gray-400 hover:text-white">Books</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold mb-4">About</h3>
                        <ul class="space-y-2">
                            <li><a href="https://github.com/uh-kay/guramedia" class="text-gray-400 hover:text-white">Source Code</a></li>
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