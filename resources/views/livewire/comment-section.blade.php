<div class="col-span-8 col-start-5 mt-10">
    <form wire:submit.prevent="addComment" class="border border-gray-200 p-6 rounded-xl mb-6">
        <div class="flex items-center">
            <img src="/image/user.png" alt="user Image" width="40" />
            <h2 class="ml-4">Leave a comment</h2>
        </div>
        <div class="mt-6">
            <input type="text" class="h-14 w-full text-sm focus:outline-none border-gray-200 rounded-xl focus:ring"
                placeholder="Quick, thing of someting" wire:model.defer="commentText">
            @error('commentText')
                <span class="text-red-500 font-light text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <button type="submit"
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
        </div>
    </form>
    @foreach ($comments as $commentaire)
        <x-post-comment :commentaire="$commentaire"></x-post-comment>
        <div class="flex items-center space-x-2">
            <button wire:click.prevent="likeComment({{ $commentaire->id }})" class="focus:outline-none">
                <span class="sr-only">Like</span>
                @if ($commentaire->userLiked)
                    <i class="fa-solid fa-heart text-red-600"></i>
                @else
                    <i class="fa-regular fa-heart"></i>
                @endif
            </button>
            <span>{{ $commentaire->likes->count() }} {{ Str::plural('like', $commentaire->likes->count()) }}</span>
        </div>
    @endforeach
</div>
