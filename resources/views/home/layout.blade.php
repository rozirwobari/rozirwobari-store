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
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>

@yield('css')

<style>
    ::-webkit-scrollbar {
        width: 0;
        background: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background: transparent;
    }
</style>

<body>
    @php
        $headerContent = $__env->yieldContent('header');
    @endphp

    @if (!isset($headerContent) || $headerContent !== 'false')
        <nav class="navbar navbar-expand-lg navbar-light"
            style="background-color: #f9322c; font-family: 'Scandia'; color: #fff;">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">
                    <span class="text-dark fw-bold">RZW </span>Store
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <a class="btn btn-outline-dark text-white rzw-bg-cart" href="{{ url('/cart') }}">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge text-white ms-1 rounded-pill rzw-bg-cart-badge"
                            style="background-color: #000;">
                            @if (isset($cart))
                                {{ count($cart) }}
                            @else
                                0
                            @endif
                        </span>
                    </a>
                    @if (!Auth::check())
                        <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item"><a class="nav-link rzw-nav-link active"
                                    href="{{ url('/login') }}">Masuk</a></li>
                            <li class="nav-item"><a class="nav-link rzw-nav-link"
                                    href="{{ url('/register') }}">Daftar</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                            <li class="nav-item">
                            <li class="nav-item"><a class="nav-link rzw-nav-link"
                                    href="{{ url('/history') }}">History</a>
                            </li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn nav-link rzw-nav-link">Logout</button>
                            </form>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </nav>
    @endif

    @yield('content')

    <!-- Footer-->
    <footer class="py-3" style="background-color: #f9322c; font-family: 'Scandia'; color: #fff;">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website {{ date('Y') }}</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('home/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if (session('alert'))
        <script>
            Swal.fire({
                title: '{{ session('alert')['title'] }}',
                text: '{{ session('alert')['message'] }}',
                icon: '{{ session('alert')['type'] }}',
            });
        </script>
    @endif

    @yield('js')
</body>

</html>
