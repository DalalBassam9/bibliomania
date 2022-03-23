<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\FavoriteCollection;
use App\Review;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\Review as ReviewResource;
use App\Http\Resources\BookCollection;
use App\Http\Resources\ReviewCollection;
use App\Http\Resources\PostCollection;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getBooks()
    {

    return new BookCollection(Book::get());

 //return  BookResource::collection(Book::get());
    }


    public function getAllBooks()
    {


        return new BookCollection(Book::get());

        //return  BookResource::collection(Book::get());
    }

    public function addFavritesBook($id)
    {
        $book = Book::findOrFail($id);

        $book->favorites()->toggle(auth()->user());

        return new FavoriteCollection($book->favorites);
    }

    public function  getFavritesBook($id){
        $user = User::findOrFail($id);
        $books=$user->favoritesBook()->get();

        return new BookCollection($books);

    }


    public function getStarRating($id)
    {
        $book = Book::findOrFail($id);

        $ratings = Review::where('book_id', $book->id)->get();
        $sum_one_star = 0;
        $sum_two_star = 0;
        $sum_three_star = 0;
        $sum_four_star = 0;
        $sum_five_star = 0;
        $sum_rating = 0;

        foreach ($ratings as $rating) {
            for ($i = $rating->rating; $i <= $rating->rating; $i += $rating->rating) {
                if ($i == 1) {
                    $sum_one_star += $i;
                }
                if ($i == 2) {
                    $sum_two_star += $i;
                }
                if ($i == 3) {
                    $sum_three_star += $i;
                }
                if ($i == 4) {
                    $sum_four_star += $i;
                }
                if ($i == 5) {
                    $sum_five_star += $i;
                }
                $sum_rating += $rating->rating;

                $arrStar = [
                    'sum_one_star' => $sum_one_star,
                    'sum_two_star' => $sum_two_star,
                    'sum_three_star' => $sum_three_star,
                    'sum_four_star' => $sum_four_star,
                    'sum_five_star' => $sum_five_star,
                    'sum_rating' => $sum_rating

                ];
            }
        }

        return response()->json([
            'arrStar' => $arrStar

        ], 200);
    }

    public function showBook($id)
    {

        $book = Book::findOrFail($id);

        return new BookResource($book);

    }

 public function getRating($id)
    {

       $book = Book::findOrFail($id);
        $ratings = Review::where('book_id', $book->id)->orderBy('created_at', 'desc')->get();


        return new ReviewCollection($ratings);



    }

    public function addRatingOnBook($id, Request $request)
    {

        $book = Book::findOrFail($id);
        //   $ratings_user = Review::where('book_id', $book->id)->where('user_id', 1)->first();

        //    if ($ratings_user) {
        //     $ratings_user->delete();
        //  }


        $rating = new Review();
        $rating->user_id = auth()->user()->id;
        $rating->book_id = $book->id;

        $rating->rating = $request->review;
        $rating->save();


        //  $rating = Review::create(['book_id' => $book->id, 'rating' => $request->rating, 'user_id' => auth()->user()->id, 'comment' => $request->comment]);
        // $currentRating = round(($ratings->sum('rating') + $rating->rating) / ($ratings->count() + 1), 2) . ' / 5 (' . ($ratings->count() + 1) . 'reviews)';

        return new ReviewResource($rating);


    }



}