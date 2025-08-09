<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user:id,name')->latest()->get();
        return response()->json($posts);
    }

    public function show(Post $post)
    {
        return response()->json($post->load('user:id,name'));
    }
}