<?php

namespace App\Models;

use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'commentId',
        'userId',
    ];
    public function comment()
    {
        return $this->belongsTo(Commentaire::class, 'commentId');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
