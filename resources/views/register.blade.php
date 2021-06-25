@extends('base')

@section('title')
<title>Register</title>    
<link rel="stylesheet" href="{{asset('css/login.css')}}">    
@endsection

@section('content')
<body class="login-page">
    <main>
      <div class="login-block">
        <h1>Register An Account</h1>
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <ul>
          @foreach ($errors->all() as $error)
            <li><strong>{{$error}}</strong></li>
          @endforeach
          </ul>
        </div>
        @endif
        <form action="/register" method="POST">
          @csrf
          <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user ti-user"></i></span>
                <input type="text" class="form-control" placeholder="Your name" name="name">
            </div>
          </div>
              
          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope ti-email"></i></span>
              <input type="email" class="form-control" placeholder="Your Email" name="email">
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock ti-unlock"></i></span>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock ti-unlock"></i></span>
              <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword">
            </div>
          </div>

          <button class="btn btn-block" type="submit">Register Now</button>

        </form>
        <br>
        <div class="login-links">
            <p class="text-center">Already have an account? <a class="txt-brand" href="/login">Login</a></p>
          </div>
      </div>
</main>
@endsection