@extends('layouts.adminLayout')

@section('content')
  <div class="content-header">
    {{-- <h3 class="title">Detail Pengajuan : Scantour <small class="label bg-green pull-right"><i class="fa fa-check"></i> Terverifikasi</small></h3> --}}
    <h3 class="title">Detail Pengajuan : Scantour <small class="label bg-red pull-right"><i class="fa fa-close"></i> Belum Terverifikasi</small></h3>
  </div>
  <div class="content">

    {{--  Boox Data Diri --}}
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Data Diri Pengaju</h3>
      </div>
      <div class="box-body">
        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Nama :
          </label>
          <div class="col-sm-10">
            <p>Anjasmoro</p>
          </div>
          <label class="col-sm-2 control-label">
            Alamat :
          </label>
          <div class="col-sm-10">
            <p>Magelang, Jateng, Jabar</p>
          </div>
          <label class="col-sm-2 control-label">
            Kewarganegaraan :
          </label>
          <div class="col-sm-10">
            <p>Indonesia</p>
          </div>
          <label class="col-sm-2 control-label">
            Telepon :
          </label>
          <div class="col-sm-10">
            <p>08927381923</p>
          </div>
          <label class="col-sm-2 control-label">
            NPWP :
          </label>
          <div class="col-sm-10">
            <p>127361723891239</p>
          </div>
          <label class="col-sm-2 control-label">
            Nomor Permohonan :
          </label>
          <div class="col-sm-10">
            <p>35</p>
          </div>
        </div>
      </div>
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
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Surat pernyataan pengalihan hak atas desain industri</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Bukti pemilikan hak atas desain industri</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Bukti prioritas dan terjemahannya</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Dokumen (permohonan) desain industri dengan prioritas dan terjemahannya</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Uraian desain industri atau keterangan gambar</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Gambar-gambar atau foto-foto desain industri:</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-6">Contoh fisik</label>
            <div class="col-sm-6">
              <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
            </div>
          </div>
        </div>
      </div>

      {{-- Konfirmasi --}}
      <a href="#" class="btn btn-p"></a>
  </div>
@endsection
