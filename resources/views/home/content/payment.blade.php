@extends('home.layout')

@section('title', $transaksi->id_transaksi)


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

        .watermark-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-25deg);
            opacity: 0.3;
            font-size: 65px;
            font-weight: bold;
            color: #FF3B30;
            z-index: 1;
            pointer-events: none;
            text-transform: uppercase;
            letter-spacing: 10px;
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

        .invoice-title {
            border-bottom: 2px solid #eee;
        }

        .table-borderless td {
            padding: 8px 0;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: 0;
            pointer-events: none;
            width: 300px;
            height: auto;
        }

        @media print {

            nav,
            footer {
                display: none !important;
            }

            .no-print {
                display: none !important;
            }

            /* Reset container untuk print */
            .container {
                margin: 0 !important;
                padding: 0 !important;
                max-width: 100% !important;
                width: 100% !important;
            }

            /* Reset card untuk print */
            .card {
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                margin: 0 !important;
                padding-top: 30px !important;
            }

            .card-body {
                padding: 0 !important;
            }

            /* Memastikan konten full width */
            body {
                margin: 0 !important;
                padding: 0 !important;
            }

            /* Memastikan tabel full width */
            .table {
                width: 100% !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="floating-background"
        style="font-family: 'Scandia';>
        <!-- Floating Icons -->
        <svg class="floating-icon icon-1 pos-1"
        width="50" height="50" viewBox="0 0 50 50">
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


        <div class="container" style="margin-top: 10vh; margin-bottom: 10vh; padding-left: 12vw; padding-right: 12vw;">
            <img src="https://rozirwobari.my.id/assets/img/rzw-transparant.png" alt="Company Logo" class="watermark"
                style="z-index: 10;">
            <div class="watermark-text"
                style="color: {{ $transaksi->status == 1 ? '#00bf00' : ($transaksi->status == 2 ? '#c60000' : ($transaksi->status == 3 ? '#c60000' : '#ffa200')) }};">
                {{ $transaksi->status_label }}</div>
            <div class="card p-3">
                <div class="card-body">
                    <!-- Header -->
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h2 class="mb-3">INVOICE</h2>
                            <h6 class="text-muted">Invoice <strong>{{ $transaksi->id_transaksi }}</strong></h6>
                            <h6 class="text-muted">Date: <span id="currentDate">{{ $transaksi->created_at }}</span></h6>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <h4 class="mb-3" style="color: #FF3B30;">RZW Store</h4>
                            <div>Bandung, Indonesia</div>
                            <div>081234567890</div>
                            <div>info@rzwstore.com</div>
                        </div>
                    </div>

                    <!-- Client Info -->
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">Bill To:</h6>
                            <div><strong>{{ Auth::user()->name }}</strong></div>
                            <div>{{ Auth::user()->email }}</div>
                            <div>{{ Auth::user()->phone }}</div>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="table-responsive">
                        <table class="table" style="border-color: #FF3B30;">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th class="text-center">Harga Satuan</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Amount</th>
                                </tr>
                            </thead>
                            @php
                                $datas = json_decode($transaksi->data, true);
                            @endphp
                            <tbody id="itemsTable">
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>
                                            <p>{{ $data['nama'] }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p>Rp
                                                {{ number_format($data['harga_satuan'], 0, ',', '.') }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p>{{ $data['jumlah'] }}</p>
                                        </td>
                                        <td class="text-end item-amount">Rp
                                            {{ number_format($data['harga_total'], 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Totals -->
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Subtotal:</strong></td>
                                    <td class="text-end" id="subtotal">Rp
                                        {{ number_format($transaksi->total, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Tax :</strong></td>
                                    <td class="text-end" id="tax">Rp 0</td>
                                </tr>
                                <tr>
                                    <td><strong>Total:</strong></td>
                                    <td class="text-end"><strong id="total">Rp
                                            {{ number_format($transaksi->total, 0, ',', '.') }}</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <p><strong>Notes:</strong></p>
                            <p class="text-muted">
                                Terima kasih atas pembelian Anda! <br>
                                Detail transaksi ini berlaku sebagai bukti pembayaran resmi. <br><br>
                                <strong>Catatan Penting:</strong> <br>
                                - Produk digital akan dikirimkan melalui email setelah pembayaran dikonfirmasi. <br>
                                - Harap simpan invoice ini untuk referensi di masa mendatang. <br>
                                - Jika Anda mengalami kendala, hubungi kami melalui info@rzwstore.com. <br><br>
                                Salam, <strong>RZW Project</strong>
                            </p>
                        </div>
                    </div>

                    <!-- Print Button -->
                    <div class="mt-4 no-print text-center">
                        <div class="row p-1">
                            <div class="col-6">
                                <span class="rzw-btn-border product-card w-100">
                                    <button class="btn rzw-btn rzw-bg-laravel-light text-center w-100"
                                        onclick="window.print()">
                                        <i class="bi bi-printer-fill"></i>
                                        Print
                                    </button>
                                </span>
                            </div>
                            @if ($transaksi->status == 0)
                                <div class="col-6">
                                    <span class="rzw-btn-border product-card w-100" id="rzw-payment">
                                        <button class="btn rzw-btn rzw-bg-laravel text-center w-100">
                                            Pay
                                        </button>
                                    </span>
                                </div>
                            @endif

                            @if ($transaksi->status == 1 || $transaksi->status == 2 || $transaksi->status == 3)
                                <div class="col-6">
                                    <span class="rzw-btn-border product-card w-100">
                                        <a class="btn rzw-btn rzw-bg-laravel-light text-center w-100"
                                            href="{{ url('/history') }}">
                                            <i class="bi bi-clock-history"></i>
                                            Riwayat Transaksi
                                        </a>
                                    </span>
                                </div>
                            @endif
                        </div>
                        @if ($transaksi->status == 0)
                            <div class="row p-1">
                                <div class="col-12">
                                    <span class="rzw-btn-border product-card w-100">
                                        <a class="btn rzw-btn rzw-bg-laravel text-center w-100"
                                            style="background: #ffa200; color: black;" href="{{ url('/history') }}">
                                            <i class="bi bi-printer-fill"></i>
                                            Riwayat Transaksi
                                        </a>
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('rzw-payment').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $transaksi->snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    window.location.reload();
                },
                // Optional
                onPending: function(result) {
                    window.location.reload();
                },
                // Optional
                onError: function(result) {
                    window.location.reload();
                }
            });
        };
    </script>
@endsection
