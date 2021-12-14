<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfilesRequest;

class ProfilesController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();

        return view('profiles.index', compact('user', 'posts'));
    }

    public function sorted($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $posts = $user->posts()->orderBy('created_at', 'asc')->get();

        return view('profiles.index', compact('user', 'posts'));
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);
        
        $user->profile->update($request->all());
        return redirect("profiles/{$user->username}");
    }
}
