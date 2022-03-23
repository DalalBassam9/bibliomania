<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use App\Post;
use App\User;
use App\Friend;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return new UserResource($user);
    }
    public function getUsers()
    {
        //$users=  User::with('')->where('id', '!=', request()->user()->id);
        return  UserResource::collection(User::where('id', '!=', request()->user()->id)->get());

    }

    public function getFriendUser($id)
    {

   $user=User::find($id);
        //  $friends= $user->friends()->get();


        // $friends = Friend::with(['users.profileImage'])->whereNotNull('confirmed_at')

        //   ->orWhere('friend_id', $id)
        //   ->get();


        //$friends = Friend::friendships($id);


        //$users= User::whereIn('id', [$friends->pluck('user_id')])
        // ->get();

       //$user_name= $user->load('images');

      // return response([
          //   'users' => $user->friendships(),

          // ]);

           $users=$user->friendships();

        return response()->json([
            'users' => $users,

        ], 200);

          //  $users= $user->friendships();

      // return  new UserCollection($users);

    }

    public function getPendings()
    {


    //$user = User::find($id);

        $pendings = request()->user()->pending_friend_requests();

      return  response()->json([
            'pendings' => $pendings
        ], 200);


    }



    public function getUserAuth(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ], 200);
    }

    public function saveAccountInformation(Request $request)
    {

        /*   $data = request()->validate(['name'=>'' ,
               'email' =>'',
               'image' => '',


           ]);
        */

        $user=$request->user()->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'bio'           => $request->bio
        ]);



        return response()->json([
            'user' => $user,

        ], 200);
    }





}