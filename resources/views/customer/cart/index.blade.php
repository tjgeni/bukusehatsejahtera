@extends('layouts.customer_layout')

@section('title', 'Cart')

@push('styles')
    <style>
        .btn-back-cart {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .78rem 1rem;
            border-radius: 14px;
            background: #fff;
            border: 1px solid #E9DDFD;
            color: #7C3AED;
            text-decoration: none;
            font-size: .84rem;
            font-weight: 700;
            transition: .18s ease;
            box-shadow: 0 4px 14px rgba(124, 58, 237, .05);
        }

        .btn-back-cart:hover {
            background: #F5F3FF;
            border-color: #C4B5FD;
            color: #6D28D9;
            transform: translateY(-1px);
        }

        .cart-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.8rem;
        }

        .cart-title h1 {
            font-size: 1.45rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: .25rem;
            letter-spacing: -.03em;
        }

        .cart-title p {
            margin: 0;
            font-size: .88rem;
            color: var(--text-muted);
        }

        .cart-badge {
            background: rgba(124, 58, 237, .10);
            color: #7C3AED;
            border: 1px solid rgba(124, 58, 237, .14);
            padding: .65rem .95rem;
            border-radius: 999px;
            font-size: .8rem;
            font-weight: 700;
        }

        /* ───────── EMPTY STATE ───────── */
        .cart-empty {
            background: #fff;
            border: 1px solid #EEE7FF;
            border-radius: 24px;
            padding: 4rem 2rem;
            text-align: center;
        }

        .cart-empty-icon {
            width: 78px;
            height: 78px;
            margin: 0 auto 1.2rem;
            border-radius: 24px;
            background:
                linear-gradient(135deg,
                    rgba(124, 58, 237, .12),
                    rgba(168, 85, 247, .10));
            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 2rem;

            color: #7C3AED;
        }

        .cart-empty h3 {
            font-size: 1.05rem;
            font-weight: 700;

            color: var(--text-dark);

            margin-bottom: .4rem;
        }

        .cart-empty p {
            color: var(--text-muted);

            font-size: .86rem;

            margin-bottom: 1.5rem;
        }

        .btn-shop {
            background:
                linear-gradient(135deg, #7C3AED, #A855F7);

            color: #fff;

            border: none;

            border-radius: 14px;

            padding: .8rem 1.2rem;

            font-size: .85rem;
            font-weight: 600;

            text-decoration: none;

            transition: .18s ease;
        }

        .btn-shop:hover {
            transform: translateY(-1px);

            color: #fff;

            box-shadow:
                0 10px 24px rgba(124, 58, 237, .22);
        }

        /* ───────── CART LAYOUT ───────── */
        .cart-layout {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 1.5rem;
        }

        /* ───────── CART ITEMS ───────── */
        .cart-card {
            background: #fff;

            border: 1px solid #EEE7FF;

            border-radius: 22px;

            overflow: hidden;
        }

        .cart-item {
            display: flex;
            align-items: center;

            gap: 1rem;

            padding: 1rem 1.2rem;

            border-bottom: 1px solid #F3EEFF;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-image {
            width: 78px;
            height: 104px;

            border-radius: 12px;

            overflow: hidden;

            background: #F6F1FF;

            flex-shrink: 0;
        }

        .cart-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .cart-book-info {
            flex: 1;
            min-width: 0;
        }

        .cart-book-title {
            font-size: .95rem;
            font-weight: 700;

            color: var(--text-dark);

            margin-bottom: .3rem;

            line-height: 1.45;
        }

        .cart-book-category {
            font-size: .76rem;

            color: #8B5CF6;

            margin-bottom: .55rem;
        }

        .cart-book-price {
            font-size: .9rem;
            font-weight: 700;

            color: #7C3AED;
        }

        /* ───────── QTY ───────── */
        .qty-box {
            display: flex;
            align-items: center;

            border: 1px solid #E9DDFD;

            border-radius: 12px;

            overflow: hidden;

            flex-shrink: 0;
        }

        .qty-btn {
            width: 34px;
            height: 34px;

            border: none;

            background: #FAF7FF;

            color: #7C3AED;

            font-size: .85rem;
            font-weight: 700;
        }

        .qty-input {
            width: 44px;

            border: none;

            text-align: center;

            font-size: .82rem;
            font-weight: 600;

            color: var(--text-dark);
        }

        /* ───────── REMOVE BUTTON ───────── */
        .btn-remove {
            width: 38px;
            height: 38px;

            border: 1px solid #F3E8FF;

            background: #fff;

            border-radius: 12px;

            color: #A78BFA;

            display: flex;
            align-items: center;
            justify-content: center;

            transition: .18s ease;
        }

        .btn-remove:hover {
            background: #FEF2F2;

            border-color: #FECACA;

            color: #DC2626;
        }

        /* ───────── SUMMARY ───────── */
        .summary-card {
            background: #fff;

            border: 1px solid #EEE7FF;

            border-radius: 22px;

            padding: 1.3rem;

            position: sticky;
            top: 90px;
        }

        .summary-title {
            font-size: .95rem;
            font-weight: 700;

            color: var(--text-dark);

            margin-bottom: 1rem;
        }

        .summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: .85rem;

            font-size: .84rem;

            color: var(--text-muted);
        }

        .summary-total {
            padding-top: 1rem;

            border-top: 1px solid #F1E8FF;

            margin-top: 1rem;
        }

        .summary-total .summary-row {
            margin-bottom: 0;
        }

        .summary-total strong {
            font-size: 1rem;

            color: #7C3AED;
        }

        .btn-checkout {
            width: 100%;

            margin-top: 1.3rem;

            border: none;

            border-radius: 14px;

            background:
                linear-gradient(135deg, #7C3AED, #A855F7);

            color: #fff;

            padding: .85rem 1rem;

            font-size: .86rem;
            font-weight: 700;

            transition: .18s ease;
        }

        .btn-checkout:hover {
            transform: translateY(-1px);

            box-shadow:
                0 12px 26px rgba(124, 58, 237, .22);
        }

        /* ───────── RESPONSIVE ───────── */
        @media (max-width: 991px) {
            .cart-layout {
                grid-template-columns: 1fr;
            }

            .summary-card {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .cart-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .cart-item {
                flex-wrap: wrap;
            }

            .cart-image {
                width: 64px;
                height: 88px;
            }
        }
    </style>
@endpush

@section('content')

    <div style="padding-bottom:20px;">
        <a href="{{ route('products.index') }}" class="btn-back-cart">
            <i class="bi bi-arrow-left"></i>
            Kembali ke daftar produk
        </a>
    </div>

    <div class="cart-header">
        <div class="cart-title">
            <h1>Keranjang Belanja</h1>
            <p>Periksa kembali buku yang ingin kamu beli.</p>
        </div>

        <div class="cart-badge">
            {{ $cartItems->count() }} Item
        </div>

    </div>

    {{-- EMPTY --}}
    @if ($cartItems->isEmpty())
        <div class="cart-empty">

            <div class="cart-empty-icon">
                <i class="bi bi-cart-x"></i>
            </div>

            <h3>Keranjang masih kosong</h3>

            <p>
                Yuk temukan buku favoritmu dan mulai belanja sekarang.
            </p>

            <a href="/products" class="btn-shop">
                <i class="bi bi-book me-1"></i> Jelajahi Produk
            </a>

        </div>
    @else
        <div class="cart-layout">

            {{-- CART ITEMS --}}
            <div class="cart-card">

                @foreach ($cartItems as $item)
                    <div class="cart-item">

                        {{-- IMAGE --}}
                        <div class="cart-image">
                            @if ($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                            @endif
                        </div>

                        {{-- INFO --}}
                        <div class="cart-book-info">

                            <div class="cart-book-title">
                                {{ $item->product->name }}
                            </div>

                            <div class="cart-book-category">
                                {{ $item->product->category->name ?? 'Kategori' }}
                            </div>

                            <div class="cart-book-price">
                                Rp {{ number_format($item->product->price, 0, ',', '.') }}
                            </div>

                        </div>

                        {{-- QTY --}}
                        <div class="qty-box">
                            {{-- Kurangi --}}
                            <form method="POST" action="{{ route('cart.quantity.decrease', $item->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="qty-btn">-</button>
                            </form>

                            <input type="text" class="qty-input" value="{{ $item->quantity }}" readonly>

                            {{-- Tambah --}}
                            <form method="POST" action="{{ route('cart.quantity.increase', $item->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="qty-btn">+</button>
                            </form>
                        </div>

                        {{-- Hapus --}}
                        <form action="{{ route('cart.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn-remove">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </div>
                @endforeach

            </div>

            {{-- SUMMARY --}}
            <div class="summary-card">

                <div class="summary-title">
                    Ringkasan Belanja
                </div>

                <div class="summary-row">
                    <span>Total Item</span>
                    <strong>{{ $cartItems->sum('quantity') }}</strong>
                </div>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <strong>
                        Rp {{ number_format($cartItems->sum(fn($i) => $i->quantity * $i->product->price), 0, ',', '.') }}
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Biaya Admin</span>
                    <strong>Gratis</strong>
                </div>

                <div class="summary-total">
                    <div class="summary-row">
                        <span>Total Pembayaran</span>

                        <strong>
                            Rp
                            {{ number_format($cartItems->sum(fn($i) => $i->quantity * $i->product->price), 0, ',', '.') }}
                        </strong>
                    </div>
                </div>


                <a href="/checkout">
                    <button class="btn-checkout">
                        <i class="bi bi-credit-card me-1"></i>
                        Checkout Sekarang
                    </button>
                </a>

            </div>

        </div>
    @endif

@endsection
