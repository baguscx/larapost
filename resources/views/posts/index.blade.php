@extends('layouts.app')
@section('title', 'LaraPost Home')
@section('content')    
    <h3 class="my-3">LaraPost</h3>
    <a href="{{url('posts/create')}}" class="my-3 btn btn-success">Add Post</a>
    @foreach ($posts as $post)
        <div class="card my-2">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $post->title }}
                </h5>
                <p class="card-text">
                    {{ date("d F Y - H:i", strtotime($post->updated_at)) }}
                </p>
                <div class="card-text">
                    {{ $post->content }}
                </div>
                <div class="card-text mt-3">
                    <a href="{{ url('posts/'.$post->slug) }}" class="btn btn-primary">Details</a>
                    <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection