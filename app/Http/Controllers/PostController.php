<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

   

    public function index() {
        
        $posts = Post::all();

        
        return view('post.index')->with('posts',$posts);


        // $posts = $post->sort($request->all());


        // return view('pody.index',$posts);
}


//LIKE SERVICES

public function likePost($id)
    {
        $post = Post::find($id);
        $post->like();
        $post->save();

        return redirect()->route('index')->with('message','Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();
        
        return redirect()->route('index')->with('message','Post unliked!');
    }
    public function comment($id)
    {
        $post = Post::find($id);
        $post->comment;
        $post->save();
        
        return redirect()->route('index')->with('message','Post unliked!');
    }





//Other Methods...

    public function create()
    {
        return view('post.create');
    }




    
    

    public function store(Request $request)
    {
    	$request->validate( [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
       
        $post['user_id'] = auth()->user()->id;
      
        $post->save();
        
        
        return redirect('/profile')->with('message','Your command has been executed!');
    }






    public function edit(Post $post)
    {

        return view('post.edit', compact('post'))->with('message','Your command has been executed!');
    }







    public function update(Request $request,post $post)
    {
       
  $post->update($request->all());

      
        return redirect('/profile')->with('message','Your command has been executed!');
    }




    public function destroy(Post $post)
    {
       
         $post->delete();

      
        return redirect()->back()->with('message','Your command has been executed!');
    }




    
  
}