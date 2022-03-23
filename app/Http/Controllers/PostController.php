<?php

namespace App\Http\Controllers;

use App\Book;
use App\Friend;
use App\User;
use Auth;
use App\Favorite;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\PostCollection;
use App\Http\Resources\FavoriteCollection;
use App\Post;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $friends = Friend::friendships();

        if ($friends->isEmpty()) {
            return new PostCollection(request()->user()->posts);
        }

        return new PostCollection(
            Post::whereIn('user_id', [$friends->pluck('user_id'), $friends->pluck('friend_id')])
                ->get()
        );
    }

    public function store()
    {
        $data = request()->validate([
            'body' => '',
            'image' => '',
            'width' => '',
            'height' => '',
        ]);

        if (isset($data['image'])) {
            $image = $data['image']->store('post-images', 'public');

            Image::make($data['image'])
                ->fit($data['width'], $data['height'])
                ->save(storage_path('app/public/post-images/'.$data['image']->hashName()));
        }

        $post = request()->user()->posts()->create([
            'body' => $data['body'],
            'image' => $image ?? null,
        ]);

        return new PostResource($post);
    }
    public function deleteQuote($id)
    {

        $post = Post::findOrFail($id);

        if (auth()->user()->id == $post->user_id) {
            $post->delete();
        }

        return response()->json([
            'post' => 'deleted'
        ], 200);
    }

    public function getFavritesUser($id){

        $user = User::findOrFail($id);

        //$posts=$user->favoritesQuote();

        return new PostCollection($user->favoritesQuote);


    }

    public function deleteFavritesQuote($id)
    {
        $post = Post::findOrFail($id);

        $post->favorites()->detach(auth()->user());


        return new FavoriteCollection($post->favorites);



    }



    public function addFavritesQuote($id)
    {
        $post = Post::findOrFail($id);

        $post->favorites()->toggle(auth()->user());

        return new FavoriteCollection($post->favorites);
    }






    /*$favorited = Favorite::where('post_id', $quote->id)->where('user_id',  Auth::id())->first();

    if ($favorited) {
        $favorited->delete();
        return response()->json([
            'favorited' => false
        ], 200);
    }

    $favorited_user = new Favorite();
    $favorited_user->user_id = Auth::id();
    $favorited_user->post_id = $quote->id;
    $favorited_user->save();
    return response()->json([
        'favorited' => true
    ], 200);
}
*/

}
