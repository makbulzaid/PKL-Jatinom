@extends('index')


@section('home')
    class=active
@endsection

@section('judul')
    Selamat Datang!
@endsection

@section('content')

<div id="flash-data" class="alert alert-info alert-dismissible fade show" role="alert">
    Welcome back, <strong>{{ (Auth::user()->name) }}</strong>! 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>

@endsection