@extends('main_layout')
@section('content')
<div class="login-form">
    <div class="main-div">
        <div class="panel">
            <h2>Register</h2>
            <p>Please enter your email and password</p>
        </div>
        <form  method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputEmail"
                    placeholder="Name"></input>
                    @error('name') 
                    <span class='text-danger'>{{ $message }}</span>
                    @enderror
            </div>
            <div class="form-group">
                <input type="email" name="email" value="{{ old('email') }}"  class="form-control" id="inputEmail"
                    placeholder="Email Address"></input>
                    @error('email') 
                    <span class='text-danger'>{{ $message }}</span>
                    @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password"  class="form-control"
                    id="inputPassword" placeholder="Password"></input>
                <span class='text-danger'></span>
                @error('password')
                <span class='text-danger'>{{ $message }}</span>
                @enderror
            </div>
            <div class="forgot">
                
            </div>
            <button type="submit"  class="btn btn-primary">Submit</button>

        </form>
    </div>
    <p class="botto-text"> </p>
</div>
@stop