@props(['commentaire'])

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4 mt-4">
    <div class="flex-shrink-0">
        <img src="/image/user.png" alt="user Image" width="50" height="60" />

    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $commentaire->user->name }}</h3>

            <p class="text-xs">
                Posted
                <time>{{ $commentaire->created_at->diffForHumans() }}</time>
            </p>
        </header>

        <p>
            {{ $commentaire->text }}
        </p>
    </div>
</article>
<form method="POST" action="/comment/{{ $commentaire->id }}/like">
    @csrf
    <button type="submit">
        @if ($commentaire->userLiked)
            <i class="fa-solid fa-heart" style="color: red"></i> <strong>Unlike</strong>
        @else
            <i class="fa-regular fa-heart"></i> <strong>Like</strong>
        @endif
    </button>
</form>
