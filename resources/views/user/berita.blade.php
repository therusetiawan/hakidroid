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
            @if($berita->count() > 0)
              @foreach($berita as $b)
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    @if($b->foto != null)
                      <img class="media-object" src="/foto_berita/{{$b->foto}}" style="margin:0 10px 0 10px; width: 120px;">
                    @else
                      <img class="media-object" src="/foto_berita/default.jpg" style="margin:0 10px 0 10px; width: 120px;">
                    @endif
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">{{$b->judul_berita}}</h4>
                  <p>{{$b->created_at->format('d F Y, H:i')}}</p>
                  <p>{{$b->isi_berita}}</p>
                  <a href="/berita/{{$b->id}}">Baca Selengkapnya...</a>
                </div>
              </div>
              @endforeach
              <div class="pages text-center">
                {{$berita->links()}}
              </div>
            @else
              <h4>Berita tidak ditemukan.</h4>
            @endif
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
