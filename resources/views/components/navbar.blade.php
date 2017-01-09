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
          <li><a href="{{Route('pengusul_pengajuan')}}">Daftar Ajuan HAKI</a></li>
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pengajuan HAKI Baru</a>
            <ul class="dropdown-menu" role="menupengajuan">
              <li><a href="{{Route('pengusul_paten_pengajuan')}}">Paten</a></li>
              <li class="disabled"><a href="#">Desain Industri</a></li>
              <li class="disabled"><a style="color: rgb(185, 185, 185)" href="{{url('pengajuanpaten')}}">Hak Cipta</a></li>
              <li class="disabled"><a style="color: rgb(185, 185, 185)" href="{{url('pengajuanpaten')}}">Merk</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">2</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">2 Pesan baru</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="img/Batman.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Reviewer IPON
                        <small><i class="fa fa-clock-o"></i> 1 menit yang lalu</small>
                      </h4>
                      <!-- The message -->
                      <p>Pengajuan Paten Anda telah diterima.</p>
                    </a>
                  </li>
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="img/Batman.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Reviewer IPON
                        <small><i class="fa fa-clock-o"></i> 5 hari yang lalu</small>
                      </h4>
                      <!-- The message -->
                      <p>Revisi Deskripsi Dokumen Subtantif.</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">Lihat Semua</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">1 Notifikasi baru</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-file text-aqua"></i> Pengajuan haki telah diterima
                    </a>
                  </li>
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-file text-warning"></i> Pengajuan haki baru
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">Lihat Semua</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{auth('pengusul')->user()->nama}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{Route('pengusul_logout')}}" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
