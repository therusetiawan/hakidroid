@extends('layouts.userlayout')

@section('title')
  Sunting "{{$data->untuk_permohonan_merek}}" - Pengajuan Merek
@endsection


@section('header')
  <link rel="stylesheet" href="{{ asset('/admin/plugins/datepicker/datepicker3.css') }}">
  <style media="screen">
    body {
      background-color: #ecf0f5;
    }
  </style>
@endsection


@section('content')
    <div class="container">
      <h2>Sunting "{{$data->untuk_permohonan_merek}}" - Pengajuan Merek</h2>

      <form action="/edit-pengajuan-merek" method="post" enctype="multipart/form-data">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Merek</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Nama Merek :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="nama_merek" placeholder="Nama Merek" required="true" value="{{$data->untuk_permohonan_merek}}">
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Kelas barang/jasa     :
                    </label>
                    <div class="col-sm-4">
                        <select name="kelas_barang_jasa" class="form-control">
                            <option value="">---- Pilih Kelas ----</option>
                            @foreach($kelas_barang_jasa as $j)
                                @if($data->kelas_barang_jasa_id == $j->id)
                                    <option  value='{{$j->id}}' selected>{{$j->nama_kelas_barang_jasa}}</option>
                                @else
                                    <option  value='{{$j->id}}'>{{$j->nama_kelas_barang_jasa}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                      Jenis barang/jasa      :
                    </label>
                    <div class="col-sm-10">
                       <input class="form-control" type="text"  name="jenis_barang_jasa" placeholder="Deskripsi Jenis barang/jasa" value="{{$data->kelas_barang_jasa->deskripsi}}" disabled>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Kuasa</h3>
            </div>
            <div class="box-body">
               <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Nama  Kuasa:
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="kuasa_nama" placeholder="Nama Kuasa" required="true" value="{{$data->kuasa_nama}}">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Alamat Kuasa  :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="kuasa_alamat" placeholder="Alamat Kuasa" required="true" value="{{$data->kuasa_alamat}}">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Telepon Kuasa :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="kuasa_telepon" placeholder="Telepon Kuasa" required="true" value="{{$data->kuasa_telpon}}">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Email  Kuasa :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="kuasa_email" placeholder="Email Kuasa" required="true" value="{{$data->kuasa_email}}">
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
                    <label class="col-sm-2 control-label">
                       Warna-warna etiket :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Warna-warna etiket merek" name='warna_etiket'>{{$data->warna_warna_etiket}}</Textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Arti bahasa/huruf :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Arti bahasa/huruf" name='arti_etiket'>{{$data->arti_etiket_merek}}</Textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Gambar Etiket Merek :
                    </label>
                    <div class="col-sm-9">
                        <a href="/download/merek/etiket-merek/{{$data->etiket_merek}}" class="btn btn-success" target="_blank"><i class="fa fa-download"></i></a>
                        <a href="#" data-target="dokumenprioritas" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i> Ubah file</a>
                        <div id="dokumenprioritas" class="row edit-file-form">
                        <div class="col-sm-12 file-control">
                            <label for="">Ubah file: </label>
                            <input type="file" name="etiket_merek" value="">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="{{$data->id}}">
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary" style="margin-bottom: 20px;">Simpan</button>
      </form>
    </div>
@endsection

@section('js')
      <script src="{{ asset('/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

      <script>
            $('.datepicker').datepicker({
                autoclose: true
            });
            $('.edit-file-form').toggleClass("hidden");
            $('.edit-file-btn').click(function (e) {
                e.preventDefault();
                $('#'+ $(this).data('target')).toggleClass("hidden");
            });
      </script>
@endsection
