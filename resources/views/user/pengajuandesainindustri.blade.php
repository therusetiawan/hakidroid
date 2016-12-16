@extends('layouts.userlayout')

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
    <h2>Formulir Pengajuan HAKI Desain Industri</h2>
    <form class="" action="index.html" method="post">
      {{-- Beginning Box Form --}}
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
              <input class="form-control" type="text"  name="judul" placeholder="Judul Desain Industri" required="true">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Konsultan Haki :
            </label>
            <div class="col-sm-10">
              <div class="checkbox">
                <label> <input type="checkbox" name="dengankonsultan" id="dengankonsultan"> <i>*) Centang jika menggunakan konsultan HAKI</i></label>
              </div>
              <input class="form-control" type="text" id="konsultanid" name="konsultan" value="" placeholder="Nama Konsultan HAKI">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Desainer
            </label>
            <div class="col-sm-10">
              <table class="table table-desainer-with-asal">
                <tr>
                  <td>
                    Nama
                  </td>
                  <td>
                    Negara Asal
                  </td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="namadesainer[]" placeholder="Nama Desainer"></td>
                  <td><input type="text" class="form-control" name="wndesainer[]" placeholder="Asal Negara Desainer"></td>
                  <td>
                    <button type="button" class="btn-delete btn btn-danger" name="button"><i class="fa fa-close"></i></button>
                  </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <button type="button" class="add-orang btn btn-primary" name="button"><i class="fa fa-plus"></i> Tambah Orang</button>
                  </td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row">
            <label class="col-xs-2 control-label">Pengajuan dengan hak prioritas? :</label>
            <div class="col-xs-10">
              <div class="checkbox">
                <label><input type="checkbox" name="denganprioritas" id="denganprioritas"> <i>*) centang jika menggunakan hak prioritas</i></label>
              </div>
            </div>
          </div>
          <div class="row form-group">
              <div class="row" id="form-prioritas">
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Negara:
                  </label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text"  name="negara" placeholder="Negara">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Tanggal penerimaan permohonan pertama kali:
                  </label>
                  <div class="col-sm-12">
                    <input class="datepicker form-control" type="text"  name="tglpermohonan" placeholder="Tanggal penerimaan permohonan">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Nomor prioritas:
                  </label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text"  name="noprioritas" placeholder="Nomor Prioritas ">
                  </div>
                </div>
              </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 label-control">Kelas Industri</label>
            <div class="col-sm-10">
              <select class="form-control" name="kelasindusri">
                <option value="">--- Pilih Kelas Industri ---</option>
                <option value="">Hardware</option>
                <option value="">Software</option>
                <option value="">Kerajinan</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      {{--  lampiran formatif --}}
      <div class="">

      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran Karya</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-3">Surat kuasa</label>
            <div class="col-sm-9">
              <input type="file" name="name" value="">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat pernyataan pengalihan hak atas desain industri</label>
            <div class="col-sm-9">
              <input type="file" name="name" value="">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Bukti pemilikan hak atas desain industri</label>
            <div class="col-sm-9">
              <input type="file" name="name" value="">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Bukti prioritas dan terjemahannya</label>
            <div class="col-sm-9">
              <input type="file" name="name" value="">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen (permohonan) desain industri dengan prioritas dan terjemahannya</label>
            <div class="col-sm-9">
              <input type="file" name="name" value="">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Uraian desain industri atau keterangan gambar</label>
            <div class="col-sm-9">
              <input type="file" name="name" value="">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Gambar-gambar atau foto-foto desain industri:</label>
            <div class="col-sm-9">
              <input type="file" name="name" value="">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Contoh fisik</label>
            <div class="col-sm-9">
              <input type="file" name="name" value="">
            </div>
          </div>

        </div>
      </div>

      <button class="btn btn-primary" name="button">Submit</button>

      {{-- End Box Form --}}
    </form>
  </div>
@endsection

@section('js')
  <script src="{{ asset('/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

  <script type="text/javascript">
    $('.add-orang').click(function() {
      var form1 = '<td><input type="text" class="form-control" name="namadesainer[]" placeholder="Nama Desainer"></td>';
      var form2 = '<td><input type="text" class="form-control" name="wndesainer[]" placeholder="Asal Negara Desainer"></td>';
      var btndel = '<td><button type="button" class="btn-delete btn btn-danger" name="button"><i class="fa fa-close"></i></button></td>'
      $(this).parent().parent().before('<tr>' + form1 + form2 + btndel +'</tr>')
      .fadeIn('slow');
    });
    $(document).on('click', '.btn-delete', function() {
      $(this).parent().parent().fadeOut('fast', function() {
        $(this).remove();
      });
    });

    $('#form-prioritas').hide();
    $('#konsultanid').hide();

    $('#denganprioritas').change(function() {
      if (this.checked) {
        $('#form-prioritas').slideDown(300);
      } else {
        $('#form-prioritas').slideUp(300);
      }
    });

    $('#dengankonsultan').change(function() {
      if (this.checked) {
        $('#konsultanid').slideDown(300);
      } else {
        $('#konsultanid').slideUp(300);
      }
    });


    //datepciker
    $('.datepicker').datepicker({
       autoclose: true
    });
  </script>
@endsection
