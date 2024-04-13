<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "icon" href = "{{ asset('img/LogoGram_1.png') }}" type = "image/x-icon">
    <link href="{{ asset('dist/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <link href="{{ asset('dist/sb-admin-2/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <title>@yield('title') &bull; Liquid Dispensing I-131</title>
</head>

<body>
    @include('partials.navbar')
    <div class="container-md">
        @yield('content')
    </div>
    @include('partials.footer')
</body>
<script src="{{ asset('dist/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/jquery-3.7.1/jquery-3.7.1.min.js') }}"></script>
@vite('resources/js/app.js')
<script src="{{ asset('dist/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('dist/sb-admin-2/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('dist/sb-admin-2/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('dist/sb-admin-2/js/demo/datatables-demo.js') }}"></script>
</html>
