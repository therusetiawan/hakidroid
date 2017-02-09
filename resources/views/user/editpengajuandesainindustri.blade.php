@extends('layouts.userlayout')

@section('title')
    Sunting "{{$data->judul_desain_industri}}" - Desain Industri
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
    <h2>Sunting "{{$data->judul_desain_industri}}" - Desain Industri</h2>
    <form class="" action="/edit-pengajuan-industri" method="post" enctype="multirpart/form-data">
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
              <input class="form-control" type="text"  name="judul_desain_industri" placeholder="Judul Desain Industri" required="true" value="{{$data->judul_desain_industri}}">
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Konsultan Haki :
            </label>
            <div class="col-sm-10">
              @if($data->konsultan != null)
              <div class="checkbox">
                <label> <input type="checkbox" name="konsultan_hki" id="dengankonsultan" checked> <i>*) Centang jika menggunakan konsultan HAKI</i></label>
              </div>
              <input class="form-control" type="text" id="konsultanid" name="konsultan_hki_id" value="{{$data->konsultan}}" placeholder="Nama Konsultan HAKI">
              @else
              <div class="checkbox">
                <label> <input type="checkbox" name="konsultan_hki" id="dengankonsultan"> <i>*) Centang jika menggunakan konsultan HAKI</i></label>
              </div>
              <input class="form-control" type="text" id="konsultanid" name="konsultan_hki_id" value="" placeholder="Nama Konsultan HAKI">
              @endif
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
                @foreach($data->pendesain as $p)
                <tr>
                  <td><input type="text" class="form-control" name="nama_desainer[]" placeholder="Nama Desainer" value="{{$p->nama}}"></td>
                  <td><input type="text" class="form-control" name="kewarganegaraan[]" placeholder="Asal Negara Desainer" value="{{$p->kewarganegaraan}}"></td>
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
                @if($data->hak_prioritas == 1)
                <label><input type="checkbox" name="hak_prioritas" id="denganprioritas" checked> <i>*) centang jika menggunakan hak prioritas</i></label>
                @else
                <label><input type="checkbox" name="hak_prioritas" id="denganprioritas"> <i>*) centang jika menggunakan hak prioritas</i></label>
                @endif
              </div>
            </div>
          </div>
          <div class="row form-group">
              @if($data->hak_prioritas == 1)
              <div class="row" id="form-prioritas">
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Negara:
                  </label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text"  name="negara" placeholder="Negara" value="{{$data->negara}}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Tanggal penerimaan permohonan pertama kali:
                  </label>
                  <div class="col-sm-12">
                    <input class="datepicker form-control" type="text"  name="tanggal_permohonan_pertama_kali" placeholder="Tanggal penerimaan permohonan" value="$data->tanggal_penerimaan_permohonan_pertama_kali}}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Nomor prioritas:
                  </label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text"  name="nomor_prioritas" placeholder="Nomor Prioritas" value="{{$data->nomor_prioritas}}">
                  </div>
                </div>
              </div>
              @else
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
                    <input class="datepicker form-control" type="text"  name="tanggal_permohonan_pertama_kali" placeholder="Tanggal penerimaan permohonan">
                  </div>
                </div>
                <div class="col-sm-4">
                  <label class="col-sm-12 control-label">
                    Nomor prioritas:
                  </label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text"  name="nomor_prioritas" placeholder="Nomor Prioritas ">
                  </div>
                </div>
              </div>
              @endif
          </div>

          <div class="row form-group">
            <label class="col-sm-2 label-control">Kelas Industri</label>
            <div class="col-sm-10">
              <select class="form-control" name="kelas_desain_industri">
                <option value="">--- Pilih Kelas Industri ---</option>
                @foreach($kelas_desain_industri as $k)
                  @if($data->kelas_desain_industri_id == $k->id)
                    <option value="{{$k->id}}" selected>{{$k->nama_kelas_desain_industri}}</option>
                  @lse
                    <option value="{{$k->id}}">{{$k->nama_kelas_desain_industri}}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-3">Surat kuasa</label>
            <div class="col-sm-9">
                @if($data->lampiran_surat_kuasa != null)
                  <a href="/download/desain-industri/surat-kuasa/{{$data->lampiran_surat_kuasa}}" class="btn btn-success" target="_blank"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="suratkuasa" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratkuasa" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="lampiran_surat_kuasa" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat pernyataan pengalihan hak atas desain industri</label>
            <div class="col-sm-9">
                @if($data->lampiran_surat_pernyataan_pengalihan_hak != null)
                  <a href="/download/desain-industri/surat-pengalihan-hak/{{$data->lampiran_surat_pernyataan_pengalihan_hak}}" class="btn btn-success" target="_blank"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="suratpernyataan" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="suratpernyataan" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="lampiran_surat_pernyataan_pengalihan_hak" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Bukti pemilikan hak atas desain industri</label>
            <div class="col-sm-9">
                @if($data->lampiran_bukti_pemilikan_hak != null)
                  <a href="/download/desain-industri/bukti-pemilikan-hak/{{$data->lampiran_bukti_pemilikan_hak}}" class="btn btn-success" target='_blank'><i class="fa fa-download"></i> </a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="buktipemilik" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="buktipemilik" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="lampiran_bukti_pemilikan_hak" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Bukti prioritas dan terjemahannya</label>
            <div class="col-sm-9">
                @if($data->lampiran_bukti_prioritas_dan_terjemahan != null)
                  <a href="/download/desain-industri/bukti-prioritas-terjemahan/{{$data->lampiran_bukti_prioritas_dan_terjemahan}}" class="btn btn-success" target="_blank"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="buktiprioritas" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="buktiprioritas" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="lampiran_bukti_prioritas_dan_terjemahan" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen (permohonan) desain industri dengan prioritas dan terjemahannya</label>
            <div class="col-sm-9">
                @if($data->lampiran_dokumen_desain_industri != null)
                  <a href="/download/desain-industri/dokumen/{{$data->lampiran_dokumen_desain_industri}}" class="btn btn-success" target="_blank"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="dokumenpermohonan" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="dokumenpermohonan" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="lampiran_dokumen_desain_industri" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Uraian desain industri atau keterangan gambar</label>
            <div class="col-sm-9">
                @if($data->uraian != null)
                  <a href="/download/desain-industri/uraian/{{$data->uraian[0]->nama}}" class="btn btn-success" target="_blank"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="uraiandesain" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="uraiandesain" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="uraian_desain_industri" value="">
                  </div>
                </div>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Gambar-gambar atau foto-foto desain industri:</label>
            <div class="col-sm-9">
                @if($data->gambar_foto != null)
                  <a href="/download/desain-industri/gambar/{{$data->gambar_foto[0]->gambar_foto}}" class="btn btn-success" target="_blank"><i class="fa fa-download"></i></a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-download"></i></a>
                @endif
                <a href="#" data-target="gambardesain" class="btn btn-primary edit-file-btn"><i class="fa fa-pencil"></i></a>
                <div id="gambardesain" class="row edit-file-form">
                  <div class="col-sm-12 file-control">
                      <label for="">Ubah file: </label>
                      <input type="file" name="gambar_desain_industri" value="">
                  </div>
                </div>
            </div>
          </div>

        </div>
      </div>

      {{csrf_field()}}
      <button class="btn btn-primary btn-lg" name="button">Sunting</button>
      <div style="margin-bottom: 20px"></div>

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

        if($('#dengankonsultan').is(':checked')){
          $('#konsultanid').slideDown(300);
        }
        if($('#denganprioritas').is(':checked')){
          $('#form-prioritas').slideDown(300); 
        }
    });

    $('.edit-file-form').toggleClass("hidden");
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

    $('.edit-file-btn').click(function (e) {
      e.preventDefault();
      $('#'+ $(this).data('target')).toggleClass("hidden");
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
    
    //datepciker
    $('.datepicker').datepicker({
       autoclose: true,
       format: 'yyyy-mm-dd'
    });
  </script>
@endsection
