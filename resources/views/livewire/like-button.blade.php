<div class="flex items-center space-x-2">
    <button wire:click.prevent="like" class="focus:outline-none">
        <span class="sr-only">Like</span>
        @if ($liked)
            <i class="fa-solid fa-heart fa-xl text-red-600"></i>
        @else
            <i class="fa-regular fa-heart fa-xl"></i>
        @endif
    </button>
    <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
</div>