@extends('home.layout')

@section('title', 'Login')

@section('header', 'false')

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

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            font-family: 'Scandia' !important;
            font-weight: bold !important;
        }

        .login-box {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
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
    <div class="login-container floating-background">
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
            <path d="m45.202 39.105-22.1 12.702L1 39.105" stroke="#FF2D20" stroke-width="1" stroke-linejoin="bevel">
            </path>
            <path transform="matrix(.86698 .49834 .00003 1 1 13.699)" stroke="#FF2D20" stroke-width="1"
                stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"></path>
            <path transform="matrix(.86698 -.49834 -.00003 1 23.102 26.402)" stroke="#FF2D20" stroke-width="1"
                stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"></path>
            <path transform="matrix(.86701 -.49829 .86701 .49829 1 13.702)" stroke="#FF2D20" stroke-width="1"
                stroke-linejoin="bevel" d="M0 0h25.491v25.491H0z"></path>
        </svg>
        <div class="login-box product-card" style="z-index: 10;">
            <h2 class="login-title">Daftar</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kamu</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Masukan Nama Kamu" style="border-radius: 0; border-color: #F9322C;"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Masukan Email" style="border-radius: 0; border-color: #F9322C;"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        name="phone" placeholder="Masukan Nomor HP" style="border-radius: 0; border-color: #F9322C;"
                        value="{{ old('phone') }}" required>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Masukan Password" style="border-radius: 0; border-color: #F9322C;"
                        value="{{ old('password') }}" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">konfirmasi Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" name="password_confirmation" placeholder="Masukan Konfirmasi Password"
                        style="border-radius: 0; border-color: #F9322C;" value="{{ old('password_confirmation') }}"
                        required>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="p-1">
                    <span class="rzw-btn-border product-card w-100 text-center" style="animation-delay: 0.6s">
                        <button type="submit" class="btn rzw-btn rzw-bg-laravel w-100">
                            <i class="bi bi-door-open"></i>
                            Daftar
                        </button>
                    </span>
                </div>

                <div class="p-1">
                    <div class="row">
                        <div class="col-6">
                            <span class="rzw-btn-border product-card w-100 text-center" style="animation-delay: 1s">
                                <a href="{{ url('/') }}" class="btn rzw-btn rzw-bg-laravel-light w-100">
                                    Kembali
                                </a>
                            </span>
                        </div>
                        <div class="col-6">
                            <span class="rzw-btn-border product-card w-100 text-center" style="animation-delay: 1.4s;">
                                <a href="{{ url('/login') }}" class="btn rzw-btn rzw-bg-laravel w-100"
                                    style="background: #ffa200; color: #000;">
                                    Login
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
