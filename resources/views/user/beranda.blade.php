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
              <a href="#" class="btn btn-default btn-edit-profile"><i class="fa fa-pencil"></i> Sunting Profil</a>
            </div>
            <div id="sunting-profil" class="box-body">
              <form class="" action="index.html" method="post">
                <div class="row form-group">
                  <label class="col-sm-12 control-label">
                    Nama :
                  </label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="" value="">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-12 control-label">
                    Alamat :
                  </label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="" value="">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-12 control-label">
                    Kewarganegaraan :
                  </label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="" value="">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-12 control-label">
                    Telepon :
                  </label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="" value="">
                  </div>
                </div>
                <div class="row form-group">
                  <label class="col-sm-12 control-label">
                    NPWP :
                  </label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="" value="">
                  </div>
                </div>

                <button type="submit" name="button" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
              </form>
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

@section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#sunting-profil').hide();
      $('.btn-default').click(function() {
        if ($(this).hasClass('btn-edit-profile')) {
          $('#sunting-profil').slideDown('fast');
          $(this).addClass('btn-close-box-edit');
          $(this).removeClass('btn-edit-profile');
        } else {
          $('#sunting-profil').slideUp('fast');
          $(this).addClass('btn-edit-profile');
          $(this).removeClass('btn-close-box-edit');
        }

      });
    });
  </script>
@endsection
