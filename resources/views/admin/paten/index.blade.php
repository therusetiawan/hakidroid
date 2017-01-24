@extends('layouts.adminLayout')

@section('header')
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('content')
  <div class="content-header">
    <h3>Pengajuan Paten</h3>
  </div>
  <div class="content body">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <!-- <div class="box-header">
            test
          </div> -->
          <div class="box-body">
            <table id="tableindustri" class="table table-bordered">
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
                <?php $i = 1; ?>
                @foreach($patens as $paten)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $paten->judul_invensi }}</td>
                    <td>{{ $paten->nama }}</td>
                    <td>
                      {{ $paten->status }}
                    </td>
                    <td>
                      <a data-id="1" href="{{Route('admin.paten.show', $paten->id)}}" class="btn-view btn bg-green"><i class="fa fa-eye"></i></a>
                      <a href="#" class="btn bg-blue"><i class="fa fa-check"></i></a>
                      <a data-id="1" href="#" class="btn-delete btn bg-red"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
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
          <h3 class="box-title">Data</h3>
          <table class="table">
            <tr>
              <td>Judul Desain Industri</td>
              <td></td>
            </tr>
            <tr>
              <td>Konsultan Haki</td>
              <td></td>
            </tr>
            <tr>
              <td>Desainer : </td>
              <td>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Asal Ngera</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Btg Mhd</td>
                      <td>Indonesia</td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2">Hak Prioritas</td>
            </tr>
            <tr>
              <td>Negara</td>
              <td></td>
            </tr>
            <tr>
              <td>Pengajuan Terakhir</td>
              <td></td>
            </tr>
            <tr>
              <td>Nomor Prioritas</td>
              <td></td>
            </tr>
            <tr>
              <td>Kelas Industri</td>
              <td></td>
            </tr>
          </table>

          <h3 class="box-title">Lampiran</h3>
          <div class="row form-group">
            <label class="col-sm-6">Surat kuasa</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Surat pernyataan pengalihan hak atas penemuan</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Bukti pemilikan hak atas desain industri</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Bukti prioritas dan terjemahannya</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Dokumen (permohonan) desain industri dengan prioritas dan terjemahannya</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Uraian desain industri atau keterangan gambar</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Gambar-gambar atau foto-foto desain industri:</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Contoh fisik</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">Ya</button>
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
    $('#tableindustri').dataTable();

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
