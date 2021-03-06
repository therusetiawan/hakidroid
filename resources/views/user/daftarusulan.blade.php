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
                        <td>{{ $d['tanggal']->format('d F Y, H:i')}}</td>
                        @if($d['status'] == 1)
                          <td>Diterima</td>
                        @else
                          <td>Proses</td>
                        @endif
                        <td>
                          @if($d['jenis']  == 'Paten' )
                            <a href="/pengajuan-paten/{{$d['id']}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="/edit-pengajuan-paten/{{$d['id']}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger delete-pengajuan" data-id="{{$d['id']}}" data-jenis-pengajuan="{{$d['jenis']}}" data-judul="{{ $d['judul']}}"><i class="fa fa-remove"></i></a>
                            @if($d['status'] == 1)
                              <a href="/cetak/paten/{{$d['id']}}" class="btn btn-warning"><i class="fa fa-download"></i></a>
                            @else
                              <a href="/cetak/paten/{{$d['id']}}" class="btn btn-warning disabled"><i class="fa fa-download"></i></a>
                            @endif
                          @elseif($d['jenis'] == 'Desain Industri')
                            <a href="/pengajuan-industri/{{$d['id']}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="/edit-pengajuan-industri/{{$d['id']}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger delete-pengajuan" data-id="{{$d['id']}}" data-jenis-pengajuan="{{$d['jenis']}}" data-judul="{{ $d['judul']}}"><i class="fa fa-remove"></i></a>
                            @if($d['status'] == 1)
                              <a href="/cetak/desain-industri/{{$d['id']}}" class="btn btn-warning"><i class="fa fa-download"></i></a>
                            @else
                              <a href="/cetak/desain_industri/{{$d['id']}}" class="btn btn-warning disabled"><i class="fa fa-download"></i></a>
                            @endif
                          @elseif($d['jenis'] == 'Hak Cipta')
                            <a href="/pengajuan-hak-cipta/{{$d['id']}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="/edit-pengajuan-hak-cipta/{{$d['id']}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger delete-pengajuan" data-id="{{$d['id']}}" data-jenis-pengajuan="{{$d['jenis']}}" data-judul="{{ $d['judul']}}"><i class="fa fa-remove"></i></a>
                            @if($d['status'] == 1)
                              <a href="/cetak/hak-cipta/{{$d['id']}}" class="btn btn-warning"><i class="fa fa-download"></i></a>
                            @else
                              <a href="/cetak/hak_cipta/{{$d['id']}}" class="btn btn-warning disabled"><i class="fa fa-download"></i></a>
                            @endif
                          @elseif($d['jenis'] == 'Merek')
                            <a href="/pengajuan-merek/{{$d['id']}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            <a href="/edit-pengajuan-merek/{{$d['id']}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger delete-pengajuan" data-id="{{$d['id']}}" data-jenis-pengajuan="{{$d['jenis']}}" data-judul="{{ $d['judul']}}"><i class="fa fa-remove"></i></a>
                            @if($d['status'] == 1)
                              <a href="/cetak/merek/{{$d['id']}}" class="btn btn-warning"><i class="fa fa-download"></i></a>
                            @else
                              <a href="/cetak/merek/{{$d['id']}}" class="btn btn-warning disabled"><i class="fa fa-download"></i></a>
                            @endif
                          @endif
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
    $('.delete-pengajuan').click(function() {
      var id = $(this).data('id');
      var jenis_pengajuan = $(this).data('jenis-pengajuan');
      var judul = $(this).data('judul');
      var _token = '{{csrf_token()}}';

      bootbox.confirm("Hapus Pengajuan <strong>"+judul+" </strong>?", function(result) {
        if (result) {
          toastr.options.timeOut = 0;
          toastr.options.extendedTimeOut = 0;
          toastr.info('<i class="fa fa-spinner fa-spin"></i><br>Sedang menghapus...');
          toastr.options.timeOut = 5000;
          toastr.options.extendedTimeOut = 1000;
          $.post("/delete-pengajuan", {id: id, jenis_pengajuan:jenis_pengajuan, _token:_token})
          .done(function(result) {
            window.location.replace("/pengajuan");
          })
          .fail(function(result) {
            toastr.clear();
            toastr.error('Kesalahan server!');
          });
        };
      }); 
    });
  </script>
@endsection
