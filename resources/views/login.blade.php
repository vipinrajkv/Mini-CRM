@extends('main_layout')
@section('content')
<div class="login-form">
    <div class="main-div">
        <div class="panel">
            <h2>Admin Login</h2>
            <p>Please enter your email and password</p>
        </div>
        <form  method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input type="email" name="email"  class="form-control"
                    placeholder="Email Address"></input>
                    @error('email') 
                    <span class='text-danger'>{{ $message }}</span>
                    @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password"  class="form-control"
                    id="inputPassword" placeholder="Password"></input>
                    @error('password') 
                    <span class='text-danger'>{{ $message }}</span>
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>

        </form>
    </div>
    <p class="botto-text"> </p>
</div>
@stop