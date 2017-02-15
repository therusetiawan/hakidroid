@extends('layouts.adminLayout')

@section('content')
  <div class="content-header">
    {{-- <h3 class="title">Detail Pengajuan : {{$data->judul_invensi}} <small class="label bg-green pull-right"><i class="fa fa-check"></i> Terverifikasi</small></h3> --}}
      @if($merek->status == 1)
        <h3 class="title">Detail Pengajuan Merek : {{$merek->untuk_permohonan_merek}} <small class="label label-success pull-right"><i class="fa fa-check"></i> Pengajuan Diterima</small></h3>
      @elseif($merek->status == 0)
        <h3 class="title">Detail Pengajuan Merek : {{$merek->untuk_permohonan_merek}} <small class="label label-warning pull-right"><i class="fa fa-close"></i> Proses Pengajuan</small></h3>
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
          <h3 class="box-title">Data Merek</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nama Merek :
            </label>
            <div class="col-sm-10">
              <p>{{$merek->untuk_permohonan_merek}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Kelas barang/jasa :
            </label>
            <div class="col-sm-10">
              <p>{{$merek->kelas_barang_jasa->nama_kelas_barang_jasa}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Jenis barang/jasa :
            </label>
            <div class="col-sm-10">
              <p>{{$merek->kelas_barang_jasa->deskripsi}}</p>
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
              <p>{{$merek->biodata->nama}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Kewarganegaraan :
            </label>
            <div class="col-sm-10">
              <p>{{$merek->biodata->kewarganegaraan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Alamat :
            </label>
            <div class="col-sm-10">
              <p>{{$merek->biodata->alamat}}</p>
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
              <p>{{$merek->kuasa_nama}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Alamat :
            </label>
            <div class="col-sm-10">
              <p>{{$merek->kuasa_alamat}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Telepon :
            </label>
            <div class="col-sm-10">
              <p>{{$merek->kuasa_telpon}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Email :
            </label>
            <div class="col-sm-10">
              <p>{{$merek->kuasa_email}}</p>
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
              <p>{{$merek->warna_warna_etiket}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Arti Etiket Mere :
            </label>
            <div class="col-sm-10">
              <p>{{$merek->arti_etiket_merek}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Etiket Merek :
            </label>
            <div class="col-sm-10">
              @if($merek->etiket_merek != null)
                <a href="/download/merek/etiket-merek/{{$merek->etiket_merek}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
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
