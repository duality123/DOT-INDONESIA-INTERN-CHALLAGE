@extends('base')

@section('content')
<div class="container" style="margin-left: 450px;"><br>
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center">Login</h3>
            <hr>
            @if(session()->has('loginError'))
            <div class="alert alert-danger">
                {{session('loginError')}}
            </div>
            @endif
            <form action="/autentikasi" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="name" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                <hr>
            </form>
        </div>
    </div>
@stop