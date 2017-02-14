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
                      @if($paten->status == 1)
                          <label class="label label-success">Diterima</label> 
                        @else
                          <label class="label label-warning">Proses</label> 
                        @endif
                    </td>
                    <td>
                      <a data-id="1" href="{{Route('admin.paten.show', $paten->id)}}" class="btn-view btn bg-green"><i class="fa fa-eye"></i></a>
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
          {{ Form::model($paten, ['route' => ['admin.paten.destroy', $paten->id], 'method'=>'DELETE', 'class' => 'form-inline']) }}
          <button type="submit" class="btn bg-red">Ya</button>
          <button type="button" class="btn bg-green" data-dismiss="modal">Tidak</button>
          {{ Form::close() }}
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
