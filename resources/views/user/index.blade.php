@extends('layouts.app')

@section('header')
  <style media="screen">

  </style>
@endsection

@section('content')
  @include('components.indexnavbar')
  <div class="container">
    <div class="row">
      <div class="web-header col-xs-12">
        <img src="{{ asset('/img/gedung-baru.jpg') }}" class="img-responsive" alt="Gedung LPPM UNY">
      </div>
    </div>

    {{-- Berita --}}
    <div class="row">
      <div class="col-sm-8">
        <div class="box box-primary">
          <div class="box-header">
              <h4 class="box-title"><i class="fa fa-newspaper-o"></i> Berita</h4>
          </div>
          <div class="box-body">
            @if($berita->count() > 0)
              @foreach($berita as $b)
              <div class="media">
                <div class="media-left">
                  <a href="/berita/{{$b->id}}">
                    @if($b->foto != null)
                      <img class="media-object" src="/foto_berita/{{$b->foto}}" style="margin:0 20px 0 20px; max-height: 90px;">
                    @else
                      <img class="media-object" src="/foto_berita/default.jpg" style="margin:0 20px 0 20px;  max-height: 90px;">
                    @endif
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">{{$b->judul_berita}}</h4>
                  <p>
                    {{$b->isi_berita}}
                  </p>
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
      <div class="col-sm-4">
        <div class="box box-primary">
          <div class="box-header">
            <h4 class="box-title"><i class="fa fa-lock"></i>  Masuk Ke IPON UNY</h4>
          </div>
          <form action="{{Route('pengusul_login_post')}}" method='post'>
          <div class="box-body">
              <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control" value="">
              </div>
              <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" value="">
              </div>
              <div class="form-group">
                {{csrf_field()}}
                <button type="submit" name="button" class="btn btn-primary">Login</button>
              </div>
              <div class="form-group">
                <a href="/register" class="text-center">Daftar Akun</a>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection
