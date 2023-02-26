<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MD IDEA</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <nav class="w-full h-16 flex items-center justify-between fixed top-0">
        <div class="left flex items-center justify-center ml-5">
            <div class="logo">
                <img src="{{ asset('image/logoidea.png') }}" class="w-16 cursor-pointer my-1 mx-0" />
            </div>
        </div>

        <div class="right flex items-center ml-2 mx-5">
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit">
                    <i class="fa-solid fa-door-closed"></i> Logout
                </button>
            </form>
            <img src="image/user.png" class="w-8 h-8 object-cover object-center ml-2 cursor-pointe rounded-full" />
        </div>
    </nav>

    <div class="main flex mt-14 mx-auto justify-center">
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
                    <div class="flex pl-16 mt-2">
                        <select name="categoryId"
                            class="border-gray-400 appearance-none text-gray-500 w-full p-2 focus:outline-none focus:shadow-outline bg-gray-200 text-gray-500 p-2 rounded-lg">
                            <option value="">Choose post category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
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

                                <div class="friends_name">
                                    <p class="font-bold cursor-pointer">{{ $post->user->name }}</p>
                                </div>
                            </div>
                        </div>
                        <a href="/?category={{ $post->category->name }}"
                            class="bg-black text-white px-2 rounded-md py-1">#{{ $post->category->name }}</a>
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
    </div>
</body>

</html>
