@extends('layouts.adminLayout')

@section('content')
  <div class="content-header">
    {{-- <h3 class="title">Detail Pengajuan : {{$data->judul_invensi}} <small class="label bg-green pull-right"><i class="fa fa-check"></i> Terverifikasi</small></h3> --}}
      @if($desainindustri->status == 1)
        <h3 class="title">Detail Desain Industri : {{$desainindustri->judul_desain_industri}} <small class="label label-success pull-right"><i class="fa fa-check"></i> Pengajuan Diterima</small></h3>
      @elseif($desainindustri->status == 0)
        <h3 class="title">Detail Desain Industri : {{$desainindustri->judul_desain_industri}} <small class="label label-warning pull-right"><i class="fa fa-close"></i> Proses Pengajuan</small></h3>
      @endif
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
            <p>{{ $desainindustri->biodata->nama }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Alamat :
          </label>
          <div class="col-sm-10">
            <p>{{ $desainindustri->biodata->alamat }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Kewarganegaraan :
          </label>
          <div class="col-sm-10">
            <p>{{ $desainindustri->biodata->kewarganegaraan }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Telepon :
          </label>
          <div class="col-sm-10">
            <p>{{ $desainindustri->biodata->no_hp }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Email :
          </label>
          <div class="col-sm-10">
            <p>{{ $desainindustri->biodata->email }}</p>
          </div>
          <label class="col-sm-2 control-label">
            NPWP :
          </label>
          <div class="col-sm-10">
            @if($desainindustri->biodata->npwp==NULL)
            <p>-</p>
            @else
            <p>{{ $desainindustri->biodata->npwp }}</p>
            @endif
          </div>
          <label class="col-sm-2 control-label">
            Nomor Permohonan :
          </label>
          <div class="col-sm-10">
            <p>{{ $desainindustri->id }}</p>
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
            <p>{{ $desainindustri->judul_desain_industri }}</p>
          </div>
        </div>
        @if($desainindustri->konsultan != null)
        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Konsultan Haki :
          </label>
          <div class="col-sm-10">
            <p>{{$desainindustri->konsultan}}</p>
          </div>
        </div>
        @endif
        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Desainer :
          </label>
          <div class="col-sm-10">
            @foreach($desainindustri->pendesain as $d)
            <p>{{ $d->nama.' - '.$d->kewarganegaraan }}</p>
            @endforeach
          </div>
        </div>

        <div class="row form-group">
          <label class="col-xs-2 control-label">Pengajuan dengan hak prioritas? :</label>
          <div class="col-xs-10">
            @if($desainindustri->hak_prioritas_id==NULL)
              <p>Tidak</p>
            @else
              <p>Ya</p>
            @endif
          </div>
        </div>
        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Kelas Desain Industri :
          </label>
          <div class="col-sm-10">
            <p>{{ $desainindustri->kelas_desain_industri->nama_kelas_desain_industri }}</p>
          </div>
        </div>
        <div class="row form-group">
          <div class="row" id="form-prioritas">

          </div>
        </div>
      </div>
    </div>
    {{-- Box Lampiran --}}

    <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Lampiran</h3>
          </div>
          <div class="box-body">
            <div class="row form-group">
              <label class="col-sm-6">Surat kuasa</label>
              <div class="col-sm-6">
                @if($desainindustri->lampiran_surat_kuasa != null)
                  <a href="/download/desain-industri/surat-kuasa/{{$desainindustri->lampiran_surat_kuasa}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Surat pernyataan pengalihan hak atas desain industri</label>
              <div class="col-sm-6">
                @if($desainindustri->lampiran_surat_pernyataan_pengalihan_hak != null)
                  <a href="/download/desain-industri/surat-pengalihan-hak/{{$desainindustri->lampiran_surat_pernyataan_pengalihan_hak}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Bukti pemilikan hak atas desain industri</label>
              <div class="col-sm-6">
                @if($desainindustri->lampiran_bukti_pemilikan_hak != null)
                  <a href="/download/desain-industri/bukti-pemilikan-hak/{{$desainindustri->lampiran_bukti_pemilikan_hak}}" class="btn btn-success" target='_blank'><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Bukti prioritas dan terjemahannya</label>
              <div class="col-sm-6">
                @if($desainindustri->lampiran_bukti_prioritas_dan_terjemahan != null)
                  <a href="/download/desain-industri/bukti-prioritas-terjemahan/{{$desainindustri->lampiran_bukti_prioritas_dan_terjemahan}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Dokumen (permohonan) desain industri </label>
              <div class="col-sm-6">
                @if($desainindustri->lampiran_dokumen_desain_industri != null)
                  <a href="/download/desain-industri/dokumen/{{$desainindustri->lampiran_dokumen_desain_industri}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Uraian desain industri atau keterangan gambar</label>
              <div class="col-sm-6">
                @if($desainindustri->uraian->count() > 0)
                  <a href="/download/desain-industri/uraian/{{$desainindustri->uraian[0]->nama}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Gambar-gambar atau foto-foto desain industri:</label>
              <div class="col-sm-6">
                @if($desainindustri->gambar_foto->count() > 0)
                  <a href="/download/desain-industri/gambar/{{$desainindustri->gambar_foto[0]->gambar_foto}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
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
        <a href="{{ route('admin.desainindustri.edit', $desainindustri->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Verifikasi</a>
      </div>
    </div>

  {{-- End of Content --}}
  </div>


@endsection
