<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CountLikeController;

Auth::routes();




//related to ProfileController
Route::get('profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');
//---------------------------------------------------------------------------------------------------------------------



//related to PostController

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('posts', [PostController::class, 'create'])->middleware('auth')->name('post.create');
Route::post('posts', [PostController::class, 'store'])->middleware('auth')->name('post.store');
Route::get('posts/{post}/edit', [PostController::class,'edit'])->middleware('auth')->name('post.edit');
Route::put('posts/{post}/update', [PostController::class, 'update'])->middleware('auth')->name('posts.update');
Route::delete('posts/{post}/delete', [PostController::class, 'destroy'])->middleware('auth')->name('posts.destroy');

//related to Like/dislike

Route::post('/like-post/{id}',[PostController::class,'likePost'])->middleware('auth')->name('like.post');
Route::post('/unlike-post/{id}',[PostController::class,'unlikePost'])->middleware('auth')->name('unlike.post');
//---------------------------------------------------------------------------------------------------------------------

//related to CommentController

Route::get('comments/create', [CommentController::class, 'create'])->middleware('auth')->name('comment.create');
Route::post('comments/store', [CommentController::class, 'store'])->name('comment.store');

//--------------------------------------------------------------------------------------------------------------------- 

