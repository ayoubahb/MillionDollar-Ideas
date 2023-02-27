@props(['categories'])
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
