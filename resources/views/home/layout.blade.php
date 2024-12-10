<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RZW Store | @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('home/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet" />
</head>
@yield('css')
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f9322c; font-family: 'Scandia'; color: #fff;">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">
                <span class="text-dark fw-bold">RZW </span>Store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <form class="d-flex">
                    <button class="btn btn-outline-dark text-white rzw-bg-cart" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge text-white ms-1 rounded-pill rzw-bg-cart-badge" style="background-color: #000;">0</span>
                    </button>
                </form>
                @if (!Auth::check())
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link rzw-nav-link active" href="#!">Masuk</a></li>
                        <li class="nav-item"><a class="nav-link rzw-nav-link" href="#!">Daftar</a></li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
    
    @yield('content')
    
    <!-- Footer-->
    <footer class="py-3"  style="background-color: #f9322c; font-family: 'Scandia'; color: #fff;">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website {{ date('Y') }}</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('home/js/scripts.js') }}"></script>

    @yield('js')
</body>

</html>