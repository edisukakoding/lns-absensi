@extends('layouts.auth')

@section('content')
<div class="login-form">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Login</h1>
    </div>
    <div class="text-center">
        <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
    </div>
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif
    <form class="user" action="{{ route('verification.send') }}" method="POST">
        @csrf
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Resend Verification Email</button>
      </div>
    </form>
    <hr>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <div class="text-center">
          <button type="submit" class="btn small">Logout</button>
        </div>
    </form>
</div>
@endsection