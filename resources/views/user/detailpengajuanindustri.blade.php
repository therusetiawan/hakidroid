@extends('layouts.userlayout')

@section('title')
  Detail "{{$data->judul_desain_industri}}" - Detail Pengajuan Desain Industri
@endsection
@section('header')
@endsection

@section('content')
  <div class="container">
    <div class="col-sm-12">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Ajuan</a></li>
        <li><a href="#">Desain Industri</a></li>
        <li class="active">{{$data->judul_desain_industri}}</li>
      </ol>
    </div>
    <div class="content-header">
      @if($data->status == 1)
        <h3 class="title">Detail Pengajuan Desain Industri : {{$data->judul_desain_industri}} <small class="label label-success pull-right"><i class="fa fa-check"></i> Pengajuan Diterima</small></h3>
      @elseif($data->status == 0)
        <h3 class="title">Detail Pengajuan Desain Industri : {{$data->judul_desain_industri}} <small class="label label-warning pull-right"><i class="fa fa-close"></i> Proses Pengajuan</small></h3>
      @endif
    </div>

    <div class="content">

      {{-- Box Data Pengajuan --}}
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
              <p>{{$data->judul_desain_industri}}</p>
            </div>
          </div>

          @if($data->konsultan != null)
            <div class="row form-group">
              <label class="col-sm-2 control-label">
                Konsultan Haki :
              </label>
              <div class="col-sm-10">
                <p>{{$data->konsultan}}</p>
              </div>
            </div>
          @endif
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Desainer :
            </label>
            <div class="col-sm-10">
              <ol>
                @foreach($data->pendesain as $d)
                  <li>{{$d->nama}} ({{$d->kewarganegaraan}})</li>
                @endforeach
              </ol>
            </div>
          </div>

          <div class="row">
            <label class="col-xs-2 control-label">Pengajuan dengan hak prioritas :</label>
            <div class="col-xs-10">
              @if($data->hak_prioritas == 1)
              <p>Ya</p>
              @else
              <p>Tidak</p>
              @endif
            </div>
          </div>

          @if($data->hak_prioritas == 1)
          <div class="row form-group">
              <div class="row" id="form-prioritas">
                <div class="col-sm-12">
                  <label class="col-sm-2 control-label">
                    Negara:
                  </label>
                  <div class="col-sm-10">
                    <p>{{$data->negara}}</p>
                  </div>
                </div>
                <div class="col-sm-12">
                  <label class="col-sm-2 control-label">
                    Tanggal penerimaan permohonan pertama kali:
                  </label>
                  <div class="col-sm-10">
                    <p>{{$data->tanggal_penerimaan_permohonan_pertama_kali}}</p>
                  </div>
                </div>
                <div class="col-sm-12">
                  <label class="col-sm-2 control-label">
                    Nomor prioritas:
                  </label>
                  <div class="col-sm-10">
                    <p>{{$data->nomor_prioritas}}</p>
                  </div>
                </div>
              </div>
          </div>
          @endif

          <div class="row form-group">
            <label class="col-sm-2 label-control">Kelas Industri</label>
            <div class="col-sm-10">
              {{$data->kelas_desain_industri->nama_kelas_desain_industri}}
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
              <label class="col-sm-6">Surat kuasa</label>
              <div class="col-sm-6">
                @if($data->lampiran_surat_kuasa != null)
                  <a href="/download/desain-industri/surat-kuasa/{{$data->lampiran_surat_kuasa}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Surat pernyataan pengalihan hak atas desain industri</label>
              <div class="col-sm-6">
                @if($data->lampiran_surat_pernyataan_pengalihan_hak != null)
                  <a href="/download/desain-industri/surat-pengalihan-hak/{{$data->lampiran_surat_pernyataan_pengalihan_hak}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Bukti pemilikan hak atas desain industri</label>
              <div class="col-sm-6">
                @if($data->lampiran_bukti_pemilikan_hak != null)
                  <a href="/download/desain-industri/bukti-pemilikan-hak/{{$data->lampiran_bukti_pemilikan_hak}}" class="btn btn-success" target='_blank'><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Bukti prioritas dan terjemahannya</label>
              <div class="col-sm-6">
                @if($data->lampiran_bukti_prioritas_dan_terjemahan != null)
                  <a href="/download/desain-industri/bukti-prioritas-terjemahan/{{$data->lampiran_bukti_prioritas_dan_terjemahan}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Dokumen (permohonan) desain industri </label>
              <div class="col-sm-6">
                @if($data->lampiran_dokumen_desain_industri != null)
                  <a href="/download/desain-industri/dokumen/{{$data->lampiran_dokumen_desain_industri}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Uraian desain industri atau keterangan gambar</label>
              <div class="col-sm-6">
                @if($data->uraian->count() > 0)
                  <a href="/download/desain-industri/uraian/{{$data->uraian[0]->nama}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>

            <div class="row form-group">
              <label class="col-sm-6">Gambar-gambar atau foto-foto desain industri:</label>
              <div class="col-sm-6">
                @if($data->gambar_foto->count() > 0)
                  <a href="/download/desain-industri/gambar/{{$data->gambar_foto[0]->gambar_foto}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
                @else
                  <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
                @endif
              </div>
            </div>
          </div>
        </div>
  </div>
@endsection
