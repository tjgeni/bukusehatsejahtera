@extends('layouts.admin_layout')

@section('title', 'Daftar Customer')

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
            gap: 16px;
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

        /* FILTER */
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
            font-size: .84rem;
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
            transition: .18s ease;
        }

        .filter-search input:focus {
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

        /* TABLE */
        .table-wrap {
            overflow-x: auto;
        }

        .custom-table {
            margin: 0;
            min-width: 980px;
        }

        .custom-table thead th {
            background: #FCFBFF;
            border-bottom: 1px solid var(--border);
            padding: 16px 18px;
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: var(--text-subtle);
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

        /* CUSTOMER */
        .customer-box {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .customer-avatar {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .95rem;
            font-weight: 700;
            flex-shrink: 0;
            box-shadow:
                0 10px 20px rgba(124, 58, 237, .16);
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

        .customer-phone {
            font-weight: 600;
            color: var(--text);
        }

        .customer-orders {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 42px;
            height: 34px;
            padding: 0 12px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary);
            font-size: .76rem;
            font-weight: 700;
        }

        /* EMPTY */
        .empty-state {
            padding: 70px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 76px;
            height: 76px;
            margin: 0 auto 18px;
            border-radius: 24px;
            background: var(--primary-soft);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
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

            .filter-search {
                width: 100%;
            }

            .filter-search input {
                width: 100%;
            }

            .btn-filter {
                width: 100%;
            }
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
    </style>
@endpush

@section('content')

    <div class="page-card">

        {{-- HEADER --}}
        <div class="page-card-header">

            <div>
                <h2 class="page-card-title">
                    List Customer
                </h2>
                <p class="page-card-subtitle">
                    Daftar seluruh customer yang terdaftar.
                </p>
            </div>

            {{-- FILTER --}}
            <form method="GET" action="{{ route('admin.customers.index') }}" class="filter-form">
                <div class="filter-search">
                    <i class="bi bi-search"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari customer...">
                </div>

                <button type="submit" class="btn-filter">
                    <i class="bi bi-funnel me-1"></i>
                    Cari
                </button>
                <a href="{{ route('admin.customers.index') }}" class="btn-reset">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
            </form>

        </div>

        {{-- TABLE --}}
        @if ($customers->count() > 0)

            <div class="table-wrap">

                <table class="table custom-table align-middle">

                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Total Order</th>
                            <th>Total Belanja</th>
                            <th>Bergabung</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <div class="customer-box">
                                        <div class="customer-avatar">
                                            {{ strtoupper(substr($customer->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="customer-name">
                                                {{ $customer->name }}
                                            </div>
                                            <div class="customer-email">
                                                Customer
                                            </div>

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    {{ $customer->email }}
                                </td>

                                <td>
                                    <div class="customer-phone">
                                        {{ $customer->phone ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    <span class="customer-orders">
                                        {{ $customer->orders_count }} pesanan
                                    </span>
                                </td>

                                <td>
                                    <span class="customer-orders-price">
                                        Rp {{ number_format($customer->orders_sum_total_price, 0, ',', '.') }}
                                    </span>
                                </td>

                                <td>
                                    {{ $customer->created_at->format('d M Y') }}

                                    <div class="customer-email">
                                        {{ $customer->created_at->diffForHumans() }}
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            <div class="p-4">
                {{ $customers->links() }}
            </div>
        @else
            {{-- EMPTY --}}
            <div class="empty-state">

                <div class="empty-icon">
                    <i class="bi bi-people"></i>
                </div>

                <div class="empty-title">
                    Belum ada customer
                </div>

                <div class="empty-subtitle">
                    Customer yang terdaftar akan tampil di halaman ini.
                </div>

            </div>

        @endif

    </div>

@endsection
