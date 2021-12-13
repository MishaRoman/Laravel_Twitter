<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;

Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('profiles/{username}', [ProfilesController::class, 'index'])->name('profiles.index');
Route::patch('profiles/{user}', [ProfilesController::class, 'update'])->name('profiles.update');
Route::get('profiles/{username}/edit', [ProfilesController::class, 'edit'])->name('profiles.edit');

Route::resource('posts', PostsController::class);