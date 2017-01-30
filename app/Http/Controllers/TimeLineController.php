<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Auth;

class TimeLineController extends Controller
{
    public function index()
    {
        $followings = Auth::user()->following()->pluck('username');
        $cannot_follow = clone $followings;
        $cannot_follow->push(Auth::user()->username);
        //dd($followings);
        $not_following_users = DB::table('users')
            ->whereNotIn('username', $cannot_follow)
            ->get()->pluck('username');
        return view('home')->with([
            'following' => $followings,
            'not_following' => $not_following_users
        ]);
    }
}
