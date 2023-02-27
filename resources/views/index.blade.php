<x-layout>
    <div class="center w-full p-5">
        <div class="my_post">
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="post_top">
                    <img src="image/user.png" class=" object-cover object-center rounded-full" />
                    <input type="text" placeholder="What's on you mind?" name="description"
                        class="w-full p-2 ml-5 bg-gray-200 border-0 outline-0 rounded-lg" />
                </div>
                @error('description')
                    <p class="text-red-500 text-xs mt-1 pl-16">{{ $message }}</p>
                @enderror
                <div class="flex pl-16 mt-2 flex-wrap">
                    @foreach ($categories as $category)
                    <div class="w-1/5">
                        <input type="checkbox" name="categories[]" id="{{ $category->id }}"value="{{ $category->id }}">
                        <label for="{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                    @endforeach
                </div>
                @error('categoryId')
                    <p class="text-red-500 text-xs mt-1 pl-16">{{ $message }}</p>
                @enderror
                <hr />
                <div class="post_bottom">
                    <div class="flex mb-3">
                        <i class="fa-solid fa-images green"></i>
                        <p>Photo</p>
                    </div>
                    <div style="z-index: 100;"class="flex flex-col items-start px-8 py-2 relative">
                        <input type="file" name="image">
                    </div>

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded h-9 ml-16">
                        Post
                    </button>
                </div>
            </form>
        </div>

        <div class="categories p-3">
            <p class="text-lg mb-3">Categories</p>
            <ul class="flex justify-satrt flex-wrap gap-y-1 gap-x-1">
                <a href="/" class=" text-center">
                    <li class="bg-black text-white px-2 rounded-md">#All</li>
                </a>
                @foreach ($categories as $category)
                    <a href="/?category={{ $category->name }}" class="text-center">
                        <li class="bg-black text-white px-2 rounded-md">#{{ $category->name }}</li>
                    </a>
                @endforeach
            </ul>
        </div>
        @unless(count($posts) == 0)
            @foreach ($posts as $post)
                <div class="friends_post rounded-md py-2 px-4 my-2 mx-0">
                    <div class="friend_post_top mb-4">
                        <div class="img_and_name flex items-center">
                            <img src="image/user.png"
                                class="w-12 h-12 object-cover object-center mr-2 cursor-pointer rounded-full" />

                            <div class="friends_name flex justify-between w-full">
                                <p class="font-bold cursor-pointer">{{ $post->user->name }}</p>
                                @if ($post->userId == Auth::user()->id)
                                    <div class="flex justify-between w-10">
                                        {{-- <a href=""><i class="fa-solid fa-trash"></i></a>
                                            <a href="/post/{{ $post->id }}/edit"><i class="fa-solid fa-pencil"></i></a> --}}
                                        <button id="dropdownMenuIconHorizontalButton"
                                            data-dropdown-toggle="dropdownDotsHorizontal"
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
                        
                    <a href="/?category={{$catgPost->name}}"
                        class="bg-black text-white px-2 rounded-md py-1">#{{$catgPost->name}}</a>
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

                    <div class="comment_warpper flex items-center">
                        <img src="image/user.png" class="w-8 h-8 object-cover object-center mr-4 rounded-full" />

                        <div class="comment_search py-1 px-4 bg-gray-200">
                            <input type="text" placeholder="Write a comment"
                                class="w-full h-8 outline-none border-0 bg-transparent" />
                        </div>
                    </div>
                    {{-- <div>
                        <h2>{{ $post->description }}</h2>
                        <p>Posted by {{ $post->user->name }}</p>
                    </div> --}}
                </div>
            @endforeach
        @else
            <p class="text-center mt-2">No Posts founded</p>
        @endunless
    </div>
</x-layout>
