<!DOCTYPE html>
<html>

<head>
  <title>@yield('title', 'Trang chủ')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/fonts/sb-bistro/sb-bistro.css') }} " rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/fonts/font-awesome/font-awesome.css') }} " rel="stylesheet" type="text/css">

  <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/bootstrap/bootstrap.css') }}  ">
  <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/o2system-ui/o2system-ui.css') }}  ">
  <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/owl-carousel/owl-carousel.css') }}  ">
  <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/cloudzoom/cloudzoom.css') }}  ">
  <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/thumbelina/thumbelina.css') }}  ">
  <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/bootstrap-touchspin/bootstrap-touchspin.css') }}  ">
  <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/theme.css') }}">

</head>

<body>
  @livewire('client.header')

  @yield('content')


  @livewire('client.footer')



  <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}  "></script>
  <script type="text/javascript" src="{{ asset('assets/js/jquery-migrate.js') }}  "></script>
  <script type="text/javascript" src="{{ asset('assets/packages/bootstrap/libraries /popper.js') }} "></script>
  <script type="text/javascript" src="{{ asset('assets/packages/bootstrap/bootstrap.js') }}  "></script>
  <script type="text/javascript" src="{{ asset('assets/packages/o2system-ui/o2system-ui.js') }}  "></script>
  <script type="text/javascript" src="{{ asset('assets/packages/owl-carousel/owl-carousel.js') }}  "></script>
  <script type="text/javascript" src="{{ asset('assets/packages/cloudzoom/cloudzoom.js') }}  "></script>
  <script type="text/javascript" src="{{ asset('assets/packages/thumbelina/thumbelina.js') }}  "></script>
  <script type="text/javascript" src="{{ asset('assets/packages/bootstrap-touchspin/bootstrap-touchspin.js') }}  "></script>
  <script type="text/javascript" src="{{ asset('assets/js/theme.js') }}  "></script>
</body>

</html>