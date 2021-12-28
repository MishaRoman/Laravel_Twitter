<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\LikesController;

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('sorted', [HomeController::class, 'sorted'])->name('sorted');
Route::get('liked', [LikesController::class, 'index'])->name('liked');

Route::get('profiles/{username}', [ProfilesController::class, 'index'])->name('profiles.index');
Route::get('profiles/{username}/sorted', [ProfilesController::class, 'sorted'])->name('profiles.sorted');
Route::patch('profiles/{user}', [ProfilesController::class, 'update'])->name('profiles.update');
Route::get('profiles/{username}/edit', [ProfilesController::class, 'edit'])->name('profiles.edit');

Route::post('/follow/{user}', [FollowsController::class, 'store']);
Route::post('/like/{post}', [LikesController::class, 'store']);

Route::get('posts/trashed', [PostsController::class, 'trashed'])->name('posts.trashed');
Route::post('posts/restore/{postId}', [PostsController::class, 'restore'])->name('posts.restore');
Route::resource('posts', PostsController::class);