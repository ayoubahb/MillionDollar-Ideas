<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{ $post->file ? asset('storage/' . $post->file) : asset('image/no-image.png') }}"
                    alt="Post image" class="rounded-xl w-full" />


                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/image/user.png" alt="user Image" width="50" />
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">{{ $post->user->name }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>
                        Back to Posts
                    </a>

                    <div class="space-x-2">
                        @foreach ($post->categories as $category)
                            <a href="/?category={{ $category->name }}"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>{{ $post->description }}</p>
                </div>

                <form method="POST" action="/post/{{ $post->id }}/like" class="mt-5">
                    @csrf
                    <button type="submit">
                        @if ($liked)
                        <i class="fa-solid fa-heart fa-xl" style="color: red"></i> <strong>Unlike</strong>
                        @else
                        <i class="fa-regular fa-heart fa-xl"></i> <strong>Like</strong>
                        @endif
                    </button>
                </form>
            </div>
            <section class="col-span-8 col-start-5 mt-10">
                <form action="/post/{{ $post->id }}/commentaire" method="post"
                    class="border border-gray-200 p-6 rounded-xl mb-6">
                    @csrf
                    <div class="flex items-center">
                        <img src="/image/user.png" alt="user Image" width="40" />
                        <h2 class="ml-4">Leave a comment</h2>
                    </div>
                    <div class="mt-6">
                        <input type="text"
                            class="h-14 w-full text-sm focus:outline-none border-gray-200 rounded-xl focus:ring"
                            placeholder="Quick, thing of someting" name="text">
                    </div>
                    <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                        <button type="submit"
                            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
                    </div>
                </form>
                @foreach ($comments as $commentaire)
                    <x-post-comment :commentaire="$commentaire"></x-post-comment>
                @endforeach
            </section>
        </article>
    </main>
</x-layout>
