@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')    
        <a href="{{url('posts')}}" class="my-3 btn btn-success">⬅️Back</a>
        <h3>Add New Post</h3>
        {{-- @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form class="form-control" action="{{url('posts')}}" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="">Title</label>
                <input type="text" name="title" id="" class="form-control">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="">Content</label>
                <input type="text" name="content" id="" style="height: 5rem" class="form-control">
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary my-2">Post!</button>
        </form>
@endsection