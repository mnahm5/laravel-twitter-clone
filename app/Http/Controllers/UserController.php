<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        if (Auth::user()->isNot($user))
        {
            $my_followings = Auth::user()->following()->pluck('username');
            $followings = $user->following()->pluck('username');
            $followers = $user->followers()->pluck('username');
            $followers_that_i_follow = array();
            $followers_that_i_dont_follow = array();
            //dd($followings[0] == Auth::user()->username);
            foreach ($followers as $follower)
            {
                $found = false;
                foreach ($my_followings as $my_following)
                {
                    if ($follower == $my_following)
                    {
                        array_push($followers_that_i_follow, $follower);
                        $found = true;
                    }
                }
                if ($found == false && $follower !== Auth::user()->username)
                {
                    array_push($followers_that_i_dont_follow, $follower);
                }
            }

            $followings_that_i_follow = array();
            $followings_that_i_dont_follow = array();
            foreach ($followings as $following)
            {
                $found = false;
                foreach ($my_followings as $my_following)
                {
                    if ($following == $my_following)
                    {
                        array_push($followings_that_i_follow, $following);
                        $found = true;
                    }
                }
                if ($found == false && $following !== Auth::user()->username)
                {
                    array_push($followings_that_i_dont_follow, $following);
                }
            }


            return view('users.index')->with([
                'user' => $user,
                'following' => $followings,
                'followers_that_i_follow' => $followers_that_i_follow,
                'followers_that_i_dont_follow' => $followers_that_i_dont_follow,
                'followings_that_i_follow' => $followings_that_i_follow,
                'followings_that_i_dont_follow' => $followings_that_i_dont_follow
            ]);
        }
        else
        {
            $followings = Auth::user()->following()->pluck('username');
            $followers = Auth::user()->followers()->pluck('username');
            $followers_that_i_follow = array();
            $followers_that_i_dont_follow = array();
            foreach ($followers as $follower)
            {
                $found = false;
                foreach ($followings as $following)
                {
                    if ($follower == $following)
                    {
                        array_push($followers_that_i_follow, $follower);
                        $found = true;
                    }
                }
                if ($found == false)
                {
                    array_push($followers_that_i_dont_follow, $follower);
                }
            }

            return view('users.index')->with([
                'user' => $user,
                'following' => $followings,
                'followers_that_i_follow' => $followers_that_i_follow,
                'followers_that_i_dont_follow' => $followers_that_i_dont_follow
            ]);
        }
    }

    public function follow(Request $request, User $user)
    {
        if ($request->user()->canFollow($user))
        {
            $request->user()->following()->attach($user);
        }
        return redirect()->back();
    }

    public function unFollow(Request $request, User $user)
    {
        if ($request->user()->canUnFollow($user))
        {
            $request->user()->following()->detach($user);
        }
        return redirect()->back();
    }
}
