@extends('home.layout')

@section('title', 'Home')

@section('css')
    <style>
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
            bottom: 35%;
            left: 8%;
        }

        .pos-4 {
            bottom: 32%;
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
    <div class="floating-background" style="padding-bottom: 30vh">
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <span class="rzw-btn-border product-card" style="animation-delay: 2s">
                    <a href="{{ url('/') }}" class="btn rzw-btn rzw-bg-laravel"><i class="bi bi-arrow-90deg-left"></i>
                        Kembali</a>
                </span>
            </div>

            <svg class="floating-icon icon-1 pos-1" width="50" height="50" viewBox="0 0 50 50">
                <path d="M25 2 L30 17 L45 17 L32 26 L37 42 L25 33 L13 42 L18 26 L5 17 L20 17 Z" fill="none"
                    stroke="#FF2D20" stroke-width="1" />
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
                <path d="m45.202 39.105-22.1 12.702L1 39.105" stroke="#FF2D20" stroke-width="1" stroke-linejoin="bevel">
                </path>
                <path transform="matrix(.86698 .49834 .00003 1 1 13.699)" stroke="#FF2D20" stroke-width="1"
                    stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"></path>
                <path transform="matrix(.86698 -.49834 -.00003 1 23.102 26.402)" stroke="#FF2D20" stroke-width="1"
                    stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"></path>
                <path transform="matrix(.86701 -.49829 .86701 .49829 1 13.702)" stroke="#FF2D20" stroke-width="1"
                    stroke-linejoin="bevel" d="M0 0h25.491v25.491H0z"></path>
            </svg>

            <!-- Your existing content -->
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset($produk->gambar) }}"
                            alt="{{ $produk->title }}" /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: {{ $produk->sku }}</div>
                        <h1 class="display-5 fw-bolder">{{ $produk->title }}</h1>
                        <div class="fs-5 mb-5">
                            @if ($produk->originalPrice >= 1)
                                <span class="text-decoration-line-through">Rp.
                                    {{ number_format($produk->originalPrice, 0, ',', '.') }}</span>
                            @endif
                            <span>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</span>
                        </div>
                        <p class="lead" style="max-width: 40rem;">{{ $produk->deskripsi }}</p>
                        {{-- <form action="{{ url('cart') }}" method="POST" class="pt-5">
                            @csrf
                            <div class="d-flex">
                                <input type="hidden" name="sku" value="{{ $produk->sku }}">
                                <input class="form-control text-center me-3" id="rzw_jumlah" name="rzw_jumlah"
                                    type="num" value="1"
                                    style="max-width: 4rem; border: 1px solid #FF3B30; outline: none; border-radius: 0;" />
                                <span class="rzw-btn-border product-card" style="animation-delay: 2s">
                                    <button href="#" class="btn rzw-btn rzw-bg-laravel-light"><i
                                            class="bi-cart-fill me-1"></i> Keranjang</button>
                                </span>
                            </div>
                        </form> --}}
                        <span class="rzw-btn-border product-card" style="animation-delay: 2s">
                            <a href="{{ url('/addtocart/' . $produk->id) }}" class="btn rzw-btn rzw-bg-laravel-light"><i
                                    class="bi-cart-fill me-1"></i> Keranjang</a>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
