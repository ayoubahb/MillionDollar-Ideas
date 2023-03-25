<x-layout>
    <form action="/posts" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto mt-6 lg:mt-20 space-y-6 bg-gray-100 rounded" style="padding:50px;">
        @csrf
        <h1 class="font-bold text-4xl text-center mb-4">Create post</h1>
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

        <div class="flex items-center mb-4 flex-wrap">
            @foreach ($categories as $category)
                <div class="w-1/3 md:w-1/4">
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
