<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfilesRequest;

class ProfilesController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->with('posts', 'profile')->withCount('following')->firstOrFail();

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', compact('user', 'follows'));
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

        $data = $request->validate([
            'url' => 'nullable|url',
            'image' => 'nullable|image',
        ]);
        
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("profiles/{$user->username}");
    }
}
