<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(User $user)
    {
        //dd(\Auth::user()->following()->pluck('username'));
        return view('users.index')->with('user', $user);
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
