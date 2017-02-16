@extends('layouts.adminLayout')

@section('content')
  <div class="content-header">
    
  </div>
  <div class="content">

    {{--  Boox Data Diri --}}
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Tambah Admin</h3>
      </div>
      <div class="box-body">
        
      {{ Form::open(array('route' => 'admin.admin.store', 'class' => 'form-horizontal', 'method' => 'POST', 'id' => 'frm', 'enctype' => 'multipart/form-data')) }}
       <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1"> Nama : </label>
          <div class="col-sm-9">
            <input autofocus type="text" name="name" placeholder="Nama" class="form-control" required  />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1"> Email : </label>
          <div class="col-sm-9">
            <input type="email" name="email" placeholder="Email" class="form-control" required  />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1"> Password : </label>
          <div class="col-sm-9">
            <input type="password" name="password" placeholder="Password" class="form-control" required  />
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-sm btn-primary" type="submit">
          <i class="ace-icon fa fa-save"></i>
          Simpan
        </button>
        <a href="{{ route('admin.berita.index') }}">
        <button class="btn btn-sm btn-danger pull-right" type="button">
          <i class="ace-icon fa fa-times"></i>
          Kembali
        </button>
        </a>
      </div>
      {{ Form::close() }}

      </div>
    </div>

  {{-- End of Content --}}
  </div>


@endsection
