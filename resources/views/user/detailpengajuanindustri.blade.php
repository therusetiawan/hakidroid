@extends('layouts.userlayout')

@section('title')
  Detail "Scantour" - Detail Pengajuan Industri
@endsection
@section('header')
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('content')
  <div class="container">
    <div class="content-header">
      {{-- <h3 class="title">Detail Pengajuan : Scantour <small class="label bg-green pull-right"><i class="fa fa-check"></i> Terverifikasi</small></h3> --}}
      <h3 class="title">Detail Pengajuan Desain Indutri : Scantour </h3>
    </div>

    <div class="content">
      <div>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Ajuan</a></li>
          <li><a href="#">Desain Industri</a></li>
          <li class="active">Scantour</li>
          {{-- <li><small class="label bg-red"><i class="fa fa-close"></i> Belum Terverifikasi</small></li> --}}
          <li> <small class="label bg-green "><i class="fa fa-check"></i> Terverifikasi</small></h3></li>
        </ol>
      </div>
      {{-- Box Data Pengajuan --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Desain Industri</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Judul Desain Industri :
            </label>
            <div class="col-sm-10">
              <p>Scantour</p>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Konsultan Haki :
            </label>
            <div class="col-sm-10">
              <p>Kokas</p>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Desainer
            </label>
            <div class="col-sm-10">
              <ol>
                <li>Anjasmoro Adi Nugroho (Indonesia)</li>
              </ol>
            </div>
          </div>

          <div class="row">
            <label class="col-xs-2 control-label">Pengajuan dengan hak prioritas :</label>
            <div class="col-xs-10">
              <p>Ya</p>
            </div>
          </div>
          <div class="row form-group">
              <div class="row" id="form-prioritas">
                <div class="col-sm-12">
                  <label class="col-sm-2 control-label">
                    Negara:
                  </label>
                  <div class="col-sm-10">
                    <p>kasjds</p>
                  </div>
                </div>
                <div class="col-sm-12">
                  <label class="col-sm-2 control-label">
                    Tanggal penerimaan permohonan pertama kali:
                  </label>
                  <div class="col-sm-10">
                    <p>tanggal</p>
                  </div>
                </div>
                <div class="col-sm-12">
                  <label class="col-sm-2 control-label">
                    Nomor prioritas:
                  </label>
                  <div class="col-sm-10">
                    <p>ksdask</p>
                  </div>
                </div>
              </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 label-control">Kelas Industri</label>
            <div class="col-sm-10">
              test
            </div>
          </div>
        </div>
      </div>


        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Lampiran</h3>
          </div>
          <div class="box-body">
            <div class="row form-group">
              <label class="col-sm-6">Surat kuasa</label>
              <div class="col-sm-6">
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Surat pernyataan pengalihan hak atas desain industri</label>
              <div class="col-sm-6">
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Bukti pemilikan hak atas desain industri</label>
              <div class="col-sm-6">
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Bukti prioritas dan terjemahannya</label>
              <div class="col-sm-6">
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Dokumen (permohonan) desain industri dengan prioritas dan terjemahannya</label>
              <div class="col-sm-6">
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Uraian desain industri atau keterangan gambar</label>
              <div class="col-sm-6">
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Gambar-gambar atau foto-foto desain industri:</label>
              <div class="col-sm-6">
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Contoh fisik</label>
              <div class="col-sm-6">
                <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
              </div>
            </div>
          </div>
        </div>
  </div>
@endsection
