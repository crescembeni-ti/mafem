<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'image', 'user_id', 'published', 'published_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

