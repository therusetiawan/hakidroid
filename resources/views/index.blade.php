@extends('master')

@section('title','Beranda')

@section('content')
  <div class="container">
    <div class="row">

      {{-- Profil Panel --}}
      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
                <img class="img-responsive" src="{{ URL::asset('img/Batman.jpg') }}" alt="" />
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <b>Bat Affleck</b><br>
              </div>
              <div class="col-sm-12">
                <b>145202410578</b><br>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- Akhir Profil Panel --}}
      <div class="col-sm-9">
        <h3>HakiDroid</h3>
        <ul>
          <li>Panduan Haki</li>
          <li><a href="#">Pendaftaran Ciptaan</a></li>
          <li><a href="#">Pendaftaran Desain Industri</a></li>
          <li><a href="#">Pendaftaran Merk</a></li>
          <li><a href="#">Pendaftaran Paten</a></li>
          <li><a href="#">Pendaftaran Paten</a></li>
        </ul>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
    </div>
  </div>
@endsection
