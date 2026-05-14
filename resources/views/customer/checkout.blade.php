@extends('layouts.customer_layout')

@section('title', 'Checkout')

@push('styles')
    <style>
        .checkout-header {
            margin-bottom: 1.8rem;
        }

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

        .checkout-title {
            font-size: 1.55rem;
            font-weight: 700;
            color: #2E1065;
            margin-bottom: .35rem;
            letter-spacing: -.03em;
        }

        .checkout-subtitle {
            font-size: .92rem;
            color: #8B7AA8;
            margin: 0;
        }

        /* Layout */
        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 1.5rem;
            align-items: start;
        }

        /* Card */
        .checkout-card {
            background: rgba(255, 255, 255, .95);
            border: 1px solid #EEE7FF;
            border-radius: 24px;
            padding: 1.4rem;
            box-shadow:
                0 12px 30px rgba(124, 58, 237, .06);
        }

        .card-title {
            font-size: .95rem;
            font-weight: 700;
            color: #2E1065;
            margin-bottom: 1.2rem;
        }

        /* Form */
        .form-label-custom {
            font-size: .76rem;
            font-weight: 700;
            color: #7C3AED;
            margin-bottom: .45rem;
            display: block;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .form-control-custom {
            width: 100%;
            border: 1.5px solid #E9DDFD;
            background: #FCFAFF;
            border-radius: 14px;
            padding: .78rem 1rem;
            font-size: .9rem;
            color: #2E1065;
            transition: .18s ease;
            outline: none;
        }

        .form-control-custom:focus {
            border-color: #A855F7;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(168, 85, 247, .10);
        }

        textarea.form-control-custom {
            min-height: 120px;
            resize: vertical;
        }

        .form-hint {
            margin-top: .45rem;
            font-size: .76rem;
            color: #9F8DBF;
        }

        /* Summary */
        .summary-item {
            display: flex;
            align-items: center;
            gap: .9rem;
            padding: .9rem 0;
            border-bottom: 1px solid #F3EEFF;
        }

        .summary-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .summary-cover {
            width: 58px;
            height: 78px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
            background: #F5F3FF;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .summary-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .summary-placeholder {
            width: 30px;
            height: 46px;
            border-radius: 5px;
            background: linear-gradient(135deg, #8B5CF6, #C084FC);
            box-shadow: -2px 2px 8px rgba(0, 0, 0, .12);
        }

        .summary-info {
            flex: 1;
            min-width: 0;
        }

        .summary-name {
            font-size: .88rem;
            font-weight: 700;
            color: #2E1065;
            margin-bottom: .25rem;
            line-height: 1.4;
        }

        .summary-meta {
            font-size: .76rem;
            color: #9F8DBF;
        }

        .summary-price {
            font-size: .85rem;
            font-weight: 700;
            color: #7C3AED;
            text-align: right;
            white-space: nowrap;
        }

        /* Total */
        .summary-total {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px dashed #DDD6FE;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .summary-total-label {
            font-size: .88rem;
            font-weight: 600;
            color: #6D28D9;
        }

        .summary-total-price {
            font-size: 1.15rem;
            font-weight: 800;
            color: #2E1065;
        }

        /* Button */
        .btn-checkout {
            width: 100%;
            margin-top: 1.3rem;
            border: none;
            border-radius: 16px;
            background:
                linear-gradient(135deg,
                    #7C3AED,
                    #A855F7);
            color: #fff;
            padding: .95rem 1rem;
            font-size: .92rem;
            font-weight: 700;
            transition: .18s ease;
            box-shadow:
                0 12px 24px rgba(124, 58, 237, .22);
        }

        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow:
                0 16px 30px rgba(124, 58, 237, .28);
        }

        .secure-note {
            margin-top: .9rem;
            text-align: center;
            font-size: .76rem;
            color: #A78BFA;
        }

        /* Empty */
        .empty-checkout {
            background: rgba(255, 255, 255, .95);
            border: 1px solid #EEE7FF;
            border-radius: 24px;
            padding: 4rem 2rem;
            text-align: center;
        }

        .empty-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #F5F3FF;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: #8B5CF6;
            font-size: 1.8rem;
        }

        .empty-title {
            font-size: 1rem;
            font-weight: 700;
            color: #2E1065;
            margin-bottom: .35rem;
        }

        .empty-desc {
            font-size: .88rem;
            color: #8B7AA8;
            margin-bottom: 1.4rem;
        }

        .btn-purple-soft {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .8rem 1.2rem;
            border-radius: 14px;
            background: #7C3AED;
            color: #fff;
            text-decoration: none;
            font-size: .86rem;
            font-weight: 700;
            transition: .18s ease;
        }

        .btn-purple-soft:hover {
            background: #6D28D9;
            color: #fff;
        }

        @media (max-width: 991px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <div style="padding-bottom:20px;">
        <a href="{{ route('cart.index') }}" class="btn-back-cart">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Keranjang
        </a>
    </div>

    <div class="checkout-header">
        <h1 class="checkout-title">Checkout Pesanan</h1>
        <p class="checkout-subtitle">
            Pastikan detail pesanan dan alamat pengiriman sudah benar.
        </p>
    </div>

    @if ($carts->cartItems->isEmpty())
        <div class="empty-checkout">
            <div class="empty-icon">
                <i class="bi bi-cart-x"></i>
            </div>

            <div class="empty-title">
                Keranjang masih kosong
            </div>

            <div class="empty-desc">
                Tambahkan beberapa buku favorit sebelum melakukan checkout.
            </div>

            <a href="/produk" class="btn-purple-soft">
                <i class="bi bi-book"></i>
                Jelajahi Buku
            </a>
        </div>
    @else
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="checkout-grid">
                <div class="checkout-card">
                    <div class="card-title">
                        Informasi Pengiriman
                    </div>
                    <div class="mb-3">
                        <label class="form-label-custom">
                            Nama Penerima
                        </label>

                        <input type="text" class="form-control-custom" value="{{ Auth::user()->name }}" disabled>

                        <div class="form-hint">
                            Menggunakan nama akun yang sedang login.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-custom">
                            Nomor Telepon
                        </label>

                        <input type="text" name="phone"
                            class="form-control-custom @error('phone') is-invalid @enderror" placeholder="08xxxxxxxxxx"
                            value="{{ old('phone', Auth::user()->phone) }}">

                        @error('phone')
                            <small class="text-danger d-block mt-2">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label class="form-label-custom">
                            Alamat Lengkap
                        </label>

                        <textarea name="address" class="form-control-custom @error('address') is-invalid @enderror"
                            placeholder="Masukkan alamat lengkap pengiriman...">{{ old('address', Auth::user()->address) }}</textarea>

                        @error('address')
                            <small class="text-danger d-block mt-2">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label-custom">
                            Metode Pembayaran
                        </label>

                        <div style="display: flex; flex-direction: column; gap: .6rem;">
                            <label style="display:flex; align-items:center; gap:.5rem; font-size:.9rem; color:#2E1065;">
                                <input type="radio" name="payment_method" value="cod" checked
                                    style="accent-color:#7C3AED;">
                                Cash On Delivery (COD)
                            </label>

                        </div>

                        <div class="form-hint">
                            Pembayaran dilakukan saat pesanan diterima.
                        </div>
                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="checkout-card">
                    <div class="card-title">
                        Ringkasan Pesanan
                    </div>

                    @php
                        $grandTotal = 0;
                    @endphp

                    @foreach ($carts->cartItems as $item)
                        @php
                            $subtotal = $item->product->price * $item->quantity;
                            $grandTotal += $subtotal;
                        @endphp

                        <div class="summary-item">
                            <div class="summary-cover">
                                @if ($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                        alt="{{ $item->product->name }}">
                                @else
                                    <div class="summary-placeholder"></div>
                                @endif
                            </div>

                            <div class="summary-info">
                                <div class="summary-name">{{ $item->product->name }}</div>
                                <div class="summary-meta">
                                    {{ $item->quantity }} x Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="summary-price">
                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach

                    <div class="summary-total">
                        <div class="summary-total-label">
                            Total Pembayaran
                        </div>

                        <div class="summary-total-price">
                            Rp {{ number_format($grandTotal, 0, ',', '.') }}
                        </div>
                    </div>

                    <div
                        style="margin-top: .8rem; padding: .6rem .8rem; background:#F5F3FF; border:1px dashed #C4B5FD; border-radius:12px; font-size:.8rem; color:#6D28D9; font-weight:600;">
                        🎉 Gratis Ongkir untuk semua pesanan
                    </div>

                    <button type="submit" class="btn-checkout">
                        <i class="bi bi-shield-check me-1"></i>
                        Buat Pesanan
                    </button>

                    <div class="secure-note">
                        Pembayaran & data pesanan diproses dengan aman.
                    </div>

                </div>

            </div>
        </form>
    @endif

@endsection
