<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'userId',
        'categoryId',
        'file'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['category'] ?? false) {
            $category= $filters['category'];
            $query->whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category);
            });
        };
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'postcatgs', 'postId', 'categoryId');
    }
    
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'postId')->latest();
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
