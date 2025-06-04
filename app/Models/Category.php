<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Cada categoría pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
