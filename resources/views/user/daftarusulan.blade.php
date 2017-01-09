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
                <li class="active"><a href="#desain_industri" data-toggle="tab">Daftar Pengajuan</a></li>
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
                          Jenis Usulan
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
                      <?php $c =1; ?>
                      @foreach($data as $d)
                      <tr>
                        <td>{{ $c++ }}</td>
                        <td>{{ $d['judul']}}</td>
                        <td>{{ $d['jenis']}}</td>
                        <td>{{ $d['tanggal']}}</td>
                        <td>{{ $d['status']}}</td>
                        <td>
                          @if($d['jenis']  == 'Paten' )
                            <a href="/pengajuan-paten/{{$d['id']}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                          @elseif($d['jenis'] == 'Desain Industri')
                            <a href="/pengajuan-industri/{{$d['id']}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                          @endif
                          <a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                        </td>
                      </tr>
                      @endforeach
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
