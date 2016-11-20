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
    <h2>Daftar Pengajuan Hak Kekayaan Intelektual</h2>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Judul Karya yang Diajukan</h3>
      </div>
      <div class="box-body">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>
                Judul
              </th>
              <th>
                Kategori
              </th>
              <th>
                Jenis
              </th>
              <th>
                Tanggal
              </th>
              <th>
                Status
              </th>
              <th>
                Operasi
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>MonstUNY - Web Browser Khusus UNY</td>
              <td>Software</td>
              <td>PKM</td>
              <td>27 Oktober 2017</td>
              <td>Belum Terverifikasi</td>
              <td>
                <a href="{{url('/usulan/detail')}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                <a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                <a href="#" class="btn btn-danger"><i class="fa fa-remove"></i></a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Batik droid</td>
              <td>Fashion</td>
              <td>PKM</td>
              <td>25 September 2016</td>
              <td>Terverifikasi</td>
              <td>
                <a href="{{url('/usulan/detail')}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
