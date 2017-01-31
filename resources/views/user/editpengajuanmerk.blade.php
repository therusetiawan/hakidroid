@extends('layouts.userlayout')

@section('title')
  Sunting "Judul" - Pengajuan Hak Merk
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
      <h2>Sunting "Judul" - Pengajuan Hak Merk</h2>

      <form action="#">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Merk</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Nama Merk :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Nama Merk" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Kewarganegaraan
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Kewarganegaraan" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Alamat	 :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Alamat..."></Textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Kelas barang/jasa	 :
                    </label>
                    <div class="col-sm-4">
                        <select name="kelasmerk" class="form-control">
                            <option value="">---- Pilih Kelas ----</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                      Jenis barang/jasa 	 :
                    </label>
                    <div class="col-sm-10">
                       <input class="form-control" type="text"  name="judul" placeholder="Kewarganegaraan Pemegang Hak Cipta" required="true">                    
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
                       Nama	 Kuasa:
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Nama Kuasa" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Alamat Kuasa	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Kewarganegaraan Kuasa" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Telepon Kuasa :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Telepon Kuasa" required="true">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Email  Kuasa :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Email Kuasa" required="true">
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
                    <div class="col-sm-9">
                        <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
                        <a href="#" data-target="dokumenprioritas" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i> Ubah file</a>
                        <div id="dokumenprioritas" class="row edit-file-form">
                        <div class="col-sm-12 file-control">
                            <label for="">Ubah file: </label>
                            <input type="file" name="dokumenprioritas" value="">
                        </div>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Arti bahasa/huruf :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="..."></Textarea>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-bottom: 20px;">Kirim</button>
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
