@extends('layouts.auth')

@section('content')
    <div class="login-form">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Register</h1>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="employee_id" value="{{ $employee_id }}">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    placeholder="Enter Username" name="username" value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    aria-describedby="emailHelp" placeholder="Enter Email Address" name="email"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    placeholder="Password" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            {{-- <hr>
      <a href="index.html" class="btn btn-google btn-block">
        <i class="fab fa-google fa-fw"></i> Register with Google
      </a>
      <a href="index.html" class="btn btn-facebook btn-block">
        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
      </a> --}}
        </form>
        <hr>
        <div class="text-center">
            <a class="font-weight-bold small" href="{{ url('login') }}">Already have an account?</a>
        </div>
        <div class="text-center">
        </div>
    </div>
@endsection
