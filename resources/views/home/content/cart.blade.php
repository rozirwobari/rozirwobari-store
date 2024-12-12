@extends('home.layout')

@section('title', 'Home')


@section('css')
    <style>
        @keyframes bubbleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                transform: scale(1.04);
            }

            70% {
                transform: scale(0.98);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .product-card {
            opacity: 0;
            animation: bubbleIn 2s ease forwards;
        }


        .floating-background {
            position: relative;
            overflow: hidden;
            background: linear-gradient(to bottom right, #fff5f5, #fff);
        }

        .floating-icon {
            position: absolute;
            opacity: 0.5;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            50% {
                transform: translate(100px, 100px) rotate(180deg);
            }

            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        /* Memberikan delay berbeda untuk setiap icon */
        .icon-1 {
            animation-delay: 0s;
        }

        .icon-2 {
            animation-delay: 4s;
        }

        .icon-3 {
            animation-delay: 8s;
        }

        .icon-4 {
            animation-delay: 9s;
        }

        .icon-5 {
            animation-delay: 10s;
        }

        .icon-6 {
            animation-delay: 11s;
        }

        /* Posisi awal berbeda untuk setiap icon */
        .pos-1 {
            top: 4%;
            left: 40%;
        }

        .pos-2 {
            top: 20%;
            right: 20%;
        }

        .pos-3 {
            bottom: 30%;
            left: 8%;
        }

        .pos-4 {
            bottom: 15%;
            right: 15%;
        }

        .pos-5 {
            top: 70%;
            left: 50%;
        }

        .pos-6 {
            top: 35%;
            left: 8%;
        }
    </style>
@endsection

@section('content')
    <header class="py-5" style="background-color: #000; font-family: 'Scandia'; color: #fff;">
        <div class="container px-4 px-lg-5 my-3">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder product-card" style="animation-delay: 1.5s">Keranjang Kamu</h1>
                {{-- <p class="lead fw-normal text-white-50 mb-0 product-card" style="animation-delay: 0.5s">Tersedia Produk Digital Yang Saya Jual</p> --}}
            </div>
        </div>
    </header>
    <section class="py-5 floating-background">
        <div class="container px-4 px-lg-5 my-5">
            <span class="rzw-btn-border product-card" style="animation-delay: 0.4s">
                <a href="{{ url('/') }}" class="btn rzw-btn rzw-bg-laravel"><i class="bi bi-arrow-90deg-left"></i>
                    Kembali</a>
            </span>
        </div>
        <!-- Floating Icons -->
        <svg class="floating-icon icon-1 pos-1" width="50" height="50" viewBox="0 0 50 50">
            <path d="M25 2 L30 17 L45 17 L32 26 L37 42 L25 33 L13 42 L18 26 L5 17 L20 17 Z" fill="none" stroke="#FF2D20"
                stroke-width="1" />
        </svg>
        <svg class="floating-icon icon-6 pos-6" width="40" height="40" viewBox="0 0 40 40">
            <circle cx="20" cy="20" r="18" fill="none" stroke="#FF2D20" stroke-width="1" />
        </svg>
        <svg class="floating-icon icon-3 pos-3" width="45" height="45" viewBox="0 0 45 45">
            <rect x="2" y="2" width="41" height="41" fill="none" stroke="#FF2D20" stroke-width="1" />
        </svg>
        <svg class="floating-icon icon-4 pos-4" width="35" height="35" viewBox="0 0 35 35">
            <polygon points="17.5,2 33,33 2,33" fill="none" stroke="#FF2D20" stroke-width="1" />
        </svg>
        <svg class="floating-icon icon-5 pos-5" width="30" height="30" viewBox="0 0 30 30">
            <path d="M15 2 L28 28 L2 28 Z" fill="none" stroke="#FF2D20" stroke-width="1" />
        </svg>

        <!-- Outlined Cube Icon -->
        <svg class="floating-icon icon-2 pos-2" width="46" height="53" viewBox="0 0 46 53" fill="none">
            <path d="m23.102 1 22.1 12.704v25.404M23.101 1l-22.1 12.704v25.404" stroke="#FF2D20" stroke-width="1"
                stroke-linejoin="bevel"></path>
            <path d="m45.202 39.105-22.1 12.702L1 39.105" stroke="#FF2D20" stroke-width="1" stroke-linejoin="bevel"></path>
            <path transform="matrix(.86698 .49834 .00003 1 1 13.699)" stroke="#FF2D20" stroke-width="1"
                stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"></path>
            <path transform="matrix(.86698 -.49834 -.00003 1 23.102 26.402)" stroke="#FF2D20" stroke-width="1"
                stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"></path>
            <path transform="matrix(.86701 -.49829 .86701 .49829 1 13.702)" stroke="#FF2D20" stroke-width="1"
                stroke-linejoin="bevel" d="M0 0h25.491v25.491H0z"></path>
        </svg>



        @if (!$cart->isEmpty())
            <div class="container" style="z-index: 10;">
                <div class="row justify-content-center mt-4">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>{{ $cart->count() }} Produk</th>
                                <th>Rp. {{ number_format($cart->sum('produk.harga'), 0, ',', '.') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="text-end pt-3">
                    <span class="rzw-btn-border product-card">
                        <a href="{{ url('/checkout') }}" class="btn rzw-btn rzw-bg-laravel text-center w-100">
                            Checkout
                            <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    </span>
                </div>
            </div>

            <div class="container px-4 px-lg-5 mt-5" style="z-index: 10;">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
                    id="productContainer">
                    @foreach ($cart as $key => $item)
                        <div class="col mb-5 product-card" style="animation-delay: {{ $key * 0.4 }}s">
                            <div class="card h-100 rzw-card-product"
                                style="border: 1px solid #FF3B30; box-shadow: 0 4px 20px rgba(0,0,0,0.2); border-radius: 10px;">
                                @if ($item->produk->originalPrice >= 1)
                                    <div class="badge text-white position-absolute"
                                        style="top: 0.7rem; right: 1rem; background-color: #FF3B30; font-family: 'Scandia';">
                                        Promo
                                    </div>
                                @endif
                                <img class="card-img-top" src="{{ asset($item->produk->gambar) }}"
                                    alt="{{ $item->produk->title }}" style="border-radius: 10px 10px 0px 0px;" />
                                <div class="card-body p-4">
                                    <a href="{{ url('produk/' . $item->produk->id) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">{{ $item->produk->title }}</h5>
                                            @if ($item->produk->originalPrice >= 1)
                                                <span class="text-muted text-decoration-line-through">Rp.
                                                    {{ number_format($item->produk->originalPrice, 0, ',', '.') }}</span>
                                            @endif
                                            Rp. {{ number_format($item->produk->harga, 0, ',', '.') }}
                                        </div>
                                    </a>
                                </div>
                                <div
                                    class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center">
                                    <span class="rzw-btn-border">
                                        <a href="{{ url('/deletecart/' . $item->id) }}"
                                            class="btn rzw-btn rzw-bg-laravel-light text-center w-100">Hapus</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="container" style="padding-bottom: 50vh">
                <div class="row justify-content-center mt-4">
                    <h4 class="text-center">Keranjang Kamu Kosong</h4>
                </div>
            </div>
        @endif
    </section>
@endsection

@section('js')
    {{-- <script>
        document.getElementById('rzw-payment').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert('Payment success!');
                    console.log(result);
                },
                onPending: function(result) {
                    alert('Payment pending!');
                    console.log(result);
                },
                onError: function(result) {
                    alert('Payment failed!');
                    console.log(result);
                },
                onClose: function() {
                    alert('You closed the popup without finishing the payment');
                }
            });
        };
    </script> --}}
@endsection
