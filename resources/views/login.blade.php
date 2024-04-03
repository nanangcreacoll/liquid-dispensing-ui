<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('dist/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Login &bull; Liquid Dispensing I-131</title>
</head>

<body class="bg-danger bg-gradient">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-19 col-md-5 col-lg-6 col-xl-4">
                <img class="logo-poltek mb-4 mt-4 center-block" src="{{ asset('img/Vertikal_1.png') }}" alt="logo poltek nuklir"
                    width="35%" height="35%">
                <h1 class="h3 mb-3 fw-normal text-white text-center"><strong>Login</strong></h1>
                <div class="card bg-white text-black" style="border-radius: 1rem;">
                    <div class="card-body p-2 text-center">
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <main class="card-body form-signin w-100 m-auto">
                            <form action="/login" method="post">
                                @csrf
                                <div class="form-floating text-dark-emphasis">
                                    <input type="text" name="username" class="form-control" id="username"
                                        placeholder="Username" autofocus required>
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating text-dark-emphasis">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="form-check text-start my-3">
                                    <input class="form-check-input" type="checkbox" name="remember-me" value="remember-me" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                      Remember me
                                    </label>
                                  </div>
                                <button class="btn btn-success mt-4 bg-gradient w-100 py-2" type="submit">Login</button>
                            </form>
                        </main>
                    </div>
                </div>
                <p class="mt-5 mb-3 text-white text-center">&copy; 2024 &bull; Penelitian Tugas Akhir
                    Liquid Dispensing Kapsul Radiofarmaka I-131</p>
            </div>
        </div>
    </div>
    <script src="{{ asset('dist/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
