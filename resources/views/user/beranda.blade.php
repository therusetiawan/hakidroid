@extends('layouts.userLayout')

@section('title', 'Beranda')

@section('content')
  <div class="container">
    <section class="content-header">
      <h3>Beranda <small>HAKIdroid UNY</small></h3>
    </section>
    <div class="row">
      <div class="col-sm-4">
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="{{asset('/img/Batman.jpg')}}" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Anjasmoro Adi Nugroho</h3>
              <h5>&nbsp;</h5>
            </div>
            <div class="box-body">
              <a href="#" class="btn btn-default"><i class="fa fa-pencil"></i> Sunting Profil</a>
            </div>
          </div>
      </div>

      <div class="col-sm-8">
        <div class="white-box">
          <div class="row">
            {{-- Begin  --}}
              <div class="col-sm-4">
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>1.</h3>
                    <p>Panduan HAKI</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-file-pdf-o"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                     Info Selanjutnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>2.</h3>
                    <p>Panduan Pengajuan HAKI</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-file-pdf-o"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                     Info Selanjutnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>3.</h3>
                    <p>Jenis Jenis HAKI</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-file-pdf-o"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                     Info Selanjutnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>

@endsection
