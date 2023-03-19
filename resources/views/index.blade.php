<x-layout>
    <x-post-header :categories="$categories"></x-post-header>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <a href="/create" class="w-full flex justify-end">
            <button type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Add post</button>
        </a>
        @if ($posts->count())
            <x-post-feature :post="$posts[0]"></x-post-feature>
            @if ($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6">
                    @foreach ($posts->skip(1) as $post)
                        <x-post :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
                    @endforeach
                </div>
            @endif
        @else
            <p class="text-center">No posts yet</p>
        @endif
    </main>
</x-layout>
