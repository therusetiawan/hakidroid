@extends('layouts.userlayout')

@section('title')
  Detail "{{$data->untuk_permohonan_merek}}" - Detail Pengajuan Merek
@endsection
@section('header')
@endsection

@section('content')
  <div class="container">
    <div class="col-sm-12">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ajuan</a></li>
        <li><a href="#">Merek</a></li>
        <li class="active">{{$data->untuk_permohonan_merek}}</li>
      </ol>
    </div>
    <div class="content-header">
      @if($data->status == 1)
        <h3 class="title">Detail Pengajuan Merek : {{$data->untuk_permohonan_merek}} <small class="label label-success pull-right"><i class="fa fa-check"></i> Pengajuan Diterima</small></h3>
      @elseif($data->status == 0)
        <h3 class="title">Detail Pengajuan Merek : {{$data->untuk_permohonan_merek}} <small class="label label-warning pull-right"><i class="fa fa-close"></i> Proses Pengajuan</small></h3>
      @endif
    </div>

    <div class="content">

      {{-- Box Data Pengajuan --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Merek</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nama Merek :
            </label>
            <div class="col-sm-10">
              <p>{{$data->untuk_permohonan_merek}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Kelas barang/jasa :
            </label>
            <div class="col-sm-10">
              <p>{{$data->kelas_barang_jasa->nama_kelas_barang_jasa}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Jenis barang/jasa :
            </label>
            <div class="col-sm-10">
              <p>{{$data->kelas_barang_jasa->deskripsi}}</p>
            </div>
          </div>
        </div>
      </div>

      {{-- Box Data Diri --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Diri</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nama :
            </label>
            <div class="col-sm-10">
              <p>{{$data->biodata->nama}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Kewarganegaraan :
            </label>
            <div class="col-sm-10">
              <p>{{$data->biodata->kewarganegaraan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Alamat :
            </label>
            <div class="col-sm-10">
              <p>{{$data->biodata->alamat}}</p>
            </div>
          </div>
        </div>
      </div>

      {{-- Box Data Kuasa --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Kuasa</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nama :
            </label>
            <div class="col-sm-10">
              <p>{{$data->kuasa_nama}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Alamat :
            </label>
            <div class="col-sm-10">
              <p>{{$data->kuasa_alamat}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Telepon :
            </label>
            <div class="col-sm-10">
              <p>{{$data->kuasa_telpon}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Email :
            </label>
            <div class="col-sm-10">
              <p>{{$data->kuasa_email}}</p>
            </div>
          </div>
        </div>
      </div>
      {{-- Box Lampiran --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Warna-warna etiket :
            </label>
            <div class="col-sm-10">
              <p>{{$data->warna_warna_etiket}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Arti Etiket Mere :
            </label>
            <div class="col-sm-10">
              <p>{{$data->arti_etiket_merek}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Etiket Merek :
            </label>
            <div class="col-sm-10">
              @if($data->etiket_merek != null)
                <a href="/download/merek/etiket-merek/{{$data->etiket_merek}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
