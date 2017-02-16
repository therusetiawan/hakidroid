@extends('layouts.adminLayout')

@section('content')
  <div class="content-header">
    {{-- <h3 class="title">Detail Pengajuan : {{$data->judul_invensi}} <small class="label bg-green pull-right"><i class="fa fa-check"></i> Terverifikasi</small></h3> --}}
      @if($paten->status == 1)
        <h3 class="title">Detail Pengajuan Paten : {{$paten->judul_invensi}} <small class="label label-success pull-right"><i class="fa fa-check"></i> Pengajuan Diterima</small></h3>
      @elseif($paten->status == 0)
        <h3 class="title">Detail Pengajuan Paten : {{$paten->judul_invensi}} <small class="label label-warning pull-right"><i class="fa fa-close"></i> Proses Pengajuan</small></h3>
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
            <p>{{ $paten->biodata->nama }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Alamat :
          </label>
          <div class="col-sm-10">
            <p>{{ $paten->biodata->alamat }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Kewarganegaraan :
          </label>
          <div class="col-sm-10">
            <p>{{ $paten->biodata->kewarganegaraan }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Telepon :
          </label>
          <div class="col-sm-10">
            <p>{{ $paten->biodata->no_hp }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Email :
          </label>
          <div class="col-sm-10">
            <p>{{ $paten->biodata->email }}</p>
          </div>
          <label class="col-sm-2 control-label">
            NPWP :
          </label>
          <div class="col-sm-10">
            @if($paten->biodata->npwp==NULL)
            <p>-</p>
            @else
            <p>{{ $paten->biodata->npwp }}</p>
            @endif
          </div>
          <label class="col-sm-2 control-label">
            Nomor Permohonan :
          </label>
          <div class="col-sm-10">
            <p>{{ $paten->id }}</p>
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
            <p>{{ $paten->judul_invensi }}</p>
          </div>
        </div>
        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Jenis Paten :
          </label>
          <div class="col-sm-10">
            @if($paten->jenis_paten=='paten')
            <p>Paten</p>
            @else
            <p>Paten Sederhana</p>
            @endif
          </div>
        </div>
        @if($paten->paten_pecahan_nomor != null)
        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Nomor Pecahan Paten :
          </label>
          <div class="col-sm-10">
            <p>{{ $paten->paten_pecahan_nomor }}</p>
          </div>
        </div>
        @endif

        @if($paten->konsultan != null)
        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Konsultan Haki :
          </label>
          <div class="col-sm-10">
            <p>{{$paten->konsultan}}</p>
          </div>
        </div>
        @endif

        <div class="row form-group">
          <label class="col-sm-2 control-label">
            Inventor :
          </label>
          <div class="col-sm-10">
            @foreach($paten->inventor as $inventor)
            <p>{{ $inventor->nama.' - '.$inventor->kewarganegaraan }}</p>
            @endforeach
          </div>
        </div>

        <div class="row form-group">
          <label class="col-xs-2 control-label">Pengajuan dengan hak prioritas? :</label>
          <div class="col-xs-10">
            @if($paten->hak_prioritas_id==NULL)
              <p>Tidak</p>
            @else
              <p>Ya</p>
            @endif
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
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran Dokumen Formatif</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-3">Surat kuasa</label>
            <div class="col-sm-9">
              @if($paten->surat_kuasa != null)
                <a href="/download/paten/surat-kuasa/{{$paten->surat_kuasa}}" class="btn btn-success"  target='_blank'><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Pengalihan Hak atas Penemuan</label>
            <div class="col-sm-9">
              @if($paten->surat_pengalihan_hak_atas_penemuan != null)
                <a href="/download/paten/surat-pengalihan-hak-penemuan/{{$paten->surat_pengalihan_hak_atas_penemuan}}" class="btn btn-success" target="_blank"><i class="fa fa-check" target='_blank'></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Kepemilikan Invensi oleh Inventor</label>
            <div class="col-sm-9">
              @if($paten->surat_kepemilikan_invensi_oleh_inventor != null)
                <a href="/download/paten/surat-kepemilikan-inventor/{{$paten->surat_kepemilikan_invensi_oleh_inventor}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Kepemilikan Invensi oleh Lembaga</label>
            <div class="col-sm-9">
              @if($paten->surat_pernyataan_invensi_oleh_lembaga != null)
                <a href="/download/paten/surat-pernyataan-invensi-oleh-lembaga/{{$paten->surat_pernyataan_invensi_oleh_lembaga}}" class="btn btn-success" target='_blank'><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen Prioritas Terjemahan</label>
            <div class="col-sm-9">
              @if($paten->dokumen_prioritas_terjemahan != null)
                <a href="/download/paten/dokumen-terjemahan/{{$paten->dokumen_prioritas_terjemahan}}" class="btn btn-success" target='_blank'><i class="fa fa-check" ></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div  class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran Dokumen Subtantif</h3>
        </div>
        <div class='box-body'>
          <div class="row form-group">
            <label class="col-sm-3">File Uraian</label>
            <div class="col-sm-9">
              @if($paten->dokumen_subtantif_deskripsi->count() > 0)
                <a href="/download/paten/dokumen-subtantif-deskripsi/{{$paten->dokumen_subtantif_deskripsi[0]->nama_file}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>  
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">File Gambar</label>
            <div class="col-sm-9">
              @if($paten->dokumen_subtantif_gambar->count() > 0)
                <a href="/download/paten/dokumen-subtantif-gambar/{{$paten->dokumen_subtantif_gambar[0]->nama_file}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
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
        <a href="{{ route('admin.paten.edit', $paten->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Verifikasi</a>
      </div>
    </div>

  {{-- End of Content --}}
  </div>


@endsection
