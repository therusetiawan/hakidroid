@extends('layouts.userlayout')

@section('title')
  Detail "Scantour" - Detail Pengajuan Paten
@endsection
@section('header')
  <link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('content')
  <div class="container">
    <div class="content-header">
      {{-- <h3 class="title">Detail Pengajuan : Scantour --}}
      <h3 class="title">Detail Pengajuan Hak Paten : Scantour</h3>
    </div>

    <div class="content">
      <div>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard left"></i> Ajuan</a></li>
          <li><a href="#">Hak Paten</a></li>
          <li class="active">Scantour</li>
          <li><small class="label bg-red"><i class="fa fa-close"></i> Belum Terverifikasi</small></li>
          {{-- <li> <small class="label bg-green "><i class="fa fa-check"></i> Terverifikasi</small></h3></li> --}}
        </ol>
      </div>
      {{-- Box Data Pengajuan --}}
      {{-- Box Data Pengajuan --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Paten</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Judul Invensi :
            </label>
            <div class="col-sm-10">
              <p>Lorem</p>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nomor Pecahan Paten :
            </label>
            <div class="col-sm-10">
              <p>Lorem</p>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Konsultan Haki :
            </label>
            <div class="col-sm-10">
              <p>lorem</p>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Investor
            </label>
            <div class="col-sm-10">
              <ol>
                <li>Microsoft (United States)</li>
              </ol>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-xs-2 control-label">Pengajuan dengan hak prioritas? :</label>
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
                  <p>lorem</p>
                </div>
              </div>

              <div class="col-sm-12">
                <label class="col-sm-2 control-label">
                  Tanggal penerimaan permohonan pertama kali:
                </label>
                <div class="col-sm-10">
                  <p>lorem</p>
                </div>
              </div>

              <div class="col-sm-12">
                <label class="col-sm-2 control-label">
                  Nomor prioritas:
                </label>
                <div class="col-sm-10">
                  <p>lorem</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      {{-- Box Lampiran --}}

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran Karya</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-3">Surat kuasa</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Pengalihan Hak atas Penemuan</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Bukti Pemilikan Hak atas Penemuan</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-3">Bukti Penunjukan Negara Tujuan</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen Prioritas Terjemahan</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen Permohonan Paten Internasional</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Sertifikat Penyimpanan Jasad Renik Terjemahan</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen Prioritas Terjemahan</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">File Uraian</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">File Klaim</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">File Gambar</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen Lain</label>
            <div class="col-sm-9">
              <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Sudah terunggah</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
