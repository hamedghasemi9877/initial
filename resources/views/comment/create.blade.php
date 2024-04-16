@extends('layouts.app')
   
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Write your comment...</div>
                <div class="card-body">
                    <form method="post" action="{{route('comment.store')}}">
                        <div class="form-group">
                            @csrf
                           
                        <div class="form-group">
                           
                            <textarea name="body" rows="10" cols="30" placeholder="..." class="form-control" ></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection