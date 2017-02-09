@extends('layouts.userlayout')

@section('title')
  Sunting "{{$data->judul_invensi}}" - Pengajuan Paten
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
    <h2>Sunting "{{$data->judul_invensi}}" - Pengajuan Paten</h2>
    <form class="" action="/edit-pengajuan-paten" method="post" enctype="multipart/form-data">
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
              <input class="form-control" type="text"  name="judul_invensi" placeholder="Judul Invensi" required="true" value="{{$data->judul_invensi}}">
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Jenis Paten :
            </label>
            <div class="col-sm-3">
              <select name="jenis_paten" class="form-control">
                @if($data->jenis_paten == "Paten")
                  <option value="Paten">Paten</option>
                  <option value="Paten_Sederhana">Paten Sederhana</option>
                @else
                  <option value="Paten">Paten</option>
                  <option value="Paten_Sederhana" selected>Paten Sederhana</option>
                @endif
              </select>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nomor Pecahan Paten :
            </label>
            <div class="col-sm-10">
              @if($data->paten_pecahan_nomor != null)
                <div class="checkbox">
                  <label> <input type="checkbox" name="nomor_pecahan_check" id="denganpecahan" checked> <i>*) Centang jika menggunakan pecahan Paten</i></label>
                </div>
                <input class="form-control" type="text" id="formpecahan" name="nomor_pecahan" placeholder="Nomor Paten" value="{{$data->paten_pecahan_nomor}}">
              @else
                <div class="checkbox">
                  <label> <input type="checkbox" name="nomor_pecahan_check" id="denganpecahan"> <i>*) Centang jika menggunakan pecahan Paten</i></label>
                </div>
                <input class="form-control" type="text" id="formpecahan" name="nomor_pecahan" placeholder="Nomor Paten">
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Konsultan Haki :
            </label>
            <div class="col-sm-10">
              @if($data->konsultan != null)
                <div class="checkbox">
                  <label> <input type="checkbox" name="konsultan_check" id="dengankonsultan" checked> <i>*) Centang jika menggunakan konsultan HAKI</i></label>
                </div>
                <input class="form-control" type="text" id="konsultanid" name="konsultan" value="{{$data->konsultan}}" placeholder="Nama Konsultan HAKI">
              @else
                <div class="checkbox">
                  <label> <input type="checkbox" name="konsultan_check" id="dengankonsultan"> <i>*) Centang jika menggunakan konsultan HAKI</i></label>
                </div>
                <input class="form-control" type="text" id="konsultanid" name="konsultan" value="" placeholder="Nama Konsultan HAKI">
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Inventor
            </label>
            <div class="col-sm-10">
              <table class="table table-desainer-with-asal">
                <tr>
                  <td>
                    Nama Inventor
                  </td>
                  <td>
                    Negara Asal
                  </td>
                </tr>
                @foreach($data->inventor as $i)
                <tr>
                  <td><input type="text" class="form-control" name="nama_inventor[]" placeholder="Nama Inventor" value="{{$i->nama}}"></td>
                  <td><input type="text" class="form-control" name="kewarganegaraan[]" placeholder="Asal Negara Inventor" value="{{$i->kewarganegaraan}}"></td>
                  <td>
                    <button type="button" class="btn-delete btn btn-danger" name="button"><i class="fa fa-close"></i></button>
                  </td>
                </tr>
                @endforeach
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
                @if($data->hak_prioritas_id != null)
                <label><input type="checkbox" name="hak_prioritas" id="denganprioritas" selected> <i>*) centang jika menggunakan hak prioritas</i></label>
                @else
                <label><input type="checkbox" name="hak_prioritas" id="denganprioritas"> <i>*) centang jika menggunakan hak prioritas</i></label>
                @endif
              </div>
            </div>
          </div>
          <div class="row form-group">
            @if($data->hak_prioritas_id != null)
              <div class="row" id="form-prioritas">
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Nama:
                  </label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text"  name="hak_prioritas_nama" placeholder="Negara" value="{{$data->hak_prioritas->nama}}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Tanggal penerimaan permohonan pertama kali:
                  </label>
                  <div class="col-sm-12">
                    <input class="datepicker form-control" type="text"  name="hak_prioritas_tanggal" placeholder="Tanggal penerimaan permohonan" value="{{$data->hak_prioritas->tanggal_penerimaan_permohonan}}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Nomor prioritas:
                  </label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text"  name="hak_prioritas_nomor" placeholder="Nomor Prioritas"  value="{{$data->hak_prioritas->nomor_prioritas}}">
                  </div>
                </div>
              </div>
            @else
              <div class="row" id="form-prioritas">
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Nama:
                  </label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text"  name="hak_prioritas_nama" placeholder="Negara">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Tanggal penerimaan permohonan pertama kali:
                  </label>
                  <div class="col-sm-12">
                    <input class="datepicker form-control" type="text"  name="hak_prioritas_tanggal" placeholder="Tanggal penerimaan permohonan">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Nomor prioritas:
                  </label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text"  name="hak_prioritas_nomor" placeholder="Nomor Prioritas">
                  </div>
                </div>
              </div>
            @endif
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
                @if($data->dokumen_subtantif_deskripsi[0] != null)
                  <a href="/download/paten/dokumen-subtantif-deskripsi/{{$data->dokumen_subtantif_deskripsi[0]->nama_file}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="uraianfile" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="uraianfile" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="uraian_file" value="">
                  </div>
                </div>
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-3">File Gambar</label>
            <div class="col-sm-9">
                @if($data->dokumens_subtantif_gambar[0] != null)
                  <a href="/download/paten/dokumen-subtantif-gambar/{{$data->dokumen_subtantif_gambar[0]->nama_file}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="gambarfile" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="gambarfile" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="gambar_file" value="">
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
                @if($data->surat_kuasa != null)
                  <a href="/download/paten/surat-kuasa/{{$data->surat_kuasa}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="suratkuasa" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratkuasa" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="surat_kuasa" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Pengalihan Hak atas Penemuan</label>
            <div class="col-sm-9">
                @if($data->surat_pengalihan_hak_atas_penemuan != null)
                  <a href="/download/paten/surat-pengalihan-hak-atas-penemuan/{{$data->surat_pengalihan_hak_atas_penemuan}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="suratpengalihan" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratpengalihan" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="surat_pengalihan_hak_atas_penemuan" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat kepemilikan invensi atas Inventor</label>
            <div class="col-sm-9">
                @if($data->surat_kepemilikan_invensi_oleh_inventor != null)
                <a href="/download/paten/surat-kepemilikan-atas-inventor/{{$data->surat_kepemilikan_invensi_oleh_inventor}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="suratkepemilikaninvensi" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratkepemilikaninvensi" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="bukti_pemilikan_hak_atas_penemuan_inventor" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Kepemilikan Invensi oleh Lembaga</label>
            <div class="col-sm-9">
                @if($data->surat_pernyataan_invensi_oleh_lembaga != null)
                  <a href="/download/paten/surat-pernyataan-invensi-oleh-lembaga/{{$data->surat_pernyataan_invensi_oleh_lembaga}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="suratpernyataan" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratpernyataan" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="bukti_pemilikan_hak_atas_penemuan_lembaga" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen Prioritas Terjemahan</label>
            <div class="col-sm-9">
                @if($data->dokumen_prioritas_terjemahan != null)
                  <a href="/download/paten/dokumen-terjemahan/{{$data->dokumen_prioritas_terjemahan}}" class="btn btn-success"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success  disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="dokumenprioritas" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="dokumenprioritas" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="dokumen_prioritas_terjemahan" value="">
                  </div>
                </div>
            </div>
          </div>

        </div>
      </div>
      {{csrf_field()}}
      <button class="btn btn-primary" name="button">Simpan</button>
      <div class="" style="height: 20px">
      </div>
      {{-- End Box Form --}}
    </form>
  </div>
@endsection

@section('js')
  <script src="{{ asset('/admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#form-prioritas').hide();
        $('#konsultanid').hide();
        $('#formpecahan').hide();

        if($('#dengankonsultan').is(':checked')){
          $('#konsultanid').slideDown(300);
        }
        if($('#denganprioritas').is(':checked')){
          $('#form-prioritas').slideDown(300); 
        }
        if($('#denganpecahan').is(':checked')){
          $('#formpecahan').slideDown(300);
        } 
    });

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
       autoclose: true,
       format: 'yyyy-mm-dd'
    });
  </script>
@endsection
