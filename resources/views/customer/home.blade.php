@extends('layouts.customer_layout')

@section('title', 'Beranda')

@push('styles')
    <style>
        /* ── HERO BANNER ── */
        .hero-banner {
            background:
                linear-gradient(135deg,
                    rgba(124, 58, 237, 0.10),
                    rgba(168, 85, 247, 0.06));

            border: 1px solid rgba(124, 58, 237, 0.12);

            border-radius: 24px;

            padding: 3rem;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;

            margin-bottom: 2rem;

            overflow: hidden;
            position: relative;
        }

        .hero-text {
            max-width: 500px;
            z-index: 2;
        }

        .hero-text h1 {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1.2;

            color: #24143A;

            margin-bottom: .8rem;
        }

        .hero-text p {
            font-size: .95rem;
            color: #6F6A86;

            margin-bottom: 1.4rem;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            gap: .5rem;

            background: linear-gradient(135deg, #7C3AED, #A855F7);

            color: #fff;
            text-decoration: none;

            padding: .8rem 1.2rem;

            border-radius: 12px;

            font-size: .88rem;
            font-weight: 600;

            transition: .2s ease;

            box-shadow:
                0 10px 25px rgba(124, 58, 237, .18);
        }

        .hero-btn:hover {
            transform: translateY(-2px);
            color: #fff;

            box-shadow:
                0 14px 28px rgba(124, 58, 237, .25);
        }

        .hero-illustration img {
            width: 260px;
            max-width: 100%;
            object-fit: contain;
        }

        @media (max-width: 768px) {
            .hero-banner {
                flex-direction: column;
                text-align: center;
                padding: 2rem;
            }

            .hero-text h1 {
                font-size: 1.7rem;
            }

            .hero-illustration img {
                width: 200px;
            }
        }

        /* ── CATEGORY PILLS ── */
        .category-pills {
            display: flex;
            gap: .65rem;

            flex-wrap: wrap;

            margin-bottom: 2rem;
        }

        .category-pills .pill {
            background: #fff;

            border: 1px solid var(--border-color);

            border-radius: 999px;

            padding: .48rem 1.15rem;

            font-size: .82rem;
            font-weight: 600;

            color: #6D6780;

            cursor: pointer;

            transition: .18s ease;

            font-family: var(--font-body);

            text-decoration: none;

            white-space: nowrap;

            box-shadow:
                0 4px 12px rgba(139, 92, 246, .03);
        }

        .category-pills .pill:hover {
            background: var(--primary-soft);

            border-color: rgba(139, 92, 246, .14);

            color: var(--primary);
        }

        .category-pills .pill.active {
            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            border-color: transparent;

            color: #fff;

            font-weight: 700;

            box-shadow:
                0 10px 20px rgba(139, 92, 246, .22);
        }

        /* ── SECTION TITLE ── */
        .section-title {
            font-family: var(--font-body);

            font-size: 1rem;
            font-weight: 700;

            color: var(--text-dark);

            margin-bottom: 1.15rem;

            letter-spacing: -.02em;
        }

        /* ── BOOK CARD ── */
        /* CARD */
        .book-card {
            background: rgba(255, 255, 255, .92);

            border:
                1px solid rgba(124, 58, 237, .08);

            border-radius: 22px;

            overflow: hidden;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                border-color .2s ease;

            height: 100%;

            backdrop-filter: blur(10px);

            box-shadow:
                0 8px 24px rgba(124, 58, 237, .05);
        }

        .book-card:hover {
            transform: translateY(-5px);

            border-color:
                rgba(124, 58, 237, .18);

            box-shadow:
                0 20px 45px rgba(124, 58, 237, .12);
        }

        /* COVER */
        .book-cover {
            height: 230px;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;

            overflow: hidden;
        }

        /* BACKGROUND VARIANTS */
        .cover-blue {
            background:
                linear-gradient(135deg,
                    rgba(59, 130, 246, .10),
                    rgba(96, 165, 250, .04));
        }

        .cover-green {
            background:
                linear-gradient(135deg,
                    rgba(34, 197, 94, .10),
                    rgba(74, 222, 128, .04));
        }

        .cover-peach {
            background:
                linear-gradient(135deg,
                    rgba(249, 115, 22, .10),
                    rgba(251, 146, 60, .04));
        }

        .cover-pink {
            background:
                linear-gradient(135deg,
                    rgba(168, 85, 247, .10),
                    rgba(192, 132, 252, .04));
        }

        /* IMAGE */
        .book-image {
            width: 92px;
            height: 132px;

            object-fit: cover;

            border-radius: 8px 14px 14px 8px;

            box-shadow:
                -6px 10px 22px rgba(0, 0, 0, .18);

            transition:
                transform .2s ease;
        }

        .book-card:hover .book-image {
            transform:
                rotate(-2deg) scale(1.03);
        }

        /* FALLBACK */
        .book-spine {
            width: 92px;
            height: 132px;

            border-radius: 8px 14px 14px 8px;

            box-shadow:
                -6px 10px 22px rgba(0, 0, 0, .18),
                inset -6px 0 10px rgba(0, 0, 0, .12);
        }

        .book-spine-blue {
            background:
                linear-gradient(135deg,
                    #60A5FA,
                    #3B82F6);
        }

        .book-spine-green {
            background:
                linear-gradient(135deg,
                    #4ADE80,
                    #22C55E);
        }

        .book-spine-orange {
            background:
                linear-gradient(135deg,
                    #FB923C,
                    #F97316);
        }

        .book-spine-red {
            background:
                linear-gradient(135deg,
                    #C084FC,
                    #A855F7);
        }

        /* BODY */
        .book-card-body {
            padding: 1rem;
        }

        .book-category {
            display: inline-flex;
            align-items: center;
            background:
                rgba(124, 58, 237, .08);
            color: #7C3AED;
            border-radius: 999px;
            padding: .35rem .75rem;
            font-size: .7rem;
            font-weight: 700;
            margin-bottom: .8rem;
        }

        .book-title {
            font-size: .92rem;
            font-weight: 700;
            color: #24143A;
            line-height: 1.45;
            margin-bottom: .4rem;
            min-height: 44px;
        }

        .book-description {
            font-size: .78rem;
            color: #7A728F;
            line-height: 1.6;
            min-height: 42px;
            margin-bottom: 1rem;
        }

        /* FOOTER */
        .book-footer {
            margin-bottom: .9rem;
        }

        .book-price {
            font-size: .92rem;
            font-weight: 800;
            color: #7C3AED;
        }

        /* BUTTON */
        .btn-detail {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .55rem;
            background:
                linear-gradient(135deg,
                    #7C3AED,
                    #A855F7);
            color: #fff;
            text-decoration: none;
            border-radius: 14px;
            padding: .78rem 1rem;
            font-size: .82rem;
            font-weight: 700;
            transition: .2s ease;
            box-shadow:
                0 10px 22px rgba(124, 58, 237, .16);
        }

        .btn-detail:hover {
            transform: translateY(-2px);

            color: #fff;

            box-shadow:
                0 16px 30px rgba(124, 58, 237, .24);
        }

        .btn-detail i {
            transition: transform .18s ease;
        }

        .btn-detail:hover i {
            transform: translateX(4px);
        }

        .btn-keranjang {
            flex: 1;
            background: var(--primary-soft);
            border: 1px solid transparent;
            border-radius: 12px;
            font-size: .8rem;
            font-weight: 700;
            color: var(--primary);
            padding: .52rem .6rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .35rem;
            cursor: pointer;
            transition: .18s ease;
            text-decoration: none;
        }

        .btn-keranjang:hover {
            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            color: #fff;

            box-shadow:
                0 10px 20px rgba(139, 92, 246, .22);
        }

        .btn-keranjang i {
            font-size: .9rem;
        }

        /* ── PAGINATION DOTS ── */
        .page-dots {
            display: flex;
            justify-content: center;

            gap: .45rem;

            margin-top: 2.4rem;
        }

        .page-dots span {
            width: 9px;
            height: 9px;

            border-radius: 999px;

            background: #D8D0F0;

            display: inline-block;

            cursor: pointer;

            transition: .18s ease;
        }

        .page-dots span.active {
            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            width: 26px;

            border-radius: 999px;

            box-shadow:
                0 4px 12px rgba(139, 92, 246, .25);
        }
    </style>
@endpush

@section('content')

    {{-- Hero Banner --}}
    <div class="hero-banner">
        <div class="hero-text">
            <h1>Temukan buku favoritmu</h1>
            <p>Koleksi buku terlengkap, harga terbaik</p>

            <a href="/products" class="hero-btn">
                Jelajahi Buku
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="hero-illustration">
            <img src="{{ asset('assets/images/books-hero.png') }}" alt="book illustration">
        </div>
    </div>

    {{-- Book Grid --}}
    <h2 class="section-title">Buku tersedia</h2>

    @if ($products->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-book" style="font-size:2.5rem;opacity:0.3;"></i>
            <p class="mt-2 mb-0">Tidak ada buku tersedia.</p>
        </div>
    @else
        <div class="row g-3">
            @php
                $coverBgs = ['cover-blue', 'cover-green', 'cover-peach', 'cover-pink'];
                $spineColors = ['book-spine-blue', 'book-spine-green', 'book-spine-orange', 'book-spine-red'];
            @endphp

            @foreach ($products as $i => $product)
                @php
                    $bg = $coverBgs[$i % 4];
                    $spine = $spineColors[$i % 4];
                @endphp

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="book-card">
                        <div class="book-cover {{ $bg }}">

                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="book-image"
                                    alt="{{ $product->name }}">
                            @else
                                <div class="book-spine {{ $spine }}"></div>
                            @endif

                        </div>

                        {{-- BODY --}}
                        <div class="book-card-body">
                            <div class="book-category">
                                {{ $product->category->name ?? 'Kategori' }}
                            </div>

                            <div class="book-title">
                                {{ Str::limit($product->name, 38) }}
                            </div>

                            <div class="book-description">
                                {{ Str::limit($product->description, 60) }}
                            </div>

                            <div class="book-footer">
                                <div class="book-price">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            </div>

                            <a href="{{ route('products.detail', $product->id) }}" class="btn-detail">
                                <span>Lihat Detail</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
