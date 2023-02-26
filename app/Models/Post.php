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
            $categoryId = Category::where('name', $filters['category'])->first()->id;
            $query->where('categoryId', $categoryId);
        };
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
