@extends('home.layout')

@section("title", "Home")


@section("css")
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
        .icon-1 { animation-delay: 0s; }
        .icon-2 { animation-delay: 4s; }
        .icon-3 { animation-delay: 8s; }
        .icon-4 { animation-delay: 9s; }
        .icon-5 { animation-delay: 10s; }
        .icon-6 { animation-delay: 11s; }

        /* Posisi awal berbeda untuk setiap icon */
        .pos-1 { top: 4%; left: 40%; }
        .pos-2 { top: 20%; right: 20%; }
        .pos-3 { bottom: 30%; left: 8%; }
        .pos-4 { bottom: 15%; right: 15%; }
        .pos-5 { top: 70%; left: 50%; }
        .pos-6 { top: 35%; left: 8%; }
    </style>
@endsection

@section('content')
    <header class="py-5" style="background-color: #000; font-family: 'Scandia'; color: #fff;">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder product-card" style="animation-delay: 1.5s">RZW Store</h1>
                <p class="lead fw-normal text-white-50 mb-0 product-card" style="animation-delay: 0.5s">Tersedia Produk Digital Yang Saya Jual</p>
            </div>
        </div>
    </header>
    <section class="py-5 floating-background">
        <!-- Floating Icons -->
        <svg class="floating-icon icon-1 pos-1" width="50" height="50" viewBox="0 0 50 50">
            <path d="M25 2 L30 17 L45 17 L32 26 L37 42 L25 33 L13 42 L18 26 L5 17 L20 17 Z" 
                fill="none" 
                stroke="#FF2D20" 
                stroke-width="1"/>
        </svg>
        <svg class="floating-icon icon-6 pos-6" width="40" height="40" viewBox="0 0 40 40">
            <circle cx="20" cy="20" r="18" 
                    fill="none" 
                    stroke="#FF2D20" 
                    stroke-width="1"/>
        </svg>
        <svg class="floating-icon icon-3 pos-3" width="45" height="45" viewBox="0 0 45 45">
            <rect x="2" y="2" width="41" height="41" 
                fill="none" 
                stroke="#FF2D20" 
                stroke-width="1"/>
        </svg>
        <svg class="floating-icon icon-4 pos-4" width="35" height="35" viewBox="0 0 35 35">
            <polygon points="17.5,2 33,33 2,33" 
                    fill="none" 
                    stroke="#FF2D20" 
                    stroke-width="1"/>
        </svg>
        <svg class="floating-icon icon-5 pos-5" width="30" height="30" viewBox="0 0 30 30">
            <path d="M15 2 L28 28 L2 28 Z" 
                fill="none" 
                stroke="#FF2D20" 
                stroke-width="1"/>
        </svg>

        <!-- Outlined Cube Icon -->
        <svg class="floating-icon icon-2 pos-2" width="46" height="53" viewBox="0 0 46 53" fill="none">
            <path d="m23.102 1 22.1 12.704v25.404M23.101 1l-22.1 12.704v25.404" stroke="#FF2D20" stroke-width="1" stroke-linejoin="bevel"></path>
            <path d="m45.202 39.105-22.1 12.702L1 39.105" stroke="#FF2D20" stroke-width="1" stroke-linejoin="bevel"></path>
            <path transform="matrix(.86698 .49834 .00003 1 1 13.699)" stroke="#FF2D20" stroke-width="1" stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"></path>
            <path transform="matrix(.86698 -.49834 -.00003 1 23.102 26.402)" stroke="#FF2D20" stroke-width="1" stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"></path>
            <path transform="matrix(.86701 -.49829 .86701 .49829 1 13.702)" stroke="#FF2D20" stroke-width="1" stroke-linejoin="bevel" d="M0 0h25.491v25.491H0z"></path>
        </svg>

        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari produk..." name="search" id="searchInput" onkeyup="filterProducts()" style="border: 1px solid #FF3B30; outline: none;">
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-center flex-wrap gap-2 product-card" style="animation-delay: ${delay}s">
                            <span class="rzw-btn-border">
                                <a href="#" class="btn rzw-btn rzw-bg-laravel" data-category="all">Semua</a>
                            </span>
                            <span class="rzw-btn-border product-card" style="animation-delay: 0.5s">
                                <a href="#" class="btn rzw-btn rzw-bg-laravel-light" data-category="script">Script</a>
                            </span>
                            <span class="rzw-btn-border product-card" style="animation-delay: 1.0s">
                                <a href="#" class="btn rzw-btn rzw-bg-laravel-light" data-category="kendaraan">Kendaraan</a>
                            </span>
                            <span class="rzw-btn-border product-card" style="animation-delay: 1.5s">
                                <a href="#" class="btn rzw-btn rzw-bg-laravel-light" data-category="plugin">Plugin</a>
                            </span>
                            <span class="rzw-btn-border product-card" style="animation-delay: 2s">
                                <a href="#" class="btn rzw-btn rzw-bg-laravel-light" data-category="other">Lainnya</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="productContainer">
                <!-- Product cards will be dynamically populated here -->
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // Sample product data dengan kategori
        const products = @json($produks);
        {{-- const products = [
            {
                title: "Popular Item",
                price: 18.00,
                originalPrice: 20.00,
                image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
                isPromo: true,
                category: "template"
            },
            {
                title: "Special Item",
                price: 40.00,
                image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
                isPromo: false,
                category: "template"
            },
            {
                title: "BMW M4",
                price: 40.00,
                image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
                isPromo: false,
                category: "kendaraan"
            },
            {
                title: "Rozima",
                price: 40.00,
                image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
                isPromo: false,
                category: "template"
            },
            {
                title: "SnowBall",
                price: 40.00,
                image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
                isPromo: false,
                category: "script"
            },
            {
                title: "Snowball V2",
                price: 40.00,
                image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
                isPromo: false,
                category: "script"
            },
            {
                title: "Garasi",
                price: 40.00,
                image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
                isPromo: false,
                category: "script"
            },
            {
                title: "Garasi V3",
                price: 40.00,
                image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg",
                isPromo: false,
                category: "script"
            },
        ]; --}}

        // Menyimpan kategori yang aktif
        let activeCategory = 'all';
        let searchTerm = '';
        let valueSearch = '';

        function createProductCard(product, index) {
            const delay = (index + 1) * 0.3;
            return `
                <div class="col mb-5 product-card" style="animation-delay: ${delay}s">
                    <div class="card h-100 rzw-card-product" style="border: 1px solid #FF3B30; box-shadow: 0 4px 20px rgba(0,0,0,0.2); border-radius: 10px;">
                        ${product.isPromo ? 
                            `<div class="badge text-white position-absolute" 
                                 style="top: 0.7rem; right: 1rem; background-color: #FF3B30; font-family: 'Scandia';">
                                 Promo
                             </div>` : ''}
                        <img class="card-img-top" src="${product.gambar}" alt="${product.title}" 
                             style="border-radius: 10px 10px 0px 0px;" />
                        <div class="card-body p-4">
                            <a href="{{ url('produk/${product.id}') }}" class="text-decoration-none text-dark">
                                <div class="text-center">
                                    <h5 class="fw-bolder">${product.title}</h5>
                                    ${(product.originalPrice >= 1) ? `<span class="text-muted text-decoration-line-through">Rp. ${product.originalPrice.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}</span>` : ''} Rp. ${product.harga.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}
                                </div>
                            </a>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center">
                            <div class="col-md-6 m-1">
                                <span class="rzw-btn-border">
                                    <a href="{{ url('addtocart/${product.id}') }}" 
                                       class="btn rzw-btn rzw-bg-laravel text-center w-100">Keranjang</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function filterProducts() {
            valueSearch = document.getElementById('searchInput').value;
            searchTerm = valueSearch.toLowerCase();
            updateProductDisplay();
        }

        function updateProductDisplay() {
            let filteredProducts = products;
            const container = document.getElementById('productContainer');
            
            // Filter berdasarkan kategori
            if (activeCategory !== 'all') {
                filteredProducts = filteredProducts.filter(product => 
                    product.category === activeCategory
                );
            }

            // Filter berdasarkan search term
            if (searchTerm) {
                filteredProducts = filteredProducts.filter(product =>
                    product.title.toLowerCase().includes(searchTerm)
                );
            }

            // Jika ada produk, tampilkan seperti biasa
            const limitedProducts = filteredProducts.slice(0, 10);
            container.innerHTML = filteredProducts.length === 0 
                ? `<div class="col-12" style="padding-bottom: 40vh;">
                    <p class="text-center w-100 text-muted">Maaf, produk <b>${valueSearch}</b> tidak ditemukan.</p>
                </div>`
                : filteredProducts.slice(0, 10).map((product, index) => createProductCard(product, index)).join('');
        }

        // Event listener untuk tombol kategori
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('[data-category]');
            categoryButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Hapus class active dari semua button
                    categoryButtons.forEach(btn => btn.classList.remove('rzw-bg-laravel'));
                    categoryButtons.forEach(btn => btn.classList.add('rzw-bg-laravel-light'));
                    
                    // Tambah class active ke button yang diklik
                    this.classList.remove('rzw-bg-laravel-light');
                    this.classList.add('rzw-bg-laravel');
                    
                    // Update kategori aktif
                    activeCategory = this.getAttribute('data-category');
                    
                    // Update tampilan produk
                    updateProductDisplay();
                });
            });

            // Tampilkan semua produk saat pertama kali load
            updateProductDisplay();
        });
    </script>
@endsection