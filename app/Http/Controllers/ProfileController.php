<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Conner\Likeable\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function __constract(){

    return $this->middleware('auth');
    }




    public function index(Request $request)
    {
    
   
      $user_id = auth()->user()->id;
        $posts = User::find($user_id)->posts;
       
        return view('profile.index',compact('posts'));

    }
}
