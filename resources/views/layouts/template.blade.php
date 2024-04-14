<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @vite('resources/css/app.css')
    <link href="{{ asset('dist/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link rel = "icon" href = "{{ asset('img/LogoGram_1.png') }}" type = "image/x-icon">
    <title>@yield('title') &bull; Liquid Dispensing I-131</title>
</head>

<body>
    @include('partials.navbar')
    <div class="container-md">
        @yield('content')
    </div>
    @include('partials.footer')
</body>
<script src="{{ asset('dist/jquery-3.7.1/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('dist/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('dist/datatables/dataTables.bootstrap4.js') }}"></script>
@vite('resources/js/app.js')
</html>
