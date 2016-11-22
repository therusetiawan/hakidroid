@extends('layouts.adminLayout')

@section('header')
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('content')
  <div class="content-header">
    <h3>Pengajuan Industri</h3>
  </div>
  <div class="content body">
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="box-header">
            test
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul</th>
                  <th>Nama Pengaju</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Scantour: Aplikasi Pariwisata dengan Augmented Reality</td>
                    <td>Abdur Rofi Zihni</td>
                    <td>
                      Menunggu
                    </td>
                    <td>
                      <a data-id="1" href="#" class="btn-view btn bg-green"><i class="fa fa-eye"></i></a>
                      <a href="#" class="btn bg-blue"><i class="fa fa-edit"></i></a>
                      <a data-id="1" href="#" class="btn-delete btn bg-red"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- Modal Melihat --}}

  <!-- Modal -->
  <div id="modal-view" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Judulnya Disini</h4>
        </div>
        <div class="modal-body">
          <p>JSON terjadi disini</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>

  </div>

  {{-- Modal Delete --}}
  <!-- Modal -->
  <div id="modal-delete" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin akan menghapus?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-red" data-dismiss="modal">Ya</button>
          <button type="button" class="btn bg-green" data-dismiss="modal">Tidak</button>
        </div>
      </div>

    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/js/dataTables.bootstrap.js') }}"></script>
  <script type="text/javascript">
    $('.table').dataTable();

    $('.btn-view').click(function() {
      //JSON Proses here
      $('#modal-view').modal('show');
    });
    $('.btn-delete').click(function() {
      //JSON Proses here
      $('#modal-delete').modal('show');
    });
  </script>
@endsection
