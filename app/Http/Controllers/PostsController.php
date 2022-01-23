<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostsRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');
        }

        auth()->user()->posts()->create([
            'text' => $request['text'],
            'image' => $imagePath ?? NULL,
        ]);

        return redirect('profiles/' . auth()->user()->username);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        session()->flash('warning', 'Твит удален');
        return redirect()->back();
    }

    public function trashed()
    {
        $user = auth()->user();
        $posts = Post::onlyTrashed()->where('user_id', $user->id)->get();

        return view('posts.trashed', compact('posts'));
    }

    public function restore($postId)
    {
        $post = Post::withTrashed()->where('id', $postId)->firstOrFail();

        $this->authorize('restore', $post);
        $post->restore();

        session()->flash('success', 'Твит восстановлен');
        return redirect()->back();
    }

    public function deletePermanently($postId) {
        $post = Post::withTrashed()->where('id', $postId)->firstOrFail();

        $this->authorize('restore', $post);
        $post->forceDelete();

        session()->flash('warning', 'Твит удален навсегда');
        return redirect()->back();
    }
}
