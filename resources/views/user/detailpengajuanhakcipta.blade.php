@extends('layouts.userlayout')

@section('title')
  Detail "{{$data->nama_ciptaan}}" - Detail Pengajuan Hak Cipta
@endsection
@section('header')
@endsection

@section('content')
  <div class="container">
    <div class="col-sm-12">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ajuan</a></li>
        <li><a href="#">Hak Cipta</a></li>
        <li class="active">{{$data->nama_ciptaan}}</li>
      </ol>
    </div>
    <div class="content-header">
      @if($data->status == 1)
        <h3 class="title">Detail Pengajuan Hak Cipta : {{$data->nama_ciptaan}} <small class="label label-success pull-right"><i class="fa fa-check"></i> Pengajuan Diterima</small></h3>
      @elseif($data->status == 0)
        <h3 class="title">Detail Pengajuan Hak Cipta : {{$data->nama_ciptaan}} <small class="label label-warning pull-right"><i class="fa fa-close"></i> Proses Pengajuan</small></h3>
      @endif
    </div>

    <div class="content">

      {{-- Box Data Pengajuan --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Hak Cipta</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Judul Ciptaan :
            </label>
            <div class="col-sm-10">
              <p>{{$data->nama_ciptaan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Jenis Ciptaan :
            </label>
            <div class="col-sm-10">
              <p>{{$data->jenis_hak_cipta->nama_jenis_hak_cipta}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Uraian Ciptaan :
            </label>
            <div class="col-sm-10">
              <p>{{$data->uraian_ciptaan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Tempat pertama kali diumumkan :
            </label>
            <div class="col-sm-10">
              <p>{{$data->tempat_diumumkan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Tanggal pertama kali diumumkan :
            </label>
            <div class="col-sm-10">
              <p>{{$data->tanggal_diumumkan}}</p>
            </div>
          </div>
        </div>
      </div>

      {{-- Box Data Pencipta --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pencipta</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nama :
            </label>
            <div class="col-sm-10">
              <p>{{$data->pencipta_nama}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Kewarganegaraan :
            </label>
            <div class="col-sm-10">
              <p>{{$data->pencipta_kewarganegaraan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Alamat :
            </label>
            <div class="col-sm-10">
              <p>{{$data->pencipta_alamat}}</p>
            </div>
          </div>
        </div>
      </div>

      {{-- Box Data Pemegang Hak Cipta --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pemegang Hak Cipta</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nama :
            </label>
            <div class="col-sm-10">
              <p>{{$data->pemegang_hak_cipta_nama}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Kewarganegaraan :
            </label>
            <div class="col-sm-10">
              <p>{{$data->pemegang_hak_cipta_kewarganegaraan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Alamat :
            </label>
            <div class="col-sm-10">
              <p>{{$data->pemegang_hak_cipta_alamat}}</p>
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
              Kewarganegaraan :
            </label>
            <div class="col-sm-10">
              <p>{{$data->kuasa_kewarganegaraan}}</p>
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
        </div>
      </div>
  </div>
@endsection
