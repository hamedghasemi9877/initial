@extends('layouts.app')
@section('content')
@if (session()->has('message'))
<div  style="background-color: rgb(202, 200, 176)"  style="box-shadow: coral">
  {{ session('message') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <a href="{{ route('post.create') }}" class="btn btn-success" style="float: right">New Tweet</a>
            
            @if(count($posts)>0)
            <h1 style="background-color: rgb(69, 75, 159)">Your Tweets</h1>
            <table class="table table-bordered">
                <thead>
                    <th width="50px">title</th>
                    <th  width="1350px">body</th>
                    <th width="1350px">edit</th>
                    
                    <th width="1350px">delete tweets</th>
                    
                       
                  
                </thead>
                
                <tbody>
            


                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td><a href="/posts/{{$post->id}}/edit">EDIT</a></td>
                    <td ><form action="/posts/{{$post->id}}/delete" method="POST">
                        @csrf
                        @method('delete')
                          <input style="color: red" type="submit" value="delete">
                        </form> </td>
                   
                  
                </tr>
                @endforeach
                </tbody>
               
   
            </table>
            @else
            <h1 style="background-color: rgb(215, 158, 167)">you have no posts</h1>
            @endif
        </div>
    </div>
</div>

@if(count($posts)>0)

<div class="container">
    <div class="row justify-content-center">
<h1 style="background-color: rgb(143, 146, 181)">Profile Details</h1>
            <table class="table table-bordered">
                <thead>
                    <th  width="5px">id</th>
                    <th width="5px">title</th>
                    <th  width="5px">total likes</th>
                    <th  width="5px">total comments</th>
                    
              
                       
                  
                </thead>
                
                <tbody>
            


                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{$post->likeCount}}</td>
                    <td>{{$post->commentCount}}</td>
                   
                  
                </tr>
                @endforeach
                </tbody>
               
   
            </table>
        </div>
    </div>
    @endif
@endsection

