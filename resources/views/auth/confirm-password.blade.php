@extends('layouts.auth')

@section('content')
<div class="login-form">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Confirm Password</h1>
    </div>
    <div class="text-center">
        <p>This is a secure area of the application. Please confirm your password before continuing.</p>
    </div>
    <hr>
    @if (session()->has('status'))
        <div class="alert alert-success">
            {{session()->get('status')}}
        </div>
    @endif
    <form class="user" action="{{ route('password.confirm') }}" method="POST">
        @csrf
      <div class="form-group">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="passwordHelp"
            placeholder="Enter Password" name="password" value="{{ old('password') }}" required autofocus>
        @error('password')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Confirm Password</button>
      </div>
    </form>
</div>
@endsection
