<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/fonts/sb-bistro/sb-bistro.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/fonts/font-awesome/font-awesome.css') }} " rel="stylesheet" type="text/css">
    <link rel="icon" href="{{ asset('assets/img/logo/logo.png') }}" type="image/png">

    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/bootstrap/bootstrap.css') }}  ">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/o2system-ui/o2system-ui.css') }}  ">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/owl-carousel/owl-carousel.css') }}  ">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/cloudzoom/cloudzoom.css') }}  ">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/thumbelina/thumbelina.css') }}  ">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/packages/bootstrap-touchspin/bootstrap-touchspin.css') }}  ">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/theme.css') }}">

</head>

<body>

    @livewire('notification')
    @livewire('client.header')
    {{ $slot }}
    @livewire('client.footer')





    @if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
@endif

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: { items: 1 },
                600: { items: 3 },
                1000: { items: 4 }
            }
        });
    });
</script>
@endpush



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}  "></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-migrate.js') }}  "></script>
    <script type="text/javascript" src="{{ asset('assets/packages/bootstrap/libraries/popper.js') }} "></script>
    <script type="text/javascript" src="{{ asset('assets/packages/bootstrap/bootstrap.js') }}  "></script>
    <script type="text/javascript" src="{{ asset('assets/packages/o2system-ui/o2system-ui.js') }}  "></script>
    <script type="text/javascript" src="{{ asset('assets/packages/owl-carousel/owl-carousel.js') }}  "></script>
    <script type="text/javascript" src="{{ asset('assets/packages/cloudzoom/cloudzoom.js') }}  "></script>
    <script type="text/javascript" src="{{ asset('assets/packages/thumbelina/thumbelina.js') }}  "></script>
    <script type="text/javascript" src="{{ asset('assets/packages/bootstrap-touchspin/bootstrap-touchspin.js') }}  "></script>
    <script type="text/javascript" src="{{ asset('assets/js/theme.js') }}  "></script>
</body>

</html>
