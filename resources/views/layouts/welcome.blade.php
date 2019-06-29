<!DOCTYPE html>
<html>
<head>
	  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Zogaan</title>

</head>
<body class="start">
	<h1 class="back m-0 text-primary">Zogaan</h1>

    <!-- navbar -->
	<nav class="sticky-top navbar p-0 navbar-light bg-info navbar-expand-md">
        <div class="container">
          <a class="navbar-brand" href="/"><i class="fas fa-network-wired mr-2"></i>Zogaan</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav ml-auto">
                 @if(Auth::check())
                     <li class="nav-item ml-auto">
                          <a class="nav-link" href="{{url('/admin')}}" class="text">Admin</a>
                      </li>
<!--
                      <li class="nav-item ml-auto">
                          <a class="nav-link" href="/home" class="text"><i class="fas fa-sign-in-alt mr-2"></i>Home</a>
                      </li>
-->
                      <li class="nav-item ml-auto">
                          <a class="nav-link" href="{{route('auth.logout')}}"><i class="fas fa-sign-out-alt mr-2"></i>log Out</a>
                          
                      </li>
                 @else
                     <li class="nav-item ml-auto">
                          <a class="nav-link" href="/login" class="text"><i class="fas fa-sign-in-alt mr-2"></i>log in</a>
                      </li>
                      <li class="nav-item ml-auto">
                          <a class="nav-link" href="/registration" class="text"><i class="fas fa-sign-out-alt mr-2"></i>Register</a>
                      </li>
                 @endif
                  <li class="nav-item ml-auto">
                  	<form class="search-box form-inline ml-auto">
	                <input class="search-txt" type="text" placeholder="Search">
	                <button class="btn btn-success search-btn"><i class="fas fa-search mt-1 p-1"></i></button>

	              </form>
                  </li>
                 </ul>
                  
              </div>
          </div>
    </nav>
      
    <div class="container">
       @yield('content');

            

       @yield('footer');

    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
  
</body>
</html>