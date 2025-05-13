<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Book') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="max-w-sm mx-auto" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <div class="flex flex-col px-2">
                                <label for="title" class="block mb-2 text-md font-medium text-black">Title</label>
                                <input type="text" class="rounded-lg" id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="flex flex-col px-2 py-2">
                                <label for="author" class="block mb-2 text-md font-medium text-black">Author</label>
                                <input type="text" class="rounded-lg" id="author" name="author" value="{{ old('author') }}" required>
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex flex-col px-2 py-2">
                                <label for="publisher" class="block mb-2 text-md font-medium text-black">Publisher</label>
                                <input type="text" class="rounded-lg" id="publisher" name="publisher" value="{{ old('publisher') }}" required>
                                @error('publisher')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex flex-col px-2 py-2">
                                <label for="published_year" class="block mb-2 text-md font-medium text-black">Published Year</label>
                                <input type="text" class="rounded-lg" id="published_year" name="published_year" value="{{ old('published_year') }}" required>
                                @error('published_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="flex flex-col px-2">
                                <label for="category_id" class="block mb-2 text-md font-medium text-black">Category</label>
                                <select class="rounded-lg" id="category_id" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="flex flex-col px-2">
                            <label for="description" class="block mb-2 text-md font-medium text-black">Description</label>
                            <textarea class="rounded-lg" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div>{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="px-2">
                                <label for="cover" class="block mb-2 text-md font-medium text-black">Cover Image</label>
                                <input type="file" class="w-full text-slate-500 font-medium text-base bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2.5 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" id="cover" name="cover" accept="image/jpeg,image/png" required>
                                <div class="text-sm">Upload JPG or PNG image for the book cover.</div>
                                @error('cover')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="px-2">
                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-blue-500 hover:bg-blue-700 text-white">Add</button>
                                <a href="{{ route('books.index') }}" class="ml-4 inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-red-500 hover:bg-red-700 text-white">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>