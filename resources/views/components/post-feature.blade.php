@props(['post'])
<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ $post->file ? asset('storage/' . $post->file) : asset('image/no-image.png') }}" alt="Post image"
                class="rounded-xl w-full" />
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    {{-- Todo categories --}}
                    @foreach ($post->categories as $category)
                        <a href="/?category={{ $category->name }}"
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                            style="font-size: 10px">{{ $category->name }}</a>
                    @endforeach
                </div>

                <div class="mt-4">
                    <a href="/post/{{ $post->id }}">
                        <h1 class="text-3xl">
                            {{ $post->title }}
                        </h1>
                    </a>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{ $post->description }}
                </p>
            </div>

            <div class="flex items-center gap-2">
                <span><i class="fa-regular fa-heart"></i> {{$post->likes->count()}}</span>
                <span><i class="fa-regular fa-message"></i> {{$post->commentaires->count()}}</span>
            </div>
            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/image/user.png" alt="user image" width="50" />
                    <div class="ml-3">
                        <h5 class="font-bold">{{ $post->user->name }}</h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/post/{{ $post->id }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
