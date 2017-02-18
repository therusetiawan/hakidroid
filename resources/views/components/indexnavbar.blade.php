<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="{{url('/')}}" class="navbar-brand">IPON UNY</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{Route('pengusul_beranda')}}">Beranda</a></li>
          <li><a href="/berita">Berita</a></li>
          <li><a href="{{Route('pengusul_pengajuan')}}">Daftar Ajuan HAKI</a></li>
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pengajuan HAKI Baru</a>
            <ul class="dropdown-menu" role="menupengajuan">
              <li><a href="{{Route('pengusul_paten_pengajuan')}}">Paten</a></li>
              <li><a href="{{Route('pengusul_desain_industri_pengajuan')}}">Desain Industri</a></li>
              <li><a href="{{Route('pengusul_hak_cipta_pengajuan')}}">Hak Cipta</a></li>
              <li><a href="{{Route('pengusul_merek_pengajuan')}}">Merek</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->

    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
