<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{

    public function create()
    {
        return view('comment.create');
   
    }




    public function store(Post $post)
    {
        
    
        
        Comment::create([ "user_id" => auth()->user()->id,
        "post_id" => $post->id,
       "body" => request("body") ]);
        
   
        return redirect('/profile')->with('message','Your command has been executed!');
    }
   
}
