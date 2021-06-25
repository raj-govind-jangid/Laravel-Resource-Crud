@extends('base')

@section('title')
<title>Login</title>
<link rel="stylesheet" href="{{asset('css/login.css')}}">    
@endsection

@section('content')
<body class="login-page">
    <main>
      <div class="login-block">
        <h1>Log In Your Account</h1>
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
        <form action="/login" method="POST">
          @csrf
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope ti-email"></i></span>
              <input type="text" class="form-control" placeholder="Your Email" name="email">
            </div>
          </div>
          
          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock ti-unlock"></i></span>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
          </div>

          <button class="btn btn-block" type="submit">Login In</button>

        </form>
        <br>
        <div class="login-links">
            <p class="text-center">Don't Have an Account? <a class="txt-brand" href="/register"> Create an account</a></p>
          </div>
      </div>
</main>
@endsection