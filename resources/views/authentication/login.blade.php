
@extends('layouts.registration')


<?php $error = ""; ?>

@section('content')

<div class="row">
    <div class="col-sm-10 m-auto">
        <div class="row">
            <div class="col-sm-5 register-left">
                <div class="down"><i class="fas fa-caret-down"></i></div>
                <h3>Join Us</h3>
                <p>Make your daily life much easier.</p>
                <button type="button" class="btn btn-primary">About Us</button>
            </div>
            <div class="col-sm-7 register-right">
                <h2>LogIn Here</h2>
                <span class="error ml-4"><small><?php echo $error ?></small></span>
                <div class="register-form pl-4">
                    <form action="{{route('auth.login')}}" method="POST">
                       @csrf
                        <div class="form-group">
                            <input type="email" class="form-control d-inline" name="email" placeholder="Enter your email" required>
                            <span class="error">*</span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control d-inline" name="password" placeholder="Enter your password"required>
                            <span class="error">*</span>
                        </div>
                        <div>
                            <input type="checkbox" class="d-inline" style="width: 20px" name="remember" value="remember" checked>Remember Me
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Log In</button>
                        <button class="btn btn-primary w-50"><a href="/registration">Create New Account</a></button>
                   </form>
                </div>		
            </div>
        </div>
    </div>
</div>


@stop