<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Commentaire;
use App\Models\CommentLike;
use PHPUnit\Framework\Constraint\IsFalse;

class CommentSection extends Component
{
    public $post;
    public $likedComment = false;
    public $comments;
    public $commentText;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comments = $post->commentaires;

        foreach ($this->comments as $comment) {
            $commentUserLiked = false;

            foreach ($comment->likes as $like) {
                if ($like->userId === auth()->id()) {
                    $commentUserLiked = true;
                    break;
                }
            }

            $comment->userLiked = $commentUserLiked;
        }
    }

    public function likeComment($commentId)
    {
        $liked = CommentLike::where('userId', auth()->id())
            ->where('commentId', $commentId)
            ->exists();
        if ($liked) {
            CommentLike::where('userId', auth()->id())
                ->where('commentId', $commentId)
                ->delete();
        } else {
            CommentLike::create([
                'userId' => auth()->id(),
                'commentId' => $commentId,
            ]);
        }

        $this->post = Post::with(['commentaires.likes.user', 'likes.user'])->findOrFail($this->post->id);
        $this->comments = $this->post->commentaires;
        $this->userLikedComments($this->comments);
    }

    public function addComment()
    {
        $this->validate([
            'commentText' => 'required',
        ]);

        Commentaire::create([
            'userId' => auth()->id(),
            'postId' => $this->post->id,
            'text' => $this->commentText,
        ]);

        $this->commentText = '';
        $this->emit('commentAdded');

        $this->post = Post::with(['commentaires.likes.user', 'likes.user'])->findOrFail($this->post->id);
        $this->comments = $this->post->commentaires;
        $this->userLikedComments($this->comments);
    }

    public function userLikedComments($comments)
    {
        foreach ($comments as $comment) {
            $commentUserLiked = false;

            foreach ($comment->likes as $like) {
                if ($like->userId === auth()->id()) {
                    $commentUserLiked = true;
                    break;
                }
            }

            $comment->userLiked = $commentUserLiked;
        }
    }

    public function render()
    {

        return view('livewire.comment-section');
    }
}
