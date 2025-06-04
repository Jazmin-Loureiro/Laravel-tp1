<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    protected $fillable = ['title', 'poster', 'content', 'category_id', 'user_id', 'habilitated'];

    // Relación con categoría (cada post pertenece a una categoría)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación con usuario (cada post pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
