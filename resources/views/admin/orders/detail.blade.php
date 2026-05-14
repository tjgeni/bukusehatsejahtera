@extends('layouts.admin_layout')

@section('title', 'Detail Pesanan')

@push('styles')
    <style>
        .detail-grid {
            display: grid;
            grid-template-columns: 1.6fr .9fr;
            gap: 22px;
        }

        .card-section {
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border);
            border-radius: 24px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-header-custom {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
        }

        .card-title-custom {
            margin: 0;

            font-size: 1rem;
            font-weight: 700;

            color: var(--text);

            letter-spacing: -.02em;
        }

        .card-subtitle-custom {
            margin: 4px 0 0;

            font-size: .82rem;
            color: var(--text-muted);
        }

        .card-body-custom {
            padding: 24px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .info-item {
            background: #FCFBFF;

            border: 1px solid #F0EAFE;
            border-radius: 18px;

            padding: 16px;
        }

        .info-label {
            font-size: .72rem;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: .05em;

            color: var(--text-subtle);

            margin-bottom: 7px;
        }

        .info-value {
            font-size: .88rem;
            font-weight: 600;

            color: var(--text);
        }

        .table-order {
            margin: 0;
        }

        .table-order thead th {
            background: #FCFBFF;

            border-bottom: 1px solid var(--border);

            color: var(--text-subtle);

            font-size: .72rem;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: .05em;

            padding: 16px 20px;
        }

        .table-order tbody td {
            padding: 18px 20px;
            vertical-align: middle;

            border-color: #F2ECFB;

            font-size: .84rem;
            color: #4B5563;
        }

        .product-name {
            font-weight: 700;
            color: var(--text);
        }

        .summary-box {
            background: #FCFBFF;

            border: 1px solid #F0EAFE;
            border-radius: 20px;

            padding: 20px;
        }

        .summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 14px;

            font-size: .84rem;
        }

        .summary-row:last-child {
            margin-bottom: 0;
        }

        .summary-label {
            color: var(--text-muted);
        }

        .summary-value {
            font-weight: 700;
            color: var(--text);
        }

        .summary-total {
            margin-top: 14px;
            padding-top: 14px;

            border-top: 1px dashed #DDD6FE;
        }

        .summary-total .summary-label,
        .summary-total .summary-value {
            font-size: .96rem;
            color: var(--primary);
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: .52rem .85rem;

            border-radius: 999px;

            font-size: .74rem;
            font-weight: 700;
        }

        .badge-pending {
            background: #FEF3C7;
            color: #92400E;
        }

        .badge-paid {
            background: #DCFCE7;
            color: #166534;
        }

        .badge-process {
            background: #DBEAFE;
            color: #1D4ED8;
        }

        .badge-shipping {
            background: #E0F2FE;
            color: #0369A1;
        }

        .form-label-custom {
            font-size: .78rem;
            font-weight: 700;

            color: var(--text);

            margin-bottom: 8px;
        }

        .form-select-custom {
            border: 1px solid var(--border);
            border-radius: 14px;

            min-height: 48px;

            font-size: .84rem;

            box-shadow: none !important;
        }

        .form-select-custom:focus {
            border-color: rgba(124, 58, 237, .45);

            box-shadow: 0 0 0 4px rgba(124, 58, 237, .08) !important;
        }

        .btn-save {
            width: 100%;

            border: none;

            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            color: #fff;

            border-radius: 14px;

            min-height: 46px;

            font-size: .84rem;
            font-weight: 700;

            transition: .18s ease;

            box-shadow:
                0 10px 20px rgba(124, 58, 237, .18);
        }

        .btn-save:hover {
            transform: translateY(-1px);

            opacity: .95;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            border: 1px solid var(--border);

            background: #fff;

            color: #6B7280;

            border-radius: 14px;

            padding: .72rem 1rem;

            text-decoration: none;

            font-size: .82rem;
            font-weight: 600;

            transition: .18s ease;
        }

        .btn-back:hover {
            background: var(--primary-soft);

            border-color: rgba(124, 58, 237, .18);

            color: var(--primary);
        }

        @media (max-width: 991px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        .product-image {
            width: 60px;
            height: 80px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #EEE7FB;
            display: block;
        }
    </style>
@endpush

@section('content')

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1" style="font-size: 1.1rem;">
                {{ $order->order_number }}
            </h2>

            <p class="text-muted mb-0" style="font-size: .84rem;">
                Detail lengkap pesanan customer.
            </p>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="btn-back">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>

    <div class="detail-grid">

        {{-- LEFT --}}
        <div class="d-flex flex-column gap-4">

            {{-- CUSTOMER --}}
            <div class="card-section">

                <div class="card-header-custom">
                    <div>
                        <h3 class="card-title-custom">
                            Informasi Customer
                        </h3>

                        <p class="card-subtitle-custom">
                            Data customer dan detail pengiriman.
                        </p>
                    </div>
                </div>

                <div class="card-body-custom">

                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Nama Customer</div>
                            <div class="info-value">
                                {{ $order->user->name }}
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Email</div>

                            <div class="info-value">
                                {{ $order->user->email }}
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">No Telepon</div>

                            <div class="info-value">
                                {{ $order->phone }}
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">Tanggal Order</div>

                            <div class="info-value">
                                {{ $order->created_at->timezone('Asia/Jakarta')->format('d M Y • H:i') }}
                            </div>
                        </div>

                        <div class="info-item" style="grid-column: 1/-1;">
                            <div class="info-label">Alamat Pengiriman</div>

                            <div class="info-value">
                                {{ $order->address }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            {{-- PRODUCTS --}}
            <div class="card-section">

                <div class="card-header-custom">
                    <div>
                        <h3 class="card-title-custom">
                            Produk Pesanan
                        </h3>

                        <p class="card-subtitle-custom">
                            Daftar item yang dibeli customer.
                        </p>
                    </div>
                </div>

                <div class="table-responsive">

                    <table class="table table-order align-middle">

                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th width="120">Harga</th>
                                <th width="90">Qty</th>
                                <th width="140">Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($order->items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="product-image-wrapper">

                                                <img src="{{ $item->product?->image
                                                    ? asset('storage/' . $item->product->image)
                                                    : 'https://placehold.co/60x80/F5F3FF/7C3AED?text=No+Image' }}"
                                                    alt="{{ $item->product->name }}" class="product-image">
                                            </div>

                                            <div>

                                                <div class="product-name">
                                                    {{ $item->product->name }}
                                                </div>

                                                @if ($item->product?->category)
                                                    <div class="product-category">
                                                        {{ $item->product->category->name }}
                                                    </div>
                                                @endif

                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ $item->quantity }}
                                    </td>
                                    @php
                                        $subtotal = $item->price * $item->quantity;
                                    @endphp
                                    <td class="fw-bold">
                                        Rp {{ number_format($subtotal, 0, ',', '.') }}
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="d-flex flex-column gap-4">

            {{-- STATUS --}}
            <div class="card-section">

                <div class="card-header-custom">
                    <div>
                        <h3 class="card-title-custom">
                            Status Pesanan
                        </h3>

                        <p class="card-subtitle-custom">
                            Ubah status order customer.
                        </p>
                    </div>
                </div>

                <div class="card-body-custom">
                    <div class="mb-4">
                        @if ($order->status === 'pending')
                            <span class="badge-status badge-pending">
                                Pending
                            </span>
                        @elseif ($order->status === 'diproses')
                            <span class="badge-status badge-process">
                                Diproses
                            </span>
                        @elseif ($order->status === 'dikirim')
                            <span class="badge-status badge-shipping">
                                Dikirim
                            </span>
                        @elseif ($order->status === 'selesai')
                            <span class="badge-status badge-paid">
                                Selesai
                            </span>
                        @endif

                    </div>

                    <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label-custom">
                                Ubah Status
                            </label>

                            <select name="status" class="form-select form-select-custom">

                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>
                                    Diproses
                                </option>

                                <option value="dikirim" {{ $order->status == 'dikirim' ? 'selected' : '' }}>
                                    Dikirim
                                </option>

                                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>
                                    Selesai
                                </option>

                            </select>

                        </div>

                        <button type="submit" class="btn-save">
                            <i class="bi bi-check2-circle me-1"></i>
                            Simpan Status
                        </button>

                    </form>

                </div>

            </div>

            {{-- PAYMENT --}}
            <div class="card-section">

                <div class="card-header-custom">
                    <div>
                        <h3 class="card-title-custom">
                            Ringkasan Pembayaran
                        </h3>

                        <p class="card-subtitle-custom">
                            Informasi total pembayaran order.
                        </p>
                    </div>
                </div>

                <div class="card-body-custom">

                    <div class="summary-box">

                        <div class="summary-row">
                            <div class="summary-label">
                                Metode Pembayaran
                            </div>

                            <div class="summary-value">
                                Cash On Delivery
                            </div>
                        </div>

                        <div class="summary-row">
                            <div class="summary-label">
                                Total Item
                            </div>

                            <div class="summary-value">
                                {{ $order->items->sum('quantity') }} Produk
                            </div>
                        </div>

                        <div class="summary-row summary-total">
                            <div class="summary-label">
                                Grand Total
                            </div>

                            <div class="summary-value">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
