@extends('layouts.app')  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <h1>All Tweets</h1> 
         <label   >filter</label>
         <select class="form-control" name="sort_by">
             <option value="created_at">newest</option>
             <option value="created_at">commentable</option>
             <option value="like">likeable</option>
         </select>
             @guest
            <div class="alert alert-info">
                <strong>Notice!</strong> Login first to perform any activity
                @endguest
              </div> <a href="{{ route('post.create') }}" class="btn btn-success" style="float: right">Create Post</a>
            
            @if (session()->has('message'))
            <div  style="background-color: green">
                {{ session('message') }}
            </div>
            @endif
            <a  href="{{ route('profile.index') }}" class="btn btn-primary" style="font-size:30px"><span style='font-size:30px;'>&#11088;</span>Profile</a>
            <table class="table table-bordered">
                <thead>
                    <th width="80px">title</th>
                    <th width="1350px">body</th>
                    <th width="1350px">comments</th>
                    <th width="250px">like</th>
                    <th width="150px">dislike</th>
                    <th width="250px"> your idea </th>
                    <th style="color: red" width="150px">Reports</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    
                    <td>  </td>
                    
                    <td
                    class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200 ">
                    <form action="{{ route('like.post', $post->id) }}"
                        method="post">
                        @csrf
                        <button
                            class="{{ $post->liked() ? 'bg-blue-600' : '' }} px-4 py-2 text-black bg-gray-400">
                            like 
                        </button>
                    </form>

                </td>
                <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">
                                                        <form action="{{ route('unlike.post', $post->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button
                                                                class="{{ $post->liked() ? 'block' : 'hidden'  }} px-4 py-2 text-black bg-red-400">
                                                                unlike
                                                            </button>
                                                        </form>
                                                    </td>
                    <td>
                        <a href="{{route('comment.create',$post->id)}}" class="btn btn-info">reply</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning">report</a>
                    </td>
                </tr>
                @endforeach
          
                </tbody>
   
            </table>
           
        </div>
    </div>
</div>

@endsection