@extends('layouts.auth')

@section('card')
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
@endsection

@section('header')
<h4>Register</h4>
@endsection

@section('container')
<form action="/register" method="POST">
  @csrf
    <div class="row">
      <div class="form-group col-12">
        <label for="name">Nama</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    
    <div class="row">
      <div class="form-group col-6">
          <label for="email">Email</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email">
          @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group col-6">
        <label for="is_admin" class="d-block">Admin Privilege</label>
        <select id="is_admin" type="text" class="form-control" name="is_admin">
          <option value="1">Admin</option>
          <option value="0">Manager</option>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-6">
        <label for="password" class="d-block">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group col-6">
        <label for="password_confirmation" class="d-block">Konfirmasi Password</label>
        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
        @error('password_confirmation')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>

    <div class="form-group">
        <a href="/login">Login</a>
        <span>Jika sudah punya akun</span>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block">
        Register
      </button>
    </div>
  </form>
@endsection