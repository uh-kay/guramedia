<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="sm:px-6 lg:px-8 mx-auto max-w-7xl">
            <!-- Stats Cards -->
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                <div class="col">
                    <div class="py-4">
                        <div class="flex justify-between">
                            <div>
                                <h5 class="card-title">Total Books</h5>
                                <p class="card-text display-4">{{ $totalBooks }}</p>
                            </div>
                            <div>
                                <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center px-2 py-1 border border-transparent text-base font-medium rounded-md shadow-sm bg-blue-500 hover:bg-blue-700 text-white">Add New Book</a>
                                <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center px-2 py-1 border border-transparent text-base font-medium rounded-md shadow-sm bg-blue-500 hover:bg-blue-700 text-white">View Books</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="py-4">
                        <div class="flex justify-between">
                            <div>
                                <h5 class="card-title">Total Categories</h5>
                                <p class="card-text display-4">{{ $totalCategories }}</p>
                            </div>
                            <div>
                                <a href="{{ route('categories.create') }}" class="inline-flex items-center justify-center px-2 py-1 border border-transparent text-base font-medium rounded-md shadow-sm bg-blue-500 hover:bg-blue-700 text-white">Create Category</a>
                                <a href="{{ route('categories.index') }}" class="inline-flex items-center justify-center px-2 py-1 border border-transparent text-base font-medium rounded-md shadow-sm bg-blue-500 hover:bg-blue-700 text-white">Manage Categories</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Registered Users</h5>
                            <p class="card-text display-4">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Books -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Recently Added Books</h3>
                    
                    @if($recentBooks->isEmpty())
                        <div>No books have been added yet.</div>
                    @else
                        <div class="relative overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-6 py-3">Cover</th>
                                        <th class="px-6 py-3">Title</th>
                                        <th class="px-6 py-3">Author</th>
                                        <th class="px-6 py-3">Category</th>
                                        <th class="px-6 py-3">Added On</th>
                                        <th class="px-6 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($recentBooks as $book)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }} cover" class="h-20 w-16 object-cover">
                                            </td>
                                            <td class="px-6 py-4">{{ $book->title }}</td>
                                            <td class="px-6 py-4">{{ $book->author }}</td>
                                            <td class="px-6 py-4">{{ $book->category->name }}</td>
                                            <td class="px-6 py-4">{{ $book->created_at->format('M d, Y') }}</td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('books.show', $book) }}" class="text-blue-600 mx-3">View</a>
                                                <a href="{{ route('books.edit', $book) }}" class="text-red-600">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>