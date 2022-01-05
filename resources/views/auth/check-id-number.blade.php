@extends('layouts.auth')

@section('content')
<div class="login-form">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Cek Nomor Induk Kependudukan</h1>
    </div>
    <div class="text-center">
        <p>Kami akan memeriksa terlebih dahulu apakah NIK anda sudah terdaftar di database kami. Jika NIK anda sudah terdaftar anda bisa melanjutkan tahap registrasi</p>
    </div>
    <hr>
    @if (session()->has('status'))
        <div class="alert alert-success">
            {{session()->get('status')}}
        </div>
    @endif
    <form class="user" action="{{ route('cek-nik.store') }}" method="POST">
        @csrf
      <div class="form-group">
        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" aria-describedby="nikHelp"
            placeholder="Masukan Nomor Induk Kependudukan" name="nik" value="{{ old('nik') }}" required autofocus>
        @error('nik')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Cek NIK</button>
      </div>
    </form>
</div>
@endsection
