<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function create(Request $request, Post $post)
    {
        $this->validate($request, [
            'body' => 'required|max:140',
        ]);

        $createdPost = $request->user()->posts()->create([
            'body' => $request->body,
        ]);

        return response()->json($post->with('user')->find($createdPost->id));
    }
}
