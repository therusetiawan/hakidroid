@extends('layouts.userlayout')

@section('title','Halaman Ajuan HAKI')

@section('header')
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">

  <style media="screen">
    body {
      background-color: #ecf0f5;
    }
  </style>
@endsection

@section('content')

  <div class="container">

    <div class="content-header">
      <h2>Daftar Pengajuan Hak Kekayaan Intelektual</h2>
    </div>

    <div class="row">
      <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#desain_industri" data-toggle="tab">Desain Industri</a></li>
                <li><a href="#hak_paten" data-toggle="tab">Hak Paten</a></li>
                <li><a href="#hak_merk" data-toggle="tab">Hak Merk</a></li>
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
              </ul>
              <div class="tab-content">
                {{-- Hak Desain Industri --}}
                <div class="tab-pane active" id="desain_industri">
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
                          <a href="{{ url('/ajuan/edit/industri') }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
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
                <!-- /.tab-pane -->

                {{-- Hak Paten Tab --}}
                <div class="tab-pane" id="hak_paten">
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
                          <a href="{{ url('/ajuan/edit/paten') }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
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

                <div class="tab-pane" id="hak_merk">
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
                          <a href="{{ url('/ajuan/edit/paten') }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
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
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
    </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/js/dataTables.bootstrap.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.table').dataTable({
        "lengthChange": false,
        "searching": false
      });
    });
  </script>
@endsection
