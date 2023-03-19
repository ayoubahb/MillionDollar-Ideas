<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;

class LikeButton extends Component
{
    public $post;
    public $liked = false;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->liked = Like::where('user_id', auth()->id())
            ->where('post_id', $this->post->id)
            ->exists();
    }
    public function like()
    {

        if ($this->liked) {
            Like::where('user_id', auth()->id())
                ->where('post_id', $this->post->id)
                ->delete();
            $this->liked = false;
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $this->post->id,
            ]);
            $this->liked = true;
        }

        $this->post = Post::find($this->post->id); // Reload the post to get updated like count
    }


    public function render()
    {
        return view('livewire.like-button');
    }
}
