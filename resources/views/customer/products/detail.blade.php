@extends('layouts.customer_layout')

@section('title', $product->name)

@push('styles')
    <style>
        .product-detail-wrap {
            padding: 2rem 0 3rem;
        }

        /* Breadcrumb */
        .breadcrumb-custom {
            display: flex;
            align-items: center;
            gap: .5rem;

            font-size: .82rem;

            margin-bottom: 1.5rem;

            color: var(--text-muted);
        }

        .breadcrumb-custom a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-custom i {
            font-size: .7rem;
            opacity: .6;
        }

        /* Main Card */
        .product-detail-card {
            background: rgba(255, 255, 255, .88);

            border: 1px solid rgba(124, 58, 237, .10);

            border-radius: 28px;

            overflow: hidden;

            backdrop-filter: blur(12px);

            box-shadow:
                0 18px 50px rgba(124, 58, 237, .08);
        }

        .product-left {
            padding: 2rem;
            background:
                radial-gradient(circle at top left,
                    rgba(168, 85, 247, .10),
                    transparent 45%);
        }

        .product-image-wrap {
            background:
                linear-gradient(145deg,
                    rgba(124, 58, 237, .08),
                    rgba(168, 85, 247, .03));

            border-radius: 24px;

            padding: 2rem;

            display: flex;
            align-items: center;
            justify-content: center;

            min-height: 520px;
        }

        .product-image {
            width: 100%;
            max-width: 320px;
            height: auto;

            object-fit: contain;

            border-radius: 18px;

            box-shadow:
                0 20px 40px rgba(0, 0, 0, .12);
        }

        /* Right Content */
        .product-right {
            padding: 2.2rem;
        }

        .product-category {
            display: inline-flex;
            align-items: center;

            gap: .45rem;

            background:
                rgba(124, 58, 237, .10);

            color: var(--primary);

            padding: .45rem .9rem;

            border-radius: 999px;

            font-size: .76rem;
            font-weight: 700;

            margin-bottom: 1rem;
        }

        .product-title {
            font-size: 2rem;
            font-weight: 800;

            line-height: 1.25;

            color: var(--text);

            margin-bottom: .8rem;

            letter-spacing: -.03em;
        }

        .product-meta {
            display: flex;
            align-items: center;
            gap: 1rem;

            flex-wrap: wrap;

            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: .45rem;

            font-size: .82rem;

            color: var(--text-muted);
        }

        .meta-item i {
            color: var(--primary);
        }

        .product-price {
            font-size: 2rem;
            font-weight: 800;

            color: var(--primary);

            margin-bottom: 1.5rem;
        }

        .product-divider {
            height: 1px;

            background:
                linear-gradient(to right,
                    rgba(124, 58, 237, .15),
                    transparent);

            margin: 1.5rem 0;
        }

        .product-description-title {
            font-size: .9rem;
            font-weight: 700;

            color: var(--text);

            margin-bottom: .8rem;
        }

        .product-description {
            font-size: .92rem;

            line-height: 1.9;

            color: #6F6A86;
        }

        /* Stock */
        .stock-badge {
            display: inline-flex;
            align-items: center;
            gap: .45rem;

            padding: .6rem 1rem;

            border-radius: 12px;

            font-size: .82rem;
            font-weight: 700;

            margin-top: 1.4rem;
        }

        .stock-available {
            background:
                rgba(34, 197, 94, .10);

            color: #16A34A;
        }

        .stock-empty {
            background:
                rgba(239, 68, 68, .10);

            color: #DC2626;
        }

        /* Actions */
        .product-actions {
            display: flex;
            gap: .9rem;

            margin-top: 2rem;

            flex-wrap: wrap;
        }

        .btn-purple {
            border: none;

            background:
                linear-gradient(135deg,
                    #7C3AED,
                    #A855F7);

            color: #fff;

            border-radius: 14px;

            padding: .9rem 1.4rem;

            font-size: .88rem;
            font-weight: 700;

            display: inline-flex;
            align-items: center;
            gap: .55rem;

            text-decoration: none;

            transition: .2s ease;

            box-shadow:
                0 14px 30px rgba(124, 58, 237, .20);
        }

        .btn-purple:hover {
            transform: translateY(-2px);

            color: #fff;

            box-shadow:
                0 18px 35px rgba(124, 58, 237, .28);
        }

        .btn-outline-soft {
            border: 1px solid rgba(124, 58, 237, .14);

            background: #fff;

            color: var(--primary);

            border-radius: 14px;

            padding: .9rem 1.2rem;

            font-size: .88rem;
            font-weight: 700;

            text-decoration: none;

            display: inline-flex;
            align-items: center;
            gap: .5rem;

            transition: .18s ease;
        }

        .btn-outline-soft:hover {
            background:
                rgba(124, 58, 237, .06);

            color: var(--primary);
        }

        @media (max-width: 991px) {
            .product-title {
                font-size: 1.6rem;
            }

            .product-price {
                font-size: 1.6rem;
            }

            .product-image-wrap {
                min-height: auto;
            }
        }
    </style>
@endpush

@section('content')

    <div class="container product-detail-wrap">

        {{-- Breadcrumb --}}
        <div class="breadcrumb-custom">
            <a href="/home">Beranda</a>
            <i class="bi bi-chevron-right"></i>

            <a href="/products">Produk</a>
            <i class="bi bi-chevron-right"></i>

            <span>{{ $product->name }}</span>
        </div>

        <div class="product-detail-card">
            <div class="row g-0">

                {{-- LEFT --}}
                <div class="col-lg-5">
                    <div class="product-left">
                        <div class="product-image-wrap">

                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="product-image"
                                    alt="{{ $product->name }}">
                            @else
                                <img src="https://dummyimage.com/600x800/e9d5ff/7c3aed&text=No+Image" class="product-image"
                                    alt="No image">
                            @endif

                        </div>
                    </div>
                </div>

                {{-- RIGHT --}}
                <div class="col-lg-7">
                    <div class="product-right">

                        <div class="product-category">
                            <i class="bi bi-bookmark-fill"></i>
                            {{ $product->category->name ?? 'Kategori' }}
                        </div>

                        <h1 class="product-title">
                            {{ $product->name }}
                        </h1>

                        <div class="product-meta">
                            <div class="meta-item">
                                <i class="bi bi-calendar3"></i>
                                {{ $product->created_at->format('d M Y') }}
                            </div>

                            <div class="meta-item">
                                <i class="bi bi-box-seam"></i>
                                {{ $product->stock }} stok tersedia
                            </div>
                        </div>

                        <div class="product-price">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </div>

                        <div class="product-divider"></div>

                        <div class="product-description-title">
                            Deskripsi Buku
                        </div>

                        <div class="product-description">
                            {{ $product->description }}
                        </div>

                        @if ($product->stock > 0)
                            <div class="stock-badge stock-available">
                                <i class="bi bi-check-circle-fill"></i>
                                Produk tersedia
                            </div>
                        @else
                            <div class="stock-badge stock-empty">
                                <i class="bi bi-x-circle-fill"></i>
                                Produk habis
                            </div>
                        @endif

                        <div class="product-actions">

                            <form method="POST" action="{{ route('cart.add', $product) }}">
                                @csrf
                                <button type="submit" class="btn-purple">
                                    <i class="bi bi-cart-plus-fill"></i>
                                    Tambah ke Keranjang
                                </button>
                            </form>

                            <a href="/products" class="btn-outline-soft">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
