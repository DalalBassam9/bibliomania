<?php

namespace App;

use App\Post;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(UserImage::class);
    }

    public function coverImage()
    {
        return $this->hasOne(UserImage::class)
            ->orderByDesc('id')
            ->where('location', 'cover')
            ->withDefault(function ($userImage) {
                $userImage->path = 'user-images/cover-default-image.jpg';
            });
    }

    public function profileImage()
    {
        return $this->hasOne(UserImage::class)
            ->orderByDesc('id')
            ->where('location', 'profile')
            ->withDefault(function ($userImage) {
                $userImage->path = 'user-images/profile-default-image..jpg';
            });
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id');
    }

    public function favoritesQuote()
    {
        return $this->belongsToMany(
            Post::class,
            'favorites',
            'user_id',
            'post_id');
    }


    public function pending_friend_requests()
    {
        $users = array();
        $friendships = Friend::where('status',null)
        ->where('user_id', $this->id)
            ->get();
        foreach ($friendships as $friendship):
            array_push($users, User::with('profileImage')->find($friendship->friend_id));
        endforeach;
        return $users;
    }


   public function friendships(){

        $friends = array();
        $f1 = Friend::where('status', 1)
            ->where('friend_id',$this->id)
            ->get();
        foreach ($f1 as $friendship) :
            array_push($friends, User::with('profileImage')->find($friendship->user_id));
        endforeach;
        $friends2 = array();
        $f2 = Friend::where('status', 1)
            ->where('user_id', $this->id)
            ->get();
        foreach ($f2 as $friendship) :
            array_push($friends2, User::with('profileImage')->find($friendship->friend_id));
        endforeach;
        return array_merge($friends, $friends2);


   }


    public function favoritesBook()
    {
        return $this->belongsToMany(
            Book::class,
            'favorites',
            'user_id',
            'book_id');
    }


    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
    }
    public function countPost()
    {
        return $this->hasMany(Post::class)->count();
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function reivews()
    {
        return $this->hasMany(Review::class);
    }
}
