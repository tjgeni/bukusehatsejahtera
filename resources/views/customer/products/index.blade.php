@extends('layouts.customer_layout')

@section('title', 'Daftar Produk')

@push('styles')
    <style>
        .products-page {
            padding: 2rem 0 3rem;
        }

        /* HEADER */
        .products-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;

            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .products-title-wrap h1 {
            font-size: 2rem;
            font-weight: 800;

            color: #24143A;

            margin-bottom: .4rem;

            letter-spacing: -.03em;
        }

        .products-title-wrap p {
            margin: 0;

            color: #7A728F;

            font-size: .92rem;
        }

        .products-count {
            background:
                linear-gradient(135deg,
                    rgba(124, 58, 237, .12),
                    rgba(168, 85, 247, .06));

            border: 1px solid rgba(124, 58, 237, .12);

            padding: .9rem 1.2rem;

            border-radius: 18px;

            font-size: .88rem;
            font-weight: 700;

            color: #7C3AED;
        }

        /* FILTER CARD */
        .filter-card {
            background: rgba(255, 255, 255, .88);

            border: 1px solid rgba(124, 58, 237, .08);

            border-radius: 24px;

            padding: 1.4rem;

            margin-bottom: 2rem;

            backdrop-filter: blur(12px);

            box-shadow:
                0 10px 28px rgba(124, 58, 237, .05);
        }

        .search-wrap {
            position: relative;
        }

        .search-wrap i {
            position: absolute;

            left: 16px;
            top: 50%;

            transform: translateY(-50%);

            color: #A39CB8;

            font-size: .95rem;
        }

        .search-input {
            width: 100%;

            height: 52px;

            border:
                1px solid rgba(124, 58, 237, .10);

            border-radius: 16px;

            padding: 0 1rem 0 46px;

            font-size: .88rem;

            background: #fff;

            transition: .18s ease;
        }

        .search-input:focus {
            outline: none;

            border-color:
                rgba(124, 58, 237, .28);

            box-shadow:
                0 0 0 4px rgba(124, 58, 237, .08);
        }

        /* CATEGORY PILLS */
        .category-pills {
            display: flex;
            flex-wrap: wrap;
            gap: .7rem;

            margin-top: 1.2rem;
        }

        .pill {
            border: 1px solid rgba(124, 58, 237, .10);

            background: #fff;

            color: #6F6A86;

            border-radius: 999px;

            padding: .55rem 1rem;

            text-decoration: none;

            font-size: .82rem;
            font-weight: 600;

            transition: .18s ease;
        }

        .pill:hover {
            background:
                rgba(124, 58, 237, .08);

            color: #7C3AED;
        }

        .pill.active {
            background:
                linear-gradient(135deg,
                    #7C3AED,
                    #A855F7);

            border-color: transparent;

            color: #fff;
        }

        /* PRODUCT GRID */
        .product-grid {
            row-gap: 1.5rem;
        }

        /* CARD */
        .book-card {
            background: rgba(255, 255, 255, .92);

            border:
                1px solid rgba(124, 58, 237, .08);

            border-radius: 22px;

            overflow: hidden;

            transition:
                transform .2s ease,
                box-shadow .2s ease;

            height: 100%;

            backdrop-filter: blur(10px);

            box-shadow:
                0 8px 24px rgba(124, 58, 237, .05);
        }

        .book-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 18px 40px rgba(124, 58, 237, .12);
        }

        /* COVER */
        .book-cover {
            height: 230px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(135deg,
                    rgba(124, 58, 237, .08),
                    rgba(168, 85, 247, .04));
        }

        .book-image {
            width: 95px;
            height: 138px;

            object-fit: cover;

            border-radius: 8px 14px 14px 8px;

            box-shadow:
                -6px 10px 22px rgba(0, 0, 0, .18);
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
            font-size: .94rem;
            font-weight: 700;

            line-height: 1.45;

            color: #24143A;

            margin-bottom: .45rem;

            min-height: 20px;
        }

        .book-description {
            font-size: .78rem;

            color: #7A728F;

            line-height: 1.7;

            min-height: 62px;

            margin-bottom: 1rem;
        }

        .book-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: .75rem;
        }

        .book-price {
            font-size: .92rem;
            font-weight: 800;

            color: #7C3AED;
        }

        .btn-detail {
            display: inline-flex;
            align-items: center;
            gap: .45rem;

            background:
                linear-gradient(135deg,
                    #7C3AED,
                    #A855F7);

            color: #fff;
            text-decoration: none;

            border-radius: 12px;

            padding: .7rem .95rem;

            font-size: .78rem;
            font-weight: 700;

            transition: .18s ease;

            box-shadow:
                0 10px 22px rgba(124, 58, 237, .14);
        }

        .btn-detail:hover {
            transform: translateY(-2px);

            color: #fff;
        }

        /* EMPTY */
        .empty-state {
            background: rgba(255, 255, 255, .88);

            border:
                1px solid rgba(124, 58, 237, .08);

            border-radius: 28px;

            padding: 4rem 2rem;

            text-align: center;
        }

        .empty-state i {
            font-size: 3rem;

            color: #C4B5FD;

            margin-bottom: 1rem;
        }

        .empty-state h5 {
            font-size: 1rem;
            font-weight: 700;

            color: #24143A;

            margin-bottom: .5rem;
        }

        .empty-state p {
            color: #7A728F;

            margin: 0;
        }

        @media (max-width: 768px) {
            .products-title-wrap h1 {
                font-size: 1.6rem;
            }

            .book-cover {
                height: 200px;
            }

            .book-image {
                width: 82px;
                height: 120px;
            }
        }
    </style>
@endpush

@section('content')

    <div class="container products-page">

        {{-- HEADER --}}
        <div class="products-header">

            <div class="products-title-wrap">
                <h1>Daftar Buku</h1>
                <p>Temukan koleksi buku terbaik favoritmu.</p>
            </div>

            <div class="products-count">
                {{ $products->total() }} Produk
            </div>

        </div>

        {{-- FILTER --}}
        <div class="filter-card">

            {{-- SEARCH --}}
            <div class="search-wrap">
                <i class="bi bi-search"></i>

                <form method="GET" action="/products" id="filterForm">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" id="searchInput" class="search-input"
                        placeholder="Cari nama buku..." value="{{ request('search') }}">
                </form>
            </div>

            {{-- CATEGORY FILTER --}}
            <div class="category-pills">

                <a href="{{ route('products.index') }}" class="pill {{ request('category') ? '' : 'active' }}">
                    Semua
                </a>

                @foreach ($categories as $category)
                    <a href="{{ route('products.index', [
                        'category' => $category->id,
                        'search' => request('search'),
                    ]) }}"
                        class="pill {{ request('category') == $category->id ? 'active' : '' }}">

                        {{ $category->name }}

                    </a>
                @endforeach

            </div>


        </div>

        {{-- PRODUCTS --}}
        @if ($products->count())

            <div class="row product-grid">

                @foreach ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3">

                        <div class="book-card">

                            {{-- IMAGE --}}
                            <div class="book-cover">

                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="book-image"
                                        alt="{{ $product->name }}">
                                @else
                                    <img src="https://dummyimage.com/300x450/e9d5ff/7c3aed&text=No+Image" class="book-image"
                                        alt="No image">
                                @endif

                            </div>

                            {{-- BODY --}}
                            <div class="book-card-body">

                                <div class="book-category">
                                    {{ $product->category->name ?? 'Kategori' }}
                                </div>

                                <div class="book-title">
                                    {{ Str::limit($product->name, 42) }}
                                </div>

                                <div class="book-description">
                                    {{ Str::limit($product->description, 75) }}
                                </div>

                                <div class="book-footer">

                                    <div class="book-price">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </div>

                                    <a href="{{ route('products.detail', $product->id) }}" class="btn-detail">

                                        Detail
                                        <i class="bi bi-arrow-right"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

            {{-- PAGINATION --}}
            <div class="mt-5 d-flex justify-content-center">
                {{ $products->appends(request()->query())->links() }}
            </div>
        @else
            <div class="empty-state">

                <i class="bi bi-search"></i>

                <h5>Produk tidak ditemukan</h5>

                <p>
                    Coba gunakan kata kunci lain atau pilih kategori berbeda.
                </p>

            </div>

        @endif

    </div>


@endsection

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', () => {

            const searchInput = document.getElementById('searchInput');
            const filterForm = document.getElementById('filterForm');

            let debounce;

            searchInput.addEventListener('keyup', () => {
                clearTimeout(debounce);
                debounce = setTimeout(() => {
                    filterForm.requestSubmit();
                }, 500);

            });
        });
    </script>
@endpush
