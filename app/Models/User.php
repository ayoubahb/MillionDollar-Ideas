<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'dob'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class, 'userId');
    }
    
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'userId');
    }
    public function likes()
    {
        return $this->hasMany(Like::class,'user_id');
    }
    public function CommentLikes()
    {
        return $this->hasMany(CommentLike::class, 'userId');
    }
}
