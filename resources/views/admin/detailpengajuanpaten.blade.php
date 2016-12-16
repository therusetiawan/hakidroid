@extends('layouts.adminLayout')

@section('content')
  <div class="content-header">
    {{-- <h3 class="title">Detail Pengajuan : Scantour <small class="label bg-green pull-right"><i class="fa fa-check"></i> Terverifikasi</small></h3> --}}
    <h3 class="title">Detail Pengajuan Paten: Scantour <small class="label bg-red pull-right"><i class="fa fa-close"></i> Belum Terverifikasi</small></h3>
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
            <p>Magelang, Jawa Tengah</p>
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
            <p>089172378129</p>
          </div>
          <label class="col-sm-2 control-label">
            NPWP :
          </label>
          <div class="col-sm-10">
            <p>1254263172898172673</p>
          </div>
          <label class="col-sm-2 control-label">
            Nomor Permohonan :
          </label>
          <div class="col-sm-10">
            <p>25</p>
          </div>
        </div>
      </div>
    </div>

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
            <p>Scantour</p>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Nomor Pecahan Paten :
          </label>
          <div class="col-sm-10">
            <p>000001</p>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Konsultan Haki :
          </label>
          <div class="col-sm-10">
            <p>Tidak ada</p>
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
                <p>Indonesia</p>
              </div>
            </div>

            <div class="col-sm-12">
              <label class="col-sm-2 control-label">
                Tanggal penerimaan permohonan pertama kali:
              </label>
              <div class="col-sm-10">
                <p>27 Agustus 2016</p>
              </div>
            </div>

            <div class="col-sm-12">
              <label class="col-sm-2 control-label">
                Nomor prioritas:
              </label>
              <div class="col-sm-10">
                <p>000001</p>
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
            <a href="/download/lampiran" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">Surat Pengalihan Hak atas Penemuan</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">Bukti Pemilikan Hak atas Penemuan</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-sm-3">Bukti Penunjukan Negara Tujuan</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">Dokumen Prioritas Terjemahan</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">Dokumen Permohonan Paten Internasional</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">Sertifikat Penyimpanan Jasad Renik Terjemahan</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">Dokumen Prioritas Terjemahan</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">File Uraian</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">File Klaim</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">File Gambar</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

        <div class="row form-group">
          <label class="col-sm-3">Dokumen Lain</label>
          <div class="col-sm-9">
            <a href="#" class="btn btn-success"><i class="fa fa-download"></i> <i>detail</i></a>
          </div>
        </div>

      </div>
    </div>

    {{-- Box Validasi --}}
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Verifikasi</h3>
      </div>
      <div class="box-body">
        <p>Cek kembali kelengkapan data dan lampiran pengajuan Hak Paten. Jika data sudah lengkap dan benar, silahkan klik tombol verifikasi</p>
        <a href="#" class="btn btn-success"><i class="fa fa-check"></i> Verifikasi</a>
      </div>
    </div>

  {{-- End of Content --}}
  </div>


@endsection
