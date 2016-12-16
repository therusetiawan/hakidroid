@extends('layouts.app')

@section('header')
  <style media="screen">

  </style>
@endsection

@section('content')
  @include('components.indexnavbar')
  <div class="container">
    <div class="row">
      <div class="web-header col-xs-12">
        <img src="{{ asset('/img/gedung-baru.jpg') }}" class="img-responsive" alt="Gedung LPPM UNY">
      </div>
    </div>

    {{-- Berita --}}
    <div class="row">
      <div class="col-sm-8">
        <div class="box box-primary">
          <div class="box-header">
              <h4 class="box-title"><i class="fa fa-newspaper-o"></i> Berita</h4>
          </div>
          <div class="box-body">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="https://uny.ac.id/sites/www2.uny.ac.id/files/styles/thumbberita/public/field/image/WhatsApp%20Image%202016-10-24%20at%2011.35.09.jpeg?itok=sI7X5ArT">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">KREASIKAN “PANGSIT LELE”, YUDI SETIYO JUARA II KREASI PANGAN JAJANAN SEHAT</h4>
                  <p>
                    Yudi Setiyo, mahasiswa Jurusan Pendidikan Teknik Boga, Fakultas Teknik Universitas Negeri Yogyakarta (FT UNY), meraih Juara Kedua Kreasi Pangan Jajanan Sehat Berbahan Dasar Hasil Perikanan dan Kelautan di Graha Cakrawala, yang merupakan...
                  </p>
                  <a href="#">Baca Selengkapnya...</a>
                </div>
              </div>

              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="https://uny.ac.id/sites/www2.uny.ac.id/files/styles/thumbberita/public/field/image/Anggang-anggang%20indikator%20pencemaran%20air.jpg?itok=6AoDSVJX">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">ANGGANG-ANGGANG SEBAGAI BIOINDIKATOR PENCEMARAN AIR SUNGAI</h4>
                  <p>
                    Sungai saat ini masih menjadi kebutuhan sebagian manusia seperti untuk sarana transportasi, pembangkit listrik, sarana irigasi pertanian, dan keperluan rumah tangga untuk minum...
                  </p>
                  <a href="#">Baca Selengkapnya...</a>
                </div>
              </div>

              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="https://uny.ac.id/sites/www2.uny.ac.id/files/styles/thumbberita/public/field/image/Chiang%20Mai%20University.jpg?itok=Dsy2VQJp">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">CHIANG MAI UNIVERSITY AKHIRI PROGRAM ASEAN COMMUNITY FAMILIARIZATION DI UNY</h4>
                  <p>
                    Setelah menjalani Program “ASEAN Community Familiarization” di Universitas Negeri Yogyakarta selama sepuluh hari, akhirnya para mahasiswa Chiang Mai University...
                  </p>
                  <a href="#">Baca Selengkapnya...</a>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="box box-primary">
          <div class="box-header">
            <h4 class="box-title"><i class="fa fa-lock"></i>  Masuk Ke IPON UNY</h4>
          </div>
          <div class="box-body">
              <div class="form-group">
                <label>Email:</label>
                <input type="text" name="" class="form-control" value="">
              </div>
              <div class="form-group">
                <label>Password:</label>
                <input type="password" name="" class="form-control" value="">
              </div>
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary">Login</button>
              </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
