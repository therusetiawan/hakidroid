<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('css/vendor/bootstrap/css/bootstrap.min.css') }}" media="screen" title="no title">
    <link rel="stylesheet" href="{{ URL::asset('css/flat-ui.min.css') }}" media="screen" title="no title">

    @stack('css')

  </head>
  <body>
    @include('components.navbar')
    @yield('content')

    <script src="{{ URL::asset('js/vendor/jquery.min.js') }}" charset="utf-8"></script>
    <script src="{{ URL::asset('js/vendor/html5shiv.js') }}" charset="utf-8"></script>
    <script src="{{ URL::asset('js/flat-ui.min.js') }}" charset="utf-8"></script>
    @stack('javascript')

  </body>
</html>
