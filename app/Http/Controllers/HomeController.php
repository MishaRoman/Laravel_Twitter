<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('user')->withCount('likes')->latest()->get();
        return view('index', compact('posts'));
    }

    public function sorted()
    {
        $posts = Post::with('user')->withCount('likes')->oldest()->get();
        return view('index', compact('posts'));
    }
}
