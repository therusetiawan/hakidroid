@extends('layouts.userlayout')


@section('title')
  Formulir Pengajuan Hak Cipta
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
      <h2>Formulir Pengajuan Hak Cipta</h2>

      <form action="#">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Paten</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Nama Ciptaan :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Nama Ciptaan" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Jenis Ciptaan :
                    </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="jenisciptaan">
                            <option disabled>--- Pilih Jenis Ciptaan ----</option>
                            <option value="1">Test 1</option>
                            <option value="1">Test 2</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Uraian Ciptaan	 :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Uraian mengenai Ciptaan"></Textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Tempat pertama kali diumumkan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Tempat pertama kali barang ciptaaan diumumkan " required="true">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Tanggal Pertama kali diumumkan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="datepicker form-control" type="text"  name="judul" placeholder="Tanggal pertama kali barang ciptaaan diumumkan " required="true">
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Pencipta</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Nama	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Nama Pencipta" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Kewarganegaraan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Kewarganegaraan Pencipta " required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Alamat	 :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Uraian mengenai Ciptaan"></Textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Data Pemegang Hak Cipta</h3>
            </div>
            <div class="box-body">
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Nama	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Nama Pemegang Hak Cipt" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Kewarganegaraan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Kewarganegaraan Pemegang Hak Cipta" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Alamat	 :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Alamat Pemegang Hak Cipta"></Textarea>
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
                       Nama	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Nama Kuasa" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Kewarganegaraan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="judul" placeholder="Kewarganegaraan Kuasa" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Alamat	 :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Alamat Kuasa"></Textarea>
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
      </script>
@endsection
