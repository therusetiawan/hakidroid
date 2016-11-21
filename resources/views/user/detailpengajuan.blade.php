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
    <h2>Detail Usulan</h2>
    <div class="row">
      <div class="col-sm-4">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Gambar Karya</h3>
          </div>
          <img src="{{asset('web.jpg')}}" class="img-responsive" alt="" />
        </div>
      </div>
      <div class="col-sm-8">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Detail Karya</h3>
          </div>
          <div class="box-body">
            <table class="table table-striped">
              <tr>
                <td>Judul</td>
                <td>MonstUNY - Web Browser Khusus UNY</td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td>Software</td>
              </tr>
              <tr>
                <td>Jenis</td>
                <td>PKM</td>
              </tr>
              <tr>
                <td>Inovasi</td>
                <td>Baru</td>
              </tr>
              <tr>
                <td>Status</td>
                <td>Belum Terverifikasi</td>
              </tr>
            </table>
          </div>
        </div>

          <div class="box box-primary"  style="margin-top: 10px">
            <div class="box-header">
              <h3 class="box-title">Detail Pengusul</h3>
            </div>
            <div class="box-body">
              <table class="table table-striped">
                <tr>
                  <td>Nama</td>
                  <td>Anjasmoro Adi Nugroho</td>
                </tr>
                <tr>
                  <td>Identitas</td>
                  <td>Mahasiswa</td>
                </tr>
                <tr>
                  <td>No. Identitas</td>
                  <td>14520241057</td>
                </tr>
              </table>
            </div>
        </div>

        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Detail Pembaruan</h3>
          </div>
          <div class="box-body">
            <ol>
              <li>Lorem</li>
              <li>Ipsum</li>
              <li>Dolor sit amer</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
