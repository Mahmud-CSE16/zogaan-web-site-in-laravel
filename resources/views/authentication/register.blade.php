
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
                <h2>Register Here</h2>
                <span class="error ml-4"><small><?php echo $error ?></small></span>
                <div class="register-form pl-4">
                   
                    <form action="{{route('auth.register')}}" method="POST">
                       @csrf
                        @if(count($errors)>0)
                           <div class="alert alert-danger" style=" width: 90%; border-radius:1.5rem">
                           @foreach($errors->all() as $error)
                              <p style="padding:0px; margin:0px;">{{$error}}</p>
                           @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control d-inline" name="name" placeholder="Enter your name" value="{{old('name')}}" required>
                            <span class="error">*</span>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control d-inline" name="email" placeholder="Enter your email" value="{{old('email')}}" required>
                            <span class="error">*</span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control d-inline" name="phone_no" placeholder="Enter your phone no." value="{{old('phone_no')}}" required>
                            <span class="error">*</span>
                        </div>
                        
                        <div class="form-group ml-3">
                           <label for="area" style="color: #000;">Live in Or Work Zone</label>
                           <select name="area_id" id="area" required>
                             <option value=''>Select Option</option>
                             @foreach($areas as $area)
                                <option value='{{$area->id}}'>{{$area->area_name}}</option>
                             @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control d-inline" name="address" placeholder="Enter your address" value="{{old('address')}}" required>
                            <span class="error">*</span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control d-inline" name="password" placeholder="Enter your password"required>
                            <span class="error">*</span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control d-inline" name="password_confirmation" placeholder="Confirm Password"required>
                            <span class="error">*</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <button class="btn btn-primary w-50 abc"><a href="/login">Already have an Account</a></button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop