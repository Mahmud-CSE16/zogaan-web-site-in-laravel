@if (Cookie::get('remember') !== null)
<?php
   header("location: /home");
   ?>
@endif


@extends('layouts.welcome')


@section('content')

<h1 class="text-center mt-5">Welcome to Zogaan</h1>
@if(session('status'))
 <h6 class="text-center">{{session('status')}}</h6>
@endif
@if(session('name'))
  <h6 class="text-center">{{session('id')}}</h6>
  <h6 class="text-center">{{session('name')}}</h6>
  <h6 class="text-center">{{session('email')}}</h6>
  <h6 class="text-center">{{session('role')}}</h6>
@endif


@stop