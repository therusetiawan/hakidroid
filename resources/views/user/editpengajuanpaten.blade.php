@extends('layouts.userlayout')

@section('title')
  Formulir Pengajuan Paten
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
    <h2>Formulir Pengajuan Paten</h2>
    <form class="" action="index.html" method="post">
      {{-- Beginning Box Form --}}
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
              <input class="form-control" type="text"  name="judul" placeholder="Judul Invensi" required="true">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Jenis Paten :
            </label>
            <div class="col-sm-3">
              <select name="jenis_paten" class="form-control">
                <option value="Paten">Paten</option>
                <option value="Paten Sederhana">Paten Sederhana</option>
              </select>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nomor Pecahan Paten :
            </label>
            <div class="col-sm-10">
              <div class="checkbox">
                <label> <input type="checkbox" name="dengannomorpecahan" id="denganpecahan"> <i>*) Centang jika menggunakan pecahan Paten</i></label>
              </div>
              <input class="form-control" type="text" id="formpecahan" name="pecahan" placeholder="Nomor Paten" required="true">
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
              Investor
            </label>
            <div class="col-sm-10">
              <table class="table table-desainer-with-asal">
                <tr>
                  <td>
                    Nama Investor
                  </td>
                  <td>
                    Negara Asal
                  </td>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" name="namadesainer[]" placeholder="Nama Investor"></td>
                  <td><input type="text" class="form-control" name="wndesainer[]" placeholder="Asal Negara Investor"></td>
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

        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran Subtantif</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-3">File Uraian</label>
            <div class="col-sm-9">
                <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
                <a href="#" data-target="uraianfile" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="uraianfile" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="uraianfile" value="">
                  </div>
                </div>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-3">File Gambar</label>
            <div class="col-sm-9">
                <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
                <a href="#" data-target="gambarfile" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="gambarfile" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="gambarfile" value="">
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran Formatif</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-3">Surat kuasa</label>
            <div class="col-sm-9">
                <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
                <a href="#" data-target="suratkuasa" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratkuasa" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="suratkuasa" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Pengalihan Hak atas Penemuan</label>
            <div class="col-sm-9">
                <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
                <a href="#" data-target="suratpengalihan" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratpengalihan" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="suratpengalihan" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat kepemilikan invensi atas Inventor</label>
            <div class="col-sm-9">
                <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
                <a href="#" data-target="suratkepemilikaninvensi" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratkepemilikaninvensi" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="suratkepemilikaninvensi" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat pernyataan invensi oleh lembaga</label>
            <div class="col-sm-9">
                <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
                <a href="#" data-target="suratpernyataan" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratpernyataan" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="suratpernyataan" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen Prioritas Terjemahan</label>
            <div class="col-sm-9">
                <a href="#" class="btn btn-success"><i class="fa fa-download"></i></a>
                <a href="#" data-target="dokumenprioritas" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="dokumenprioritas" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="dokumenprioritas" value="">
                  </div>
                </div>
            </div>
          </div>

        </div>
      </div>

      <button class="btn btn-primary" name="button">Submit</button>

      <div class="" style="height: 20px">

      </div>
      {{-- End Box Form --}}
    </form>
  </div>
@endsection

@section('js')
  <script src="{{ asset('/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

  <script type="text/javascript">
    $('.edit-file-form').toggleClass("hidden");
    $('.edit-file-btn').click(function (e) {
      e.preventDefault();
      $('#'+ $(this).data('target')).toggleClass("hidden");
    });

    $('.add-orang').click(function() {
      var form1 = '<td><input type="text" class="form-control" name="namadesainer[]" placeholder="Nama Investor"></td>';
      var form2 = '<td><input type="text" class="form-control" name="wndesainer[]" placeholder="Asal Negara Investor"></td>';
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
    $('#formpecahan').hide();

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

    $('#denganpecahan').change(function() {
      if (this.checked) {
        $('#formpecahan').slideDown(300);
      } else {
        $('#formpecahan').slideUp(300);
      }
    });


    //datepciker
    $('.datepicker').datepicker({
       autoclose: true
    });
  </script>
@endsection
