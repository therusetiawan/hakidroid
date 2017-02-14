@extends('layouts.userlayout')

@section('title')
  Detail "{{$data->judul_invensi}}" - Detail Pengajuan Paten
@endsection
@section('header')
@endsection

@section('content')
  <div class="container">
    <div class="content-header">
      <div>
        <ol class="breadcrumb" style="margin-bottom: 0px;">
          <li><a href="/pengajuan"><i class="fa fa-dashboard left"></i> Ajuan</a></li>
          <li><a href="#">Paten</a></li>
          <li class="active">{{$data->judul_invensi}}</li>
        </ol>
      </div>
    </div>
    <div class="content-header">
      @if($data->status == 1)
        <h3 class="title">Detail Pengajuan Paten : {{$data->judul_invensi}} <small class="label label-success pull-right"><i class="fa fa-check"></i> Pengajuan Diterima</small></h3>
      @elseif($data->status == 0)
        <h3 class="title">Detail Pengajuan Paten : {{$data->judul_invensi}} <small class="label label-warning pull-right"><i class="fa fa-close"></i> Proses Pengajuan</small></h3>
      @endif

    </div>

    <div class="content">
      {{-- Box Data Pengajuan --}}
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
              <p>{{$data->judul_invensi}}</p>
            </div>
          </div>

          @if($data->paten_pecahana_nomor != null)
          <div class="row form-group">
            <label class="col-sm-2 control-label">
              Nomor Pecahan Paten :
            </label>
            <div class="col-sm-10">
              <p>{{$data->paten_pecahana_nomor}}</p>
            </div>
          </div>
          @endif
          @if($data->konsultan != '' and $data->konsultan != null)
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
              Inventor :
            </label>
            <div class="col-sm-10">
              <ol>
                @foreach($data->inventor as $d)
                  <li>{{$d->nama}}</li>
                @endforeach
              </ol>
            </div>
          </div>
          

          {{--
          <div class="row form-group">
            <label class="col-xs-2 control-label">Pengajuan dengan hak prioritas? :</label>
            <div class="col-xs-10">
              <p>Ya</p>
            </div>
          </div>
          <div class="row form-group">
            <div class="row" id="form-prioritas">
              <div class="col-sm-12">
                <label class="col-sm-2 control-label">
                  Negara:
                </label>
                <div class="col-sm-10">
                  <p>lorem</p>
                </div>
              </div>

              <div class="col-sm-12">
                <label class="col-sm-2 control-label">
                  Tanggal penerimaan permohonan pertama kali:
                </label>
                <div class="col-sm-10">
                  <p>lorem</p>
                </div>
              </div>

              <div class="col-sm-12">
                <label class="col-sm-2 control-label">
                  Nomor prioritas:
                </label>
                <div class="col-sm-10">
                  <p>lorem</p>
                </div>
              </div>

            </div>
          </div>
          --}}
        </div>
      </div> 
      {{-- Box Lampiran --}}

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran Dokumen Formatif</h3>
        </div>
        <div class="box-body">
          <div class="row form-group">
            <label class="col-sm-3">Surat kuasa</label>
            <div class="col-sm-9">
              @if($data->surat_kuasa != null)
                <a href="/download/paten/surat-kuasa/{{$data->surat_kuasa}}" class="btn btn-success"  target='_blank'><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Pengalihan Hak atas Penemuan</label>
            <div class="col-sm-9">
              @if($data->surat_pengalihan_hak_atas_penemuan != null)
                <a href="/download/paten/surat-pengalihan-hak-penemuan/{{$data->surat_pengalihan_hak_atas_penemuan}}" class="btn btn-success" target="_blank"><i class="fa fa-check" target='_blank'></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Kepemilikan Invensi oleh Inventor</label>
            <div class="col-sm-9">
              @if($data->surat_kepemilikan_invensi_oleh_inventor != null)
                <a href="/download/paten/surat-kepemilikan-inventor/{{$data->surat_kepemilikan_invensi_oleh_inventor}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Surat Kepemilikan Invensi oleh Lembaga</label>
            <div class="col-sm-9">
              @if($data->surat_pernyataan_invensi_oleh_lembaga != null)
                <a href="/download/paten/surat-pernyataan-invensi-oleh-lembaga/{{$data->surat_pernyataan_invensi_oleh_lembaga}}" class="btn btn-success" target='_blank'><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">Dokumen Prioritas Terjemahan</label>
            <div class="col-sm-9">
              @if($data->dokumen_prioritas_terjemahan != null)
                <a href="/download/paten/dokumen-terjemahan/{{$data->dokumen_prioritas_terjemahan}}" class="btn btn-success" target='_blank'><i class="fa fa-check" ></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div  class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Lampiran Dokumen Subtantif</h3>
        </div>
        <div class='box-body'>
          <div class="row form-group">
            <label class="col-sm-3">File Uraian</label>
            <div class="col-sm-9">
              @if($data->dokumen_subtantif_deskripsi->count() > 0)
                <a href="/download/paten/dokumen-subtantif-deskripsi/{{$data->dokumen_subtantif_deskripsi[0]->nama_file}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>  
              @endif
            </div>
          </div>

          <div class="row form-group">
            <label class="col-sm-3">File Gambar</label>
            <div class="col-sm-9">
              @if($data->dokumen_subtantif_gambar->count() > 0)
                <a href="/download/paten/dokumen-subtantif-gambar/{{$data->dokumen_subtantif_gambar[0]->nama_file}}" class="btn btn-success" target="_blank"><i class="fa fa-check"></i> Sudah terunggah</a>
              @else
                <a href="#" class="btn btn-success disabled"><i class="fa fa-close"></i> Belum terunggah</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
