@extends('layouts.customer_layout')

@section('title', 'Detail Pesanan')

@push('styles')
    <style>
        .order-wrapper {
            max-width: 1100px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            text-decoration: none;
            color: #7C3AED;
            font-weight: 700;
            font-size: .85rem;
            margin-bottom: 1.2rem;
        }

        .order-title {
            font-size: 1.6rem;
            font-weight: 800;
            color: #2E1065;
            margin-bottom: .3rem;
        }

        .order-subtitle {
            font-size: .9rem;
            color: #8B7AA8;
            margin-bottom: 1.5rem;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 1.5rem;
            align-items: start;
        }

        .card {
            background: rgba(255, 255, 255, .95);
            border: 1px solid #EEE7FF;
            border-radius: 22px;
            padding: 1.3rem;
            box-shadow: 0 12px 30px rgba(124, 58, 237, .06);
        }

        .section-title {
            font-size: .9rem;
            font-weight: 800;
            color: #2E1065;
            margin-bottom: 1rem;
        }

        /* items */
        .item {
            display: flex;
            gap: .9rem;
            padding: .8rem 0;
            border-bottom: 1px solid #F3EEFF;
        }

        .item:last-child {
            border-bottom: none;
        }

        .cover {
            width: 55px;
            height: 75px;
            border-radius: 10px;
            overflow: hidden;
            background: #F5F3FF;
            flex-shrink: 0;
        }

        .cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info {
            flex: 1;
        }

        .name {
            font-size: .88rem;
            font-weight: 700;
            color: #2E1065;
            margin-bottom: .2rem;
        }

        .meta {
            font-size: .78rem;
            color: #9F8DBF;
        }

        .price {
            font-size: .85rem;
            font-weight: 800;
            color: #7C3AED;
            white-space: nowrap;
        }

        /* summary */
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: .7rem;
            font-size: .85rem;
            color: #6D28D9;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px dashed #DDD6FE;
            font-weight: 900;
            color: #2E1065;
            font-size: 1.1rem;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            width: fit-content;
            padding: .35rem .75rem;
            border-radius: 999px;
            font-size: .75rem;
            font-weight: 700;
            background: #F5F3FF;
            color: #7C3AED;
            margin-bottom: 1rem;
            white-space: nowrap;
        }

        .info-box {
            font-size: .85rem;
            color: #6D28D9;
            line-height: 1.6;
        }

        .free-ship {
            margin-top: .8rem;
            padding: .6rem .8rem;
            background: #F5F3FF;
            border: 1px dashed #C4B5FD;
            border-radius: 12px;
            font-size: .8rem;
            font-weight: 700;
            color: #7C3AED;
        }

        @media(max-width: 991px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }

        .order-stepper {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin: 1.2rem 0 2rem;
        }

        .order-stepper::before {
            content: "";
            position: absolute;
            top: 14px;
            left: 0;
            right: 0;
            height: 2px;
            background: #E9DDFD;
            z-index: 0;
        }

        .step {
            position: relative;
            text-align: center;
            flex: 1;
            z-index: 1;
        }

        .step-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin: 0 auto 6px;
            background: #F5F3FF;
            border: 2px solid #E9DDFD;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9F8DBF;
            font-size: .85rem;
        }

        .step.active .step-icon {
            background: #7C3AED;
            border-color: #7C3AED;
            color: #fff;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, .12);
        }

        .step-label {
            font-size: .72rem;
            color: #9F8DBF;
            font-weight: 600;
        }

        .step.active .step-label {
            color: #7C3AED;
            font-weight: 700;
        }
    </style>
@endpush

@section('content')

    <div class="order-wrapper">

        <a href="{{ route('orders.index') }}" class="back-link">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Pesanan Saya
        </a>

        <div class="order-title">Detail Pesanan</div>
        <div class="order-subtitle">Informasi lengkap mengenai pesanan kamu.</div>

        @php
            $steps = [
                'pending' => 1,
                'diproses' => 2,
                'dikirim' => 3,
                'selesai' => 4,
            ];

            $currentStep = $steps[$order->status] ?? 1;
        @endphp

        <div class="order-stepper">
            <div class="step {{ $currentStep >= 1 ? 'active' : '' }}">
                <div class="step-icon">
                    <i class="bi bi-bag"></i>
                </div>
                <div class="step-label">Pesanan Dibuat</div>
            </div>

            <div class="step {{ $currentStep >= 2 ? 'active' : '' }}">
                <div class="step-icon">
                    <i class="bi bi-gear"></i>
                </div>
                <div class="step-label">Diproses</div>
            </div>

            <div class="step {{ $currentStep >= 3 ? 'active' : '' }}">
                <div class="step-icon">
                    <i class="bi bi-truck"></i>
                </div>
                <div class="step-label">Dikirim</div>
            </div>

            <div class="step {{ $currentStep >= 4 ? 'active' : '' }}">
                <div class="step-icon">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="step-label">Selesai</div>
            </div>
        </div>

        <div class="grid">

            {{-- LEFT --}}
            <div class="card">

                <div class="badge-status">
                    {{ ucfirst($order->status) }}
                </div>



                <div class="section-title">Produk Dipesan</div>

                @foreach ($order->items as $item)
                    <div class="item">
                        <div class="cover">
                            @if ($item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}">
                            @endif
                        </div>

                        <div class="info">
                            <div class="name">{{ $item->product->name }}</div>
                            <div class="meta">
                                {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="price">
                            Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- RIGHT --}}
            <div class="card">

                <div class="section-title">Ringkasan</div>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>

                <div class="summary-row">
                    <span>Ongkir</span>
                    <span style="color:#10B981;font-weight:700;">Gratis</span>
                </div>

                <div class="summary-total">
                    <span>Total</span>
                    <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                </div>

                <div class="free-ship">
                    🎉 Gratis Ongkir untuk semua pesanan
                </div>

                <div class="section-title" style="margin-top:1.3rem;">Detail Pengiriman</div>

                <div class="info-box">
                    <div><strong>Nama:</strong> {{ $order->user->name }}</div>
                    <div><strong>Telepon:</strong> {{ $order->phone }}</div>
                    <div><strong>Alamat:</strong> {{ $order->address }}</div>
                    <div><strong>Pembayaran:</strong> Cash On Delivery </div>
                </div>

            </div>

        </div>

    </div>

@endsection
