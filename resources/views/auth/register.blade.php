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
            <form class="form-control" action="{{url('register')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="name" name="name" class="form-control">
                    @if($errors->has('name'))
                        <div class="text-danger">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                    @if($errors->has('email'))
                        <div class="text-danger">
                            {{$errors->first('email')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                    @if($errors->has('password'))
                        <div class="text-danger">
                            {{$errors->first('password')}}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Confirmation Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

@endsection