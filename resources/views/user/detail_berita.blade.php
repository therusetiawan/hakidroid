@extends('layouts.app')

@section('header')
  <style media="screen">

  </style>
@endsection

@section('content')
  @include('components.indexnavbar')
  <div class="container">
    {{-- Berita --}}
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="box box-primary">
          <div class="box-header">
              <h4 class="box-title"><i class="fa fa-newspaper-o"></i> Berita</h4>
          </div>
          <div class="box-body">
            <div class="media">
              <div class="media-body">
                <div class="col-sm-12">
                  <a href="#">
                    @if($data->foto != null)
                      <img class="media-object" src="/foto_berita/{{$data->foto}}" style="margin:auto; max-height: 250px;">
                    @else
                      <img class="media-object" src="/foto_berita/default.jpg" style="margin:auto; max-height: 250px;">
                    @endif
                  </a>
                </div>
                <div class="col-sm-12">
                  <h4 class="media-heading">{{$data->judul_berita}}</h4>
                  <p>{{$data->created_at->format('d F Y, H:i')}}</p>
                  <p>{{$data->isi_berita}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
