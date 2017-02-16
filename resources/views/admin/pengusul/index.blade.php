@extends('layouts.adminLayout')

@section('header')
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('content')
  <div class="content-header">
    <h3>Daftar Pengusul</h3>
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
                  <th>Nama</th>
                  <th>Kewarganegaraan</th>
                  <th>NPWP</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($pengusuls as $pengusul)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $pengusul->nama }}</td>
                    <td>{{ $pengusul->kewarganegaraan }}</td>
                    <td>{{ $pengusul->npwp }}</td>
                    <td>{{ $pengusul->alamat }}</td>
                    <td>{{ $pengusul->email }}</td>
                    <td>{{ $pengusul->no_hp }}</td>
                    <td>
                      {{ Form::model($pengusul, ['route' => ['admin.pengusul.destroy', $pengusul->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i]) }}
                      <a href="#" class="btn-delete btn bg-red" onclick="confirmHapus('{{ $i }}','{{ $pengusul->nama }}')"><i class="fa fa-trash"></i></a>
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
    bootbox.confirm("Hapus Paten '" + data + "' ?", function(result) {
      if(result) {
        document.getElementById('form-hapus-'+id).submit();
      }
    });         
  }
  </script>
@endsection
