@extends('layouts.auth')

@section('card')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
  @endsection
  
  @section('header')
  <h4>Login</h4>
  @endsection
  
  @section('container')
  @if (session()->has('success'))
          <div class="alert alert-success" role="alert">
              {{ session('success') }}
          </div>
  @endif
  @if (session()->has('error'))
  <div class="alert alert-danger" role="alert">
      {{ session('error') }}
  </div>
@endif
<form method="POST" action="/login" class="needs-validation" novalidate="">
  @csrf
  <div class="form-group">
    <label for="email">Email</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus value={{ old('email') }}>
    @error('email')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="form-group">
    <div class="d-block">
      <label for="password" class="control-label">Password</label>
      {{-- <div class="float-right">
        <a href="auth-forgot-password.html" class="text-small">
          Lupa Password?
        </a>
      </div> --}}
    </div>
    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
    {{-- <div class="invalid-feedback">
      please fill in your password
    </div> --}}
  </div>

  <div class="form-group">
    <a href="/register">Daftar</a>
    <span>Jika belum punya akun</span>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
      Login
    </button>
  </div>
</form>
@endsection