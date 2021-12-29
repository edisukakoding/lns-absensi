@extends('layouts.auth')

@section('content')
<div class="login-form">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
    </div>
    <div class="text-center">
        <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
    </div>
    <hr>
    @if (session()->has('status'))
        <div class="alert alert-success">
            {{session()->get('status')}}
        </div>
    @endif
    <form class="user" action="{{ route('password.email') }}" method="POST">
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
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>
    </form>
</div>
@endsection
