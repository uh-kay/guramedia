<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Book') }}: {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="max-w-sm mx-auto" action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <div class="flex flex-col px-2 mb-3">
                                <label for="title" class="block mb-2 text-md font-medium text-black">Title</label>
                                <input type="text" class="rounded-lg" id="title" name="title" value="{{ old('title', $book->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="flex flex-col px-2">
                                <label for="author" class="block mb-2 text-md font-medium text-black">Author</label>
                                <input type="text" class="rounded-lg" id="author" name="author" value="{{ old('author', $book->author) }}" required>
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 flex flex-col px-2">
                            <label for="category_id" class="block mb-2 text-md font-medium text-black">Category</label>
                            <select class="rounded-lg" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id', $book->category_id) == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 flex flex-col px-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="rounded-lg" id="description" name="description" rows="5" required>{{ old('description', $book->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 flex flex-col px-2">
                            <label for="cover" class="block mb-2 text-md font-medium text-black">Cover Image</label>
                            <input type="file" class="w-full text-slate-500 font-medium text-base bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2.5 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" id="cover" name="cover" accept="image/jpeg,image/png">
                            <div class="text-sm">Upload a new JPG or PNG image to change the book cover. Leave empty to keep the current cover.</div>
                            @error('cover')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3 flex flex-col px-2">
                            <div class="d-flex align-items-center">
                                <p class="block mb-2 text-md font-medium text-black">Current Cover:</p>
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="img-thumbnail" style="max-height: 150px;">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-blue-500 hover:bg-blue-700 text-white">Update Book</button>
                            <a href="{{ route('books.index') }}" class="ml-4 inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-red-500 hover:bg-red-700 text-white">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>