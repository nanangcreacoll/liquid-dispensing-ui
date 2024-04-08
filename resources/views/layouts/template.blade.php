<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('dist/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>@yield('title') &bull; Liquid Dispensing I-131</title>
</head>

<body>
    @include('partials.navbar')
    <div class="container-md">
        @yield('content')
    </div>
    @include('partials.footer')
</body>
@vite('resources/js/app.js')
<script src="{{ asset('dist/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</html>
