<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = auth()->user()->likedPosts()->with('user.profile')->withCount('likes', 'comments')->get();

        return view('posts.liked', compact('posts'));
    }

    public function store(Post $post)
    {
        return auth()->user()->likedPosts()->toggle($post->id);
    }
}
