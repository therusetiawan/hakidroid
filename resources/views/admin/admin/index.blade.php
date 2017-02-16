@extends('layouts.adminLayout')

@section('header')
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('content')
  <div class="content-header">
    <h3>Daftar User Admin</h3>
  </div>
  <div class="content body">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-success">
          <br>
          <div class="pull-right tableTools-container">
            <a href="{{ route('admin.admin.create') }}" role="button">
              <button class="btn btn-sm btn-primary" >
                <i class="fa fa-plus"></i>
                Tambah Admin
              </button>
            </a>
          </div>
          <div class="box-body">
            <table id="tableindustri" class="table table-bordered">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($users as $user)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      {{ Form::model($user, ['route' => ['admin.admin.destroy', $user->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i]) }}
                      <a href="#" class="btn-delete btn bg-red" onclick="confirmHapus('{{ $i }}','{{ $user->name }}')"><i class="fa fa-trash"></i></a>
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
    bootbox.confirm("Hapus User Admin '" + data + "' ?", function(result) {
      if(result) {
        document.getElementById('form-hapus-'+id).submit();
      }
    });         
  }
  </script>
@endsection
