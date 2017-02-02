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

      <form action="/pengajuan-hak-cipta">
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
                        <input class="form-control" type="text"  name="nama_ciptaan" placeholder="Nama Ciptaan" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Jenis Ciptaan :
                    </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="jenis_hak_cipta_id">
                            <option disabled selected>--- Pilih Jenis Ciptaan ----</option>
                            @foreach($jenis_hak_cipta as $j)
                                <option value='{{$j->id}}'>{{$j->nama_jenis_hak_cipta}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Uraian Ciptaan	 :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Uraian mengenai Ciptaan" name='uraian_ciptaan'></Textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Tempat pertama kali diumumkan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="tempat_diumumkan" placeholder="Tempat pertama kali barang ciptaaan diumumkan " required="true">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Tanggal Pertama kali diumumkan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="datepicker form-control" type="text"  name="tanggal_diumumkan" placeholder="Tanggal pertama kali barang ciptaaan diumumkan " required="true">
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
                        <input class="form-control" type="text"  name="pencipta_nama" placeholder="Nama Pencipta" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Kewarganegaraan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="pencipta_kewarganegaraan" placeholder="Kewarganegaraan Pencipta " required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Alamat	 :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Uraian mengenai Ciptaan" name='pencipta_alamat'></Textarea>
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
                        <input class="form-control" type="text"  name="pemegang_hak_cipta_nama" placeholder="Nama Pemegang Hak Cipt" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Kewarganegaraan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="pemegang_hak_cipta_kewarganegaraan" placeholder="Kewarganegaraan Pemegang Hak Cipta" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Alamat	 :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Alamat Pemegang Hak Cipta" name='pemegang_hak_cipta_alamat'></Textarea>
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
                        <input class="form-control" type="text"  name="kuasa_nama" placeholder="Nama Kuasa" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Kewarganegaraan	 :
                    </label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text"  name="kuasa_kewarganegaraan" placeholder="Kewarganegaraan Kuasa" required="true">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 control-label">
                       Alamat	 :
                    </label>
                    <div class="col-sm-10">
                        <Textarea rows=4 class="form-control" placeholder="Alamat Kuasa" name='kuasa_alamat'></Textarea>
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
