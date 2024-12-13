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

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .search-match {
            background-color: #f0f0f066;
            font-weight: bold !important;
        }
    </style>
@endsection

@section('content')
    <header class="py-5" style="background-color: #000; font-family: 'Scandia'; color: #fff;">
        <div class="container px-4 px-lg-5 my-3">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder product-card" style="animation-delay: 1.0s">Riwayat Transaksi</h1>
            </div>
        </div>
    </header>
    <section class="py-5 floating-background">
        <div class="container my-5">
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



        <div class="container">
            <div class="search-container">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari Transaksi..."
                    style="border-radius: 0; border-color: #f9322c; background-color: #fff;">
            </div>
            @if (!$transaksi->isEmpty())
                <table class="table mt-5 table-responsive" style="margin-bottom: 7vw;" id="table-history">
                    <thead style="background-color: #f9322c; color: #fff;">
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total Pembayaran</th>
                            <th>Banyak Produk</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($transaksi as $item)
                            <tr class="product-card" style="animation-delay: {{ $loop->index * 0.2 }}s">
                                <td><a href="{{ url('/payment/' . $item->id_transaksi) }}"
                                        class="text-decoration-none">{{ $item->id_transaksi }}</a></td>
                                <td>{{ $item->created_at }}</td>
                                <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                                <td>{{ count(json_decode($item->data)) }} Produk</td>
                                <td class="text-center">
                                    <span
                                        class="badge rounded-pill text-bg-{{ $item->status == 0
                                            ? 'warning'
                                            : ($item->status == 1
                                                ? 'success'
                                                : ($item->status == 2
                                                    ? 'danger'
                                                    : ($item->status == 3
                                                        ? 'danger'
                                                        : 'danger'))) }}">
                                        {{ $item->status == 0
                                            ? 'Pending'
                                            : ($item->status == 1
                                                ? 'Lunas'
                                                : ($item->status == 2
                                                    ? 'Cancelled'
                                                    : ($item->status == 3
                                                        ? 'Kadaluarsa'
                                                        : 'Unknown'))) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="rzw-btn-border product-card" id="rzw-payment">
                                        <a href="{{ url('/payment/' . $item->id_transaksi) }}"
                                            class="btn rzw-btn rzw-bg-laravel-light text-center">
                                            Detail
                                        </a>
                                    </span>
                                    @if ($item->status == 0)
                                        <span class="rzw-btn-border product-card" id="rzw-payment">
                                            <button class="btn rzw-btn rzw-bg-laravel text-center"
                                                onclick="PayTransaksi('{{ $item->snap_token }}')">
                                                Pay
                                            </button>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <table class="table my-5" id="table-history">
                    <thead style="background-color: #f9322c; color: #fff;">
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total Pembayaran</th>
                            <th>Banyak Produk</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-row show product-card">
                            <td colspan="6" class="text-center">
                                <h4 class="p-2">Belum Ada Transaksi</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection


@section('js')
    <script>
        window.addEventListener('resize', function() {
            const tableHistory = document.querySelector('.table-responsive');
            if (window.innerWidth <= 568 && window.innerHeight <= 861) {
                if (tableHistory) {
                    tableHistory.style.display = 'block';
                }
            } else {
                if (tableHistory) {
                    tableHistory.style.display = 'relative';
                }
            }
        });

        // Panggil saat halaman pertama kali dimuat
        window.dispatchEvent(new Event('resize'));


        function PayTransaksi(snapToken) {
            snap.pay(snapToken, {
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
        }

        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('tableBody');

        // Tambahkan event listener untuk input pencarian
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            let matchCount = 0;

            // Iterasi pada setiap baris tabel
            for (const row of tableBody.rows) {
                let found = false;
                // Iterasi pada setiap sel dalam baris
                for (const cell of row.cells) {
                    const cellText = cell.textContent.toLowerCase();

                    // Periksa apakah nilai sel cocok dengan input pencarian
                    if (cellText.includes(searchTerm)) {
                        found = true;
                        matchCount++;
                        break;
                    }
                }

                // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
                if (found) {
                    row.classList.add('search-match');
                    row.style.display = '';
                } else {
                    row.classList.remove('search-match');
                    row.style.display = searchTerm ? 'none' : ''; // Tampilkan baris jika pencarian kosong
                }
            }

            // Hapus class 'search-match' dari semua baris jika pencarian kosong
            if (!searchTerm) {
                for (const row of tableBody.rows) {
                    row.classList.remove('search-match');
                }
                matchCount = tableBody.rows.length;
            }


            document.querySelector('#table-history').style.marginBottom = matchCount <= 3 ? '15vw' : '7vw';

            console.log(matchCount);
        });
    </script>
@endsection
