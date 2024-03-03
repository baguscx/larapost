@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')    
        <a href="{{url('posts')}}" class="my-3 btn btn-success">⬅️Back</a>
        <h3>Edit Post</h3>
            <form  action="{{url('posts/'.$post->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group my-2">
                    <label for="">Title</label>
                    <input type="text" name="title" id="" class="form-control" value="{{$post->title}}">
                </div>
                <div class="form-group my-2">
                    <label for="">Content</label>
                    <input type="text" name="content" id="" class="form-control" value="{{$post->content}}">
                </div>
                <button type="submit" class="btn btn-primary my-2">Update!</button>
            </form>
            <form action="{{url('posts/'.$post->id)}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete!</button>
            </form>
@endsection

