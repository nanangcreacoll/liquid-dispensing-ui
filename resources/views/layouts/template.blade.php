<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('dist/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>@yield('title') &#128900; Liquid Dispensing I-131</title>
</head>

<body>
    @include('partials.navbar')
    <div class="container-md">
        @yield('content')
    </div>
    <script src="{{ asset('dist/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
