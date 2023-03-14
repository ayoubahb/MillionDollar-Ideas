{{-- @props(['post'])
<div class="friends_post rounded-md py-2 px-4 my-2 mx-0">
    <div class="friend_post_top mb-4">
        <div class="img_and_name flex items-center">
            <img src="{{ asset('image/user.png') }}"
                class="w-12 h-12 object-cover object-center mr-2 cursor-pointer rounded-full" />

            <div class="friends_name flex justify-between w-full">
                <p class="font-bold cursor-pointer">{{ $post->user->name }}</p>
                @if ($post->userId == Auth::user()->id)
                    <div class="flex justify-between w-10">
                        <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal"
                            class="inline-flex items-center p-2 text-sm font-medium text-center focus:outline-none dark:text-black"
                            type="button">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="/posts/{{ $post->id }}/edit"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <form method="POST" action="/posts/{{ $post->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="text-left w-full block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">DELETE
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @foreach ($post->categories as $catgPost)
        <a href="/?category={{ $catgPost->name }}"
            class="bg-black text-white px-2 rounded-md py-1">#{{ $catgPost->name }}</a>
    @endforeach
    <p class="my-3">{{ $post->description }}</p>
    <img src="{{ $post->file ? asset('storage/' . $post->file) : asset('image/no-image.png') }}"
        class="w-full object-cover object-center rounded" />

    <div class="flex items-center justify-between my-2 mx-0"></div>

    <hr class="w-full h-px bg-gray-400 my-2 mx-0" />

    <div class="like flex items-center justify-evenly my-0 mx-auto w-11/12">
        <div class="like_icon flex items-center">
            <i class="fa-solid fa-thumbs-up text-xl mr-2 text-gray-600"></i>
            <p>Like</p>
        </div>

        <div class="like_icon flex items-center">
            <i class="fa-solid fa-message text-xl mr-2 text-gray-600"></i>
            <p>Comments</p>
        </div>
    </div>

    <hr class="w-full h-px bg-gray-400 my-2 mx-0" />

    <div class="comment_warpper flex items-center justify-between ">
        <img src="image/user.png" class="w-8 h-8 object-cover object-center mr-4 rounded-full" />
        <form action="/post/{{ $post->id }}/commentaire" method="post" class="relative w-11/12">
            @csrf
            <div class="py-1 px-4 bg-gray-200  w-full rounded">
                <input type="text" placeholder="Write a comment"
                    class="w-full h-8 outline-none border-0 bg-transparent" name="text" autocomplete="off" />
            </div>
            <button class="absolute"><i class="fa-regular fa-paper-plane"></i></button>
        </form>
    </div>
    @foreach ($post->commentaires as $commentaire)
        <div class="mt-3 flex flex-col">
            <div class="flex">
                <img src="image/user.png" class="w-8 h-8 object-cover object-center mr-4 rounded-full" />
                <h5 class="font-semibold ml-2.5">{{ $commentaire->user->name }}</h5>
            </div>
            <div class="bg-gray-200 rounded self-end w-11/12 p-3">
                {{ $commentaire->text }}
            </div>
        </div>
    @endforeach
</div> --}}
@props(['post'])
<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ $post->file ? asset('storage/' . $post->file) : asset('image/no-image.png') }}" alt="Post image"
                class="rounded-xl w-full" />
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
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

            <div class="text-sm mt-4">
                <p>
                    {{ $post->description }}
                </p>

            </div>

            <div class="flex items-center gap-2 mt-2">
                <span><i class="fa-regular fa-heart"></i> {{$post->likes->count()}}</span>
                <span><i class="fa-regular fa-message"></i> {{$post->commentaires->count()}}</span>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/image/user.png" alt="Lary avatar" width="50" />
                    <div class="ml-3">
                        <h5 class="font-bold">{{ $post->user->name }}</h5>
                    </div>
                </div>

                <div>
                    <a href="/post/{{ $post->id }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
