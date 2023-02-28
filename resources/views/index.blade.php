<x-layout>
    <div class="center w-full p-5">
        <div class="my_post">
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="post_top">
                    <img src="{{ asset('image/user.png') }}" class=" object-cover object-center rounded-full" />
                    <input type="text" placeholder="What's on you mind?" name="description"
                        class="w-full p-2 ml-5 bg-gray-200 border-0 outline-0 rounded-lg" autocomplete="off"/>
                </div>
                @error('description')
                    <p class="text-red-500 text-xs mt-1 pl-16">{{ $message }}</p>
                @enderror
                <div class="flex pl-16 mt-2 flex-wrap">
                    @foreach ($categories as $category)
                        <div class="w-1/5">
                            <input type="checkbox" name="categories[]"
                                id="{{ $category->id }}"value="{{ $category->id }}">
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
        <x-categories :categories="$categories"></x-categories>
        @unless(count($posts) == 0)
            @foreach ($posts as $post)
                <x-post :post="$post"></x-post>
            @endforeach
        @else
            <p class="text-center mt-2">No Posts founded</p>
        @endunless
    </div>
</x-layout>
