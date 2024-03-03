@extends('layouts.app')
@section('title', 'Details Post')
@section('content')    
        <a href="{{url('posts')}}" class="my-3 btn btn-success">⬅️Back</a>
        <div class="card">
            <div class="card-body">
                <h3> {{$post->title}} </h3>
                <p> {{date("H:i - d F Y", strtotime($post->updated_at));}} </p>
                <p> {{$post->content}} </p>
            </div>
        </div>
        @if($total_comments >= 1)
            <div class="small-muted mt-3">{{$total_comments}} Komentar</div>
            @foreach($comments as $comment)
                <div class="card mb-2">
                    <div class="card-body"><small>{{$comment->comment}}</small></div>
                </div>
            @endforeach
        @endif
@endsection

