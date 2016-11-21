@extends('layouts.userlayout')

@section('header')
  <style media="screen">
    body {
      background-color: #ecf0f5;
    }
  </style>
@endsection

@section('content')
  <div class="container">
    <div class="col-sm-12" style="height: 100vh; display: flex; align-items: center; text-align: center;">
      <h1 class="text-center" style="width: 100%; color: rgb(78, 78, 78)">Beranda</h1>
      {{-- <p>
        <a href="{{url('/usulan/new')}}">Pengajuan HAKI Baru</a> |
        <a href="{{url('/usulan/pengajuan')}}">Pengajuan HAKI Baru</a>
      </p> --}}
    </div>

  </div>
@endsection
