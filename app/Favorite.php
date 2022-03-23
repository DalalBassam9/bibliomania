<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps(); //, 'question_id', 'user_id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class)->withTimestamps(); //, 'question_id', 'user_id');
    }
}