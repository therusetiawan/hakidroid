@extends('layouts.adminLayout')

@section('header')
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('content')
  <div class="content-header">
    <h3>Berita</h3>
  </div>
  <div class="content body">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <div class="clearfix">
          <br>
          <div class="pull-right tableTools-container">
            <a href="{{ route('admin.berita.create') }}" role="button">
              <button class="btn btn-sm btn-primary" >
                <i class="fa fa-plus"></i>
                Tambah Berita
              </button>
            </a>
          </div>
        </div>
          <div class="box-body">
            <table id="tableindustri" class="table table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul</th>
                  <th>Foto</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($beritas as $berita)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $berita->judul_berita }}</td>
                    <td>
                      <img src="{{ asset('foto_berita/'.$berita->foto) }}" width="40px">
                    </td>
                    <td>
                      <a data-id="1" href="{{Route('admin.berita.edit', $berita->id)}}" class="btn-view btn bg-green"><i class="fa fa-pencil"></i></a>
                      </td>
                    <td>
                      {{ Form::model($berita, ['route' => ['admin.berita.destroy', $berita->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i]) }}
                      <a href="#" class="btn-delete btn bg-red" onclick="confirmHapus('{{ $i }}','{{ $berita->judul_berita }}')"><i class="fa fa-trash"></i></a>
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
    bootbox.confirm("Hapus Berita '" + data + "' ?", function(result) {
      if(result) {
        document.getElementById('form-hapus-'+id).submit();
      }
    });         
  }
  </script>
@endsection
