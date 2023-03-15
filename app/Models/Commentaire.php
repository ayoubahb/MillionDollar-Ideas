<?php

namespace App\Models;

use App\Models\CommentLike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'postId',
        'text',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class,'postId');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'userId');
    }
    public function likes()
    {
        return $this->hasMany(CommentLike::class ,'commentId');
    }
}
