@extends('layouts.auth')

@section('content')
<div class="login-form">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
    </div>
    <form class="user" action="{{ route('password.update') }}" method="POST">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp"
            placeholder="Enter Email Address" name="email" value="{{ old('email', $request->email) }}" required autofocus>
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
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </div>
    </form>
</div>
@endsection