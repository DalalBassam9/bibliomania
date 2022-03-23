<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{


    protected $fillable = [
        'name', 'author',
        'file',
        'description',
        'image',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }




    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }





}
