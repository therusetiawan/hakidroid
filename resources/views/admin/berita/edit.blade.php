@extends('layouts.adminLayout')

@section('content')
  <div class="content-header">
    
  </div>
  <div class="content">

    {{--  Boox Data Diri --}}
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Edit Berita</h3>
      </div>
      <div class="box-body">
        
      {{ Form::model($berita, ['route' => ['admin.berita.update', $berita->id], 'class' => 'form-horizontal', 'method'=>'PATCH', 'id'=>'frm-edit', 'enctype' => 'multipart/form-data']) }}
       <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1"> Judul Berita : </label>
          <div class="col-sm-9">
            <input autofocus type="text" name="judul_berita" placeholder="Judul Berita" class="form-control" required value="{{ $berita->judul_berita }}"  />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1"> Isi Berita : </label>
          <div class="col-sm-9">
            <textarea name="isi_berita" cols="30" rows="10" required class="form-control" placeholder="Isi Berita">{{ $berita->isi_berita }}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1"> Ganti Foto : </label>
          <div class="col-sm-9">
            <img src="{{ asset('berita/'.$berita->foto) }}" width="130px">
            <input type="file" name="foto" class="form-control"  />
            <input type="hidden" name="foto_lama" value="{{ $berita->foto }}">
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
