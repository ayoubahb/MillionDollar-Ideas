<x-layout>
    <form method="POST" action=""
        class="max-w-xl mx-auto mt-4 p-4 bg-white shadow-md rounded-md">
        @csrf

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea id="description" name="description" class="form-textarea border border-gray-300 rounded-md w-full px-3 py-2"
                required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <p class="block text-gray-700 font-bold mb-2">Categories</p>
            {{-- @foreach ($categories as $category) --}}
                <div class="flex items-center">
                    {{-- <input type="checkbox" name="categories[]" value="{{ $category->id }}" --}}
                        {{-- class="form-checkbox h-4 w-4 text-indigo-600 rounded-md mr-2" id="category-{{ $category->id }}" --}}
                        {{-- {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}> --}}
                    {{-- <label for="category-{{ $category->id }}" class="text-gray-700">{{ $category->name }}</label> --}}
                </div>
            {{-- @endforeach --}}
        </div>

        <div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Create Post</button>
        </div>
    </form>
</x-layout>
