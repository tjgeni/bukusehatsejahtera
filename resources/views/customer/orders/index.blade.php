@extends('layouts.customer_layout')

@section('title', 'Pesanan Saya')

@push('styles')
    <style>
        /* ───────── HEADER ───────── */
        .orders-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.8rem;
        }

        .orders-title h1 {
            font-size: 1.45rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: .25rem;
            letter-spacing: -.03em;
        }

        .orders-title p {
            margin: 0;
            font-size: .88rem;
            color: var(--text-muted);
        }

        .orders-badge {
            background: rgba(124, 58, 237, .10);
            color: #7C3AED;
            border: 1px solid rgba(124, 58, 237, .14);
            padding: .65rem .95rem;
            border-radius: 999px;
            font-size: .8rem;
            font-weight: 700;
        }

        /* ───────── EMPTY ───────── */
        .orders-empty {
            background: #fff;
            border: 1px solid #EEE7FF;
            border-radius: 24px;
            padding: 4rem 2rem;
            text-align: center;
        }

        .orders-empty-icon {
            width: 76px;
            height: 76px;
            margin: 0 auto 1.2rem;
            border-radius: 22px;
            background:
                linear-gradient(135deg,
                    rgba(124, 58, 237, .12),
                    rgba(168, 85, 247, .10));

            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.9rem;
            color: #7C3AED;
        }

        .orders-empty h3 {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: .4rem;
        }

        .orders-empty p {
            color: var(--text-muted);
            font-size: .86rem;
            margin-bottom: 1.4rem;
        }

        .btn-shop {
            background:
                linear-gradient(135deg, #7C3AED, #A855F7);
            color: #fff;
            border: none;
            border-radius: 14px;
            padding: .82rem 1.2rem;
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

        /* ───────── ORDER CARD ───────── */
        .order-card {
            background: #fff;
            border: 1px solid #EEE7FF;
            border-radius: 22px;
            overflow: hidden;
            margin-bottom: 1.3rem;
            transition: .18s ease;
        }

        .order-card:hover {
            transform: translateY(-2px);
            box-shadow:
                0 10px 28px rgba(124, 58, 237, .08);
        }

        .order-top {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid #F3EEFF;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .order-number {
            font-size: .92rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: .2rem;
        }

        .order-date {
            font-size: .76rem;
            color: var(--text-muted);
        }

        /* ───────── STATUS ───────── */
        .status-badge {
            padding: .48rem .85rem;
            border-radius: 999px;
            font-size: .73rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .03em;
        }

        .status-pending {
            background: #FEF3C7;
            color: #B45309;
        }

        .status-process {
            background: #DBEAFE;
            color: #1D4ED8;
        }

        .status-success {
            background: #DCFCE7;
            color: #15803D;
        }

        .status-shipping {
            background: #E0F2FE;
            color: #0369A1;
        }

        /* ───────── ITEMS ───────── */
        .order-items {
            padding: 1rem 1.2rem;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: .9rem;
            margin-bottom: 1rem;
        }

        .order-item:last-child {
            margin-bottom: 0;
        }

        .order-image {
            width: 58px;
            height: 78px;
            border-radius: 12px;
            overflow: hidden;
            background: #F6F1FF;
            flex-shrink: 0;
        }

        .order-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .order-book-info {
            flex: 1;
            min-width: 0;
        }

        .order-book-title {
            font-size: .88rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: .22rem;
            line-height: 1.45;
        }

        .order-book-meta {
            font-size: .76rem;
            color: var(--text-muted);
        }

        .order-book-price {
            font-size: .84rem;
            font-weight: 700;
            color: #7C3AED;
            white-space: nowrap;
        }

        /* ───────── FOOTER ───────── */
        .order-footer {
            padding: 1rem 1.2rem;
            border-top: 1px solid #F3EEFF;
            background: #FCFAFF;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .order-total-label {
            font-size: .8rem;
            color: var(--text-muted);
        }

        .order-total-price {
            font-size: 1rem;
            font-weight: 700;

            color: #7C3AED;
        }

        .btn-detail {
            border: none;
            background:
                linear-gradient(135deg, #7C3AED, #A855F7);
            color: #fff;
            border-radius: 12px;
            padding: .7rem 1rem;
            font-size: .8rem;
            font-weight: 600;
            text-decoration: none;
            transition: .18s ease;
        }

        .btn-detail:hover {
            transform: translateY(-1px);
            color: #fff;
            box-shadow:
                0 10px 20px rgba(124, 58, 237, .18);
        }

        /* ───────── RESPONSIVE ───────── */
        @media (max-width: 768px) {
            .orders-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .order-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-detail {
                text-align: center;
            }
        }
    </style>
@endpush

@section('content')

    {{-- HEADER --}}
    <div class="orders-header">

        <div class="orders-title">
            <h1>Pesanan Saya</h1>
            <p>Lihat riwayat dan status pesanan bukumu.</p>
        </div>

        <div class="orders-badge">
            {{ $orders->count() }} Pesanan
        </div>

    </div>

    {{-- EMPTY --}}
    @if ($orders->isEmpty())
        <div class="orders-empty">

            <div class="orders-empty-icon">
                <i class="bi bi-bag-x"></i>
            </div>

            <h3>Belum ada pesanan</h3>

            <p>
                Kamu belum melakukan pembelian buku apapun.
            </p>

            <a href="/products" class="btn-shop">
                <i class="bi bi-book me-1"></i> Mulai Belanja
            </a>

        </div>
    @else
        @foreach ($orders as $order)
            <div class="order-card">

                {{-- TOP --}}
                <div class="order-top">

                    <div>
                        <div class="order-number">
                            {{ $order->order_number }}
                        </div>

                        <div class="order-date">
                            {{ $order->created_at->timezone('Asia/Jakarta')->translatedFormat('d F Y • H:i') }}
                        </div>
                    </div>

                    <div>
                        @php
                            $statusClass = match ($order->status) {
                                'pending' => 'status-pending',
                                'diproses' => 'status-process',
                                'dikirim' => 'status-shipping',
                                'selesai' => 'status-success',
                                default => 'status-pending',
                            };
                        @endphp

                        <span class="status-badge {{ $statusClass }}">
                            {{ $order->status }}
                        </span>
                    </div>

                </div>

                {{-- ITEMS --}}
                <div class="order-items">

                    @foreach ($order->items->take(3) as $item)
                        <div class="order-item">

                            <div class="order-image">
                                @if ($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                        alt="{{ $item->product->name }}">
                                @endif
                            </div>

                            <div class="order-book-info">
                                <div class="order-book-title">
                                    {{ $item->product->name }}
                                </div>

                                <div class="order-book-meta">
                                    {{ $item->quantity }} x Rp
                                    {{ number_format($item->price, 0, ',', '.') }}
                                </div>

                            </div>

                            <div class="order-book-price">
                                Rp
                                {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                            </div>

                        </div>
                    @endforeach

                </div>

                {{-- FOOTER --}}
                <div class="order-footer">

                    <div>
                        <div class="order-total-label">
                            Total Pembayaran
                        </div>

                        <div class="order-total-price">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </div>
                    </div>

                    <a href="{{ route('orders.detail', $order->id) }}" class="btn-detail">
                        <i class="bi bi-eye me-1"></i>
                        Lihat Detail
                    </a>

                </div>

            </div>
        @endforeach

    @endif

@endsection
