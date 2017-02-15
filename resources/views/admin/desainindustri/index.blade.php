@extends('layouts.adminLayout')

@section('header')
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('content')
  <div class="content-header">
    <h3>Pengajuan Desain Industri</h3>
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
                  <th colspan="2">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($desainindustris as $desainindustri)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $desainindustri->judul_desain_industri }}</td>
                    <td>{{ $desainindustri->nama }}</td>
                    <td>
                      @if($desainindustri->status == 1)
                          <label class="label label-success">Diterima</label> 
                        @else
                          <label class="label label-warning">Proses</label> 
                        @endif
                    </td>
                    <td>
                      <a data-id="1" href="{{Route('admin.desainindustri.show', $desainindustri->id)}}" class="btn-view btn bg-green"><i class="fa fa-eye"></i></a>
                      </td>
                    <td>
                      {{ Form::model($desainindustri, ['route' => ['admin.desainindustri.destroy', $desainindustri->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i]) }}
                      <a href="#" class="btn-delete btn bg-red" onclick="confirmHapus('{{ $i }}','{{ $desainindustri->judul_desain_industri }}')"><i class="fa fa-trash"></i></a>
                      {{ Form::close() }}
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

@endsection

@section('js')
  <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('/js/bootbox.min.js') }}"></script>
  <script type="text/javascript">
    $('#tableindustri').dataTable();

    function confirmHapus(id,data) {
    // return false;
    bootbox.confirm("Hapus Desain Industri '" + data + "' ?", function(result) {
      if(result) {
        document.getElementById('form-hapus-'+id).submit();
      }
    });         
  }
  </script>
@endsection
