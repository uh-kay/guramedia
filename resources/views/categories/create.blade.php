<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Category') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('categories.store') }}" method="POST" class="max-w-sm mx-auto">
                        @csrf
                        
                        <div class="mb-3">
                            <div class="flex flex-col px-2">
                                <label for="name" class="block mb-2 text-md font-medium text-black">Category Name</label>
                                <input type="text" class="rounded-lg" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3 px-2">
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-blue-500 hover:bg-blue-700 text-white">Create</button>
                            <a href="{{ route('categories.index') }}" class="ml-4 inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm bg-red-500 hover:bg-red-700 text-white">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>