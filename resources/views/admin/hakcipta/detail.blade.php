@extends('layouts.adminLayout')

@section('content')
  <div class="content-header">
    {{-- <h3 class="title">Detail Pengajuan : {{$data->judul_invensi}} <small class="label bg-green pull-right"><i class="fa fa-check"></i> Terverifikasi</small></h3> --}}
      @if($hakcipta->status == 1)
        <h3 class="title">Detail Pengajuan Hak Cipta : {{$hakcipta->nama_ciptaan}} <small class="label label-success pull-right"><i class="fa fa-check"></i> Pengajuan Diterima</small></h3>
      @elseif($hakcipta->status == 0)
        <h3 class="title">Detail Pengajuan Hak Cipta : {{$hakcipta->nama_ciptaan}} <small class="label label-warning pull-right"><i class="fa fa-close"></i> Proses Pengajuan</small></h3>
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
            <p>{{ $hakcipta->biodata->nama }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Alamat :
          </label>
          <div class="col-sm-10">
            <p>{{ $hakcipta->biodata->alamat }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Kewarganegaraan :
          </label>
          <div class="col-sm-10">
            <p>{{ $hakcipta->biodata->kewarganegaraan }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Telepon :
          </label>
          <div class="col-sm-10">
            <p>{{ $hakcipta->biodata->no_hp }}</p>
          </div>
          <label class="col-sm-2 control-label">
            Email :
          </label>
          <div class="col-sm-10">
            <p>{{ $hakcipta->biodata->email }}</p>
          </div>
          <label class="col-sm-2 control-label">
            NPWP :
          </label>
          <div class="col-sm-10">
            @if($hakcipta->biodata->npwp==NULL)
            <p>-</p>
            @else
            <p>{{ $hakcipta->biodata->npwp }}</p>
            @endif
          </div>
          <label class="col-sm-2 control-label">
            Nomor Permohonan :
          </label>
          <div class="col-sm-10">
            <p>{{ $hakcipta->id }}</p>
          </div>
        </div>
      </div>
    </div>

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
              <p>{{$hakcipta->nama_ciptaan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Jenis Ciptaan :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->jenis_hak_cipta->nama_jenis_hak_cipta}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Uraian Ciptaan :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->uraian_ciptaan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Tempat pertama kali diumumkan :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->tempat_diumumkan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Tanggal pertama kali diumumkan :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->tanggal_diumumkan}}</p>
            </div>
          </div>
        </div>
      </div>

      {{-- Box data Pencipta --}}
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
              <p>{{$hakcipta->pencipta_nama}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Kewarganegaraan :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->pencipta_kewarganegaraan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Alamat :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->pencipta_alamat}}</p>
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
              <p>{{$hakcipta->pemegang_hak_cipta_nama}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Kewarganegaraan :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->pemegang_hak_cipta_kewarganegaraan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Alamat :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->pemegang_hak_cipta_alamat}}</p>
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
              <p>{{$hakcipta->kuasa_nama}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Kewarganegaraan :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->kuasa_kewarganegaraan}}</p>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Alamat :
            </label>
            <div class="col-sm-10">
              <p>{{$hakcipta->kuasa_alamat}}</p>
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
        <a href="{{ route('admin.hakcipta.edit', $hakcipta->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Verifikasi</a>
      </div>
    </div>

  {{-- End of Content --}}
  </div>


@endsection
