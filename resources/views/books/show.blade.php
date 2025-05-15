<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex -mx-2">
                        <div class="md:w-4/12 px-2 ml-8 mb-4">
                            <img src="{{ asset('storage/' . $book->cover) }}" class="rounded max-w-sm h-auto" alt="{{ $book->title }}">
                        </div>
                        <div class="md:w-8/12 px-2 ml-8">
                            <h1 class="text-2xl font-bold">{{ $book->title }}</h1>
                            <p class="text-lg">By <strong>{{ $book->author }}</strong></p>
                            <div class="mb-3">
                                <span class="badge bg-primary"><strong>Category:</strong> {{ $book->category->name }}</span>
                                <p>
                                    <strong>Publisher:</strong> {{ $book->publisher }}<br>
                                    <strong>Published Year:</strong> {{ $book->published_year }}
                                </p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold mb-2">Description</h3>
                                <p>{{ $book->description }}</p>
                            </div>
                            <div class="mb-3">
                                <p class="text-sm text-gray-500">Added on {{ $book->created_at->format('F d, Y') }}</p>
                            </div>
                            
                            <div class="mt-4 flex gap-3">
                                <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-gray-500 hover:bg-gray-700 text-white">Back to Books</a>
                                @auth
                                    @if(auth()->user()->isAdmin())
                                        <a href="{{ route('books.edit', $book) }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-blue-500 hover:bg-blue-700 text-white">Edit Book</a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-red-500 hover:bg-red-700 text-white" onclick="return confirm('Are you sure you want to delete this book?')">Delete Book</button>
                                        </form>
                                    @endif
                                    @if($book->file)
                                        <a href="{{ route('books.download', $book) }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-green-500 hover:bg-green-700 text-white">
                                            Download Book
                                        </a>
                                    @else
                                        <p class="text-muted">PDF not available for this book.</p>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>