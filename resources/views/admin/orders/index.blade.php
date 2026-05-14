@extends('layouts.admin_layout')

@section('title', 'Daftar Pesanan')

@push('styles')
    <style>
        .page-card {
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(10px);

            border: 1px solid var(--border);
            border-radius: 24px;

            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .page-card-header {
            padding: 22px 24px;

            border-bottom: 1px solid var(--border);

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
        }

        .page-card-title {
            margin: 0;

            font-size: 1rem;
            font-weight: 700;

            color: var(--text);

            letter-spacing: -.02em;
        }

        .page-card-subtitle {
            margin: 4px 0 0;

            font-size: .82rem;
            color: var(--text-muted);
        }

        .filter-box {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-input {
            min-width: 260px;

            border: 1px solid var(--border);
            border-radius: 14px;

            padding: .72rem .95rem;

            font-size: .84rem;

            background: #fff;

            transition: .18s ease;
        }

        .search-input:focus {
            outline: none;

            border-color: rgba(124, 58, 237, .4);

            box-shadow: 0 0 0 4px rgba(124, 58, 237, .08);
        }

        .table-wrap {
            overflow-x: auto;
        }

        .custom-table {
            margin: 0;
            min-width: 980px;
        }

        .custom-table thead th {
            font-size: .72rem;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: .05em;

            color: var(--text-subtle);

            background: #FCFBFF;

            border-bottom: 1px solid var(--border);

            padding: 16px 18px;

            white-space: nowrap;
        }

        .custom-table tbody td {
            padding: 18px;

            border-color: #F2ECFB;

            vertical-align: middle;

            font-size: .84rem;
            color: #4B5563;
        }

        .custom-table tbody tr {
            transition: .18s ease;
        }

        .custom-table tbody tr:hover {
            background: rgba(124, 58, 237, .03);
        }

        .order-id {
            font-weight: 700;
            color: var(--text);
        }

        .customer-name {
            font-weight: 700;
            color: var(--text);
            margin-bottom: 2px;
        }

        .customer-email {
            font-size: .75rem;
            color: var(--text-muted);
        }

        .order-total {
            font-weight: 700;
            color: var(--primary);
        }

        .badge-status {
            padding: .48rem .78rem;

            border-radius: 999px;

            font-size: .72rem;
            font-weight: 700;

            letter-spacing: .01em;
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

        .badge-cancel {
            background: #FEE2E2;
            color: #B91C1C;
        }

        .btn-action {
            width: 36px;
            height: 36px;

            border-radius: 12px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border: 1px solid var(--border);

            background: #fff;

            color: #6B7280;

            transition: .18s ease;

            text-decoration: none;
        }

        .btn-action:hover {
            background: var(--primary-soft);
            border-color: rgba(124, 58, 237, .18);
            color: var(--primary);

            transform: translateY(-1px);
        }

        .empty-state {
            padding: 70px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 74px;
            height: 74px;

            margin: 0 auto 18px;

            border-radius: 24px;

            background: var(--primary-soft);

            color: var(--primary);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 1.7rem;
        }

        .empty-title {
            font-size: 1rem;
            font-weight: 700;

            color: var(--text);

            margin-bottom: 6px;
        }

        .empty-subtitle {
            font-size: .84rem;
            color: var(--text-muted);
        }

        @media (max-width: 768px) {
            .page-card-header {
                padding: 18px;
            }

            .search-input {
                width: 100%;
                min-width: 100%;
            }
        }

        .filter-form {
            display: flex;
            align-items: center;
            gap: 12px;

            flex-wrap: wrap;
        }

        .filter-search {
            position: relative;
        }

        .filter-search i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: .85rem;
            color: #A1A1AA;
        }

        .filter-search input {
            width: 280px;
            min-height: 46px;
            padding: 0 16px 0 40px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fff;
            font-size: .84rem;
            color: var(--text);
            transition: .18s ease;
        }

        .filter-search input:focus {
            outline: none;
            border-color: rgba(124, 58, 237, .35);
            box-shadow:
                0 0 0 4px rgba(124, 58, 237, .08);
        }

        .filter-select {
            min-width: 180px;
            min-height: 46px;
            padding: 0 14px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fff;
            font-size: .84rem;
            color: var(--text);
            transition: .18s ease;
            cursor: pointer;
        }

        .filter-select:focus {
            outline: none;

            border-color: rgba(124, 58, 237, .35);

            box-shadow:
                0 0 0 4px rgba(124, 58, 237, .08);
        }

        .btn-filter {
            min-height: 46px;

            padding: 0 18px;

            border: none;
            border-radius: 14px;

            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            color: #fff;

            font-size: .83rem;
            font-weight: 700;

            transition: .18s ease;

            box-shadow:
                0 10px 20px rgba(124, 58, 237, .18);
        }

        .btn-filter:hover {
            transform: translateY(-1px);

            opacity: .95;
        }

        .btn-reset {
            width: 46px;
            height: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: #fff;
            color: #6B7280 text-decoration: none;
            transition: .18s ease;
        }

        .btn-reset:hover {
            background: var(--primary-soft);
            border-color: rgba(124, 58, 237, .18);
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .filter-form {
                width: 100%;
            }

            .filter-search {
                width: 100%;
            }

            .filter-search input {
                width: 100%;
            }

            .filter-select {
                width: 100%;
            }

            .btn-filter {
                flex: 1;
            }
        }
    </style>
@endpush

@section('content')

    <div class="page-card">
        <div class="page-card-header">
            <div>
                <h2 class="page-card-title">
                    List Order Customer
                </h2>
                <p class="page-card-subtitle">
                    Kelola seluruh pesanan customer secara realtime.
                </p>
            </div>

            <form method="GET" action="{{ route('admin.orders.index') }}" class="filter-form">

                {{-- SEARCH --}}
                <div class="filter-search">

                    <i class="bi bi-search"></i>

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari order / nama customer">

                </div>

                {{-- STATUS --}}
                <select name="status" class="filter-select">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>
                    <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>
                        Diproses
                    </option>
                    <option value="dikirim" {{ request('status') == 'dikirim' ? 'selected' : '' }}>
                        Dikirim
                    </option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>
                </select>

                <button type="submit" class="btn-filter">
                    <i class="bi bi-funnel me-1"></i>
                    Filter
                </button>

                <a href="{{ route('admin.orders.index') }}" class="btn-reset">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>

            </form>
        </div>

        {{-- Table --}}
        @if ($orders->count() > 0)
            <div class="table-wrap">
                <table class="table custom-table align-middle">
                    <thead>
                        <tr>
                            <th>No Order</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th width="90">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>

                                <td>
                                    <div class="order-id">
                                        {{ $order->order_number }}
                                    </div>
                                </td>

                                <td>
                                    <div class="customer-name">
                                        {{ $order->user->name }}
                                    </div>

                                    <div class="customer-email">
                                        {{ $order->user->email }}
                                    </div>
                                </td>

                                {{-- DATE --}}
                                <td>
                                    {{ $order->created_at->format('d M Y') }}

                                    <div class="customer-email">
                                        {{ $order->created_at->timezone('Asia/Jakarta')->format('H:i') }} WIB
                                    </div>
                                </td>

                                {{-- TOTAL --}}
                                <td>
                                    <div class="order-total">
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </div>
                                </td>

                                {{-- STATUS --}}
                                <td>

                                    @if ($order->status === 'pending')
                                        <span class="badge-status badge-pending">
                                            Pending
                                        </span>
                                    @elseif ($order->status === 'diproses')
                                        <span class="badge-status badge-paid">
                                            Diproses
                                        </span>
                                    @elseif ($order->status === 'dikirim')
                                        <span class="badge-status badge-process">
                                            Dikirim
                                        </span>
                                    @elseif ($order->status === 'selesai')
                                        <span class="badge-status badge-paid">
                                            Selesai
                                        </span>
                                    @endif

                                </td>
                                <td>
                                    Cash On Delivery
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('admin.orders.detail', $order->id) }}" class="btn-action"
                                            title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="p-4">
                {{ $orders->links() }}
            </div>
        @else
            {{-- Empty State --}}
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="bi bi-bag"></i>
                </div>
                <div class="empty-title">
                    Belum ada pesanan
                </div>
                <div class="empty-subtitle">
                    Pesanan customer akan muncul di halaman ini.
                </div>
            </div>
        @endif
    </div>
@endsection
