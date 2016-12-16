<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') - IPON Web</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('/admin/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/admin/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('/admin/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}">

  {{--  STYLE KHUSUS USER--}}
  <link rel="stylesheet" href="{{ asset('/css/user.css') }}">

  {{-- Style Khusus web HAKI --}}
  <link rel="stylesheet" href="{{ asset('/css/hakistyle.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  @yield('header')
</head>
<body class="hold-transition skin-blue layout-top-nav">


  @yield('content')


<!-- jQuery 2.2.0 -->
  <script src="{{ asset('/admin/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{ asset('/admin/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- FastClick -->
  <script src="{{ asset('/admin/plugins/fastclick/fastclick.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('/admin/dist/js/app.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('/admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

  <!-- SlimScroll 1.3.0 -->
  <script src="{{ asset('/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <!-- ChartJS 1.0.1 -->

   AdminLTE dashboard demo (This is only for demo purposes) -->
  <!--<script src="{{ asset('/admin/dist/js/pages/dashboard2.js') }}"></script>-->
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('/admin/dist/js/demo.js') }}"></script>

  <script src="{{ asset('/js/toastr.min.js') }}"></script>
  <script src="{{ asset('/js/bootbox.min.js') }}"></script>
  <script src="{{ asset('/js/validator.js') }}"></script>
  <script>
  $(document).ready(function() {
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "3000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    @if(Session::has('message'))
      toastr.success("{{ Session::get('message') }}");
    @elseif(Session::has('messageError'))
      toastr.error("{{ Session::get('messageError') }}");
    @endif
  });
  </script>
  @yield('js')
</body>
</html>
