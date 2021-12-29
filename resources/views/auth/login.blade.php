@extends('layouts.auth')

@section('content')
<div class="login-form">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Login</h1>
    </div>
    @if (session()->has('status'))
        <div class="alert alert-success">
            {{session()->get('status')}}
        </div>
    @endif
    <form class="user" action="{{ route('login') }}" method="POST">
        @csrf
      <div class="form-group">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp"
            placeholder="Enter Email Address" name="email" value="{{ old('email') }}" required autofocus>
        @error('email')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
        @error('password')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
          <input type="checkbox" class="custom-control-input" id="remember" name="remember">
          <label class="custom-control-label" for="remember">Remember
            Me</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>
      {{-- <hr>
      <a href="index.html" class="btn btn-google btn-block">
        <i class="fab fa-google fa-fw"></i> Login with Google
      </a>
      <a href="index.html" class="btn btn-facebook btn-block">
        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
      </a> --}}
    </form>
    <hr>
    <div class="text-center">
      <a class="font-weight-bold small" href="{{ route('register') }}">Create an Account!</a>
    </div>
    <div class="text-center">
    </div>
</div>
@endsection