<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <style>
    .navbar-custom {
    background-color: #6f42c1;
    }
    /* change the brand and text color */
    .navbar-custom .navbar-brand,
    .navbar-custom .navbar-text {
    color: #ffffff;
    }
    /* change the link color */
    .navbar-custom .navbar-nav .nav-link {
    color: #ffffff;
    }
    /* change the color of active or hovered links */
    .navbar-custom .nav-item.active .nav-link,
    .navbar-custom .nav-item:hover .nav-link {
    color: #ffffff;
    }
    body {
      background-color: #e5e7ed !important;
    }
    .btn {
      color: #fff;
      background-color: #6f42c1;
    }
    .btn:hover{
      background-color: #fff;
      color: #6f42c1;
      border-color: #6f42c1;
    }
    .fabutton {
      background: none;
      padding: 0px;
      border: none;
    }
    </style>
    @yield('title')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-custom">
        <!-- Brand -->
        <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Hi, {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
            @endif
          </ul>
        </div>
        </div>
      </nav>
    @include('alert')
    @yield('content')
</body>
<script>
  $(document).ready(function(){
    setTimeout(function() {
    $("#idfail").fadeOut(7000);
    });

    setTimeout(function() {
    $("#idsuccess").fadeOut(7000);
    });
  })
</script>
</html>