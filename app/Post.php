<?php

namespace App;

use App\Scopes\ReverseScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ReverseScope());
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }


}