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
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari produk..." name="search" id="searchInput" onkeyup="filterProducts()" style="border: 1px solid #FF3B30; outline: none;">
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <div class="d-flex flex-wrap gap-2 product-card" style="animation-delay: ${delay}s">
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
        const products = [
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
        ];

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
                        <img class="card-img-top" src="${product.image}" alt="..." 
                             style="border-radius: 10px 10px 0px 0px;" />
                        <div class="card-body p-4">
                            <a href="{{ route('login') }}" class="text-decoration-none text-dark">
                                <div class="text-center">
                                    <h5 class="fw-bolder">${product.title}</h5>
                                    ${product.originalPrice ? 
                                        `<span class="text-muted text-decoration-line-through">$${product.originalPrice}</span>` : ''}
                                    $${product.price}
                                </div>
                            </a>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center">
                            <div class="col-md-6 m-1">
                                <span class="rzw-btn-border">
                                    <a href="{{ route('login') }}" 
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