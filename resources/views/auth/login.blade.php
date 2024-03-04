@extends('layouts.app')
@section('title', 'login')
@section('content')

<div class="row">
    <div class="col-md-4">
    </div>
    <div class="card col-md-4">
        <div class="card-body">
            <div class="text-center">Login</div>
            @if(session()->has('error_message'))
                <div class="alert alert-danger">
                    {{session()->get('error_message')}}
                </div>
            @endif
            <form class="form-control" action="{{url('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

@endsection