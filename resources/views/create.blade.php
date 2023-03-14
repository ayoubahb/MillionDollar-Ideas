{{-- <div class="center w-full p-5">
    <div class="my_post">
        <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="post_top">
                <img src="{{ asset('image/user.png') }}" class=" object-cover object-center rounded-full" />
                <input type="text" placeholder="What's on you mind?" name="description"
                class="w-full p-2 ml-5 bg-gray-200 border-0 outline-0 rounded-lg"
                value="{{ $post->description }}" />
            </div>
            @error('description')
            <p class="text-red-500 text-xs mt-1 pl-16">{{ $message }}</p>
            @enderror
            <div class="flex pl-16 mt-2 flex-wrap">
                @foreach ($categories as $category)
                <div class="w-1/5">
                    @if (in_array($category->name, $postctg))
                    <input type="checkbox" name="categories[]"
                    id="{{ $category->id }}"value="{{ $category->id }}" checked>
                    <label for="{{ $category->id }}">{{ $category->name }}</label>
                    @else
                    <input type="checkbox" name="categories[]"
                    id="{{ $category->id }}"value="{{ $category->id }}">
                    <label for="{{ $category->id }}">{{ $category->name }}</label>
                    @endif
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
                    Update
                </button>
            </div>
        </form>
    </div>
</div> --}}
<x-layout>
    <form action="/posts" method="POST" enctype="multipart/form-data" class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @csrf

        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="title"
                class="block py-2.5 px-0 w-full text-black text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Post
                Title</label>
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="description"
                class="block py-2.5 px-0 w-full text-black text-sm bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
        </div>

        <div class="flex items-center mb-4 justify-between flex-wrap">
            @foreach ($categories as $category)
                <div class="w-1/4">
                    <input id="{{ $category->id }}" type="checkbox" value="{{ $category->id }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        name="categories[]">
                    <label for="{{ $category->id }}"
                        class="ml-2 text-sm font-medium text-black ">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" for="file_input">Upload
                file</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file" name="image">
        </div>

        <button type="submit"
            class="text-white bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
    </form>

</x-layout>
