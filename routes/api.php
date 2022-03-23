<?php

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::get('/get-frindes/{id}', 'UserController@getFriendUser');






Route::middleware('auth:api')->group(function () {
    Route::get('auth-user', 'AuthUserController@show');
    Route::post('/quote/delete/{id}','PostController@deleteQuote');
    Route::post('/favorites/{id}','PostController@addFavritesQuote');

    Route::get('/favorites-user/{id}/', 'PostController@getFavritesUser');

    Route::get('/book/{id}', 'BookController@showBook');


    Route::get('/books', 'BookController@getBooks');
    Route::get('/get-books', 'BookController@getAllBooks');

    Route::get('/user-auth','UserController@getUserAuth');
    Route::post('/settings', 'UserController@saveAccountInformation');
    Route::get('/get-users', 'UserController@getUsers');


    Route::get('/get-requests', 'UserController@getPendings');
    Route::get('/get-strar-ratings/{id}', 'BookController@getStarRating');
    Route::get('/get-favorites-book/{id}/','BookController@getFavritesBook');
    Route::get('/get-rating-book/{id}', 'BookController@getRatingBook');
    Route::post('/favorites-book/{id}','BookController@addFavritesBook');



    Route::post('/add-rating/{id}','BookController@addRatingOnBook');

    Route::get('/get-rating/{id}', 'BookController@getRating');


   // Route::get('/favorites-user/{id}/', 'PostController@getFavritesUser');

    Route::post('/favorites-delete/{id}/', 'PostController@deleteFavritesQuote');

    Route::apiResources([
        '/posts' => 'PostController',
        '/posts/{post}/like' => 'PostLikeController',
        '/posts/{post}/comment' => 'PostCommentController',
        '/users' => 'UserController',
        '/users/{user}/posts' => 'UserPostController',
        '/friend-request' => 'FriendRequestController',
        '/friend-request-response' => 'FriendRequestResponseController',
        '/user-images' => 'UserImageController',
       // '/books'=> 'BookController',
    ]);

});