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
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('index', compact('posts'));
    }

    public function sorted()
    {
        $posts = Post::orderBy('created_at', 'asc')->get();
        return view('index', compact('posts'));
    }
}
