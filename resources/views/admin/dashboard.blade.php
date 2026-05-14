@extends('layouts.admin_layout')

@section('title', 'Dashboard Admin')

@section('content')

    @push('styles')
        <style>
            /* ── DASHBOARD HEADER ── */
            .dashboard-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
                margin-bottom: 1.8rem;
                flex-wrap: wrap;
            }

            .dashboard-title {
                margin: 0;
                font-size: 1.35rem;
                font-weight: 800;
                color: var(--text);
                letter-spacing: -.03em;
            }

            .dashboard-subtitle {
                margin: .35rem 0 0;
                color: var(--text-muted);
                font-size: .88rem;
            }

            .dashboard-date {
                background: #fff;
                border: 1px solid var(--border);
                border-radius: 14px;
                padding: .75rem 1rem;
                font-size: .82rem;
                font-weight: 600;
                color: var(--primary);
                box-shadow: var(--shadow-soft);
            }

            /* ── STAT CARDS ── */
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 1rem;
                margin-bottom: 2rem;
            }

            .stat-card {
                position: relative;
                overflow: hidden;

                background: rgba(255, 255, 255, .92);
                border: 1px solid var(--border);

                border-radius: 22px;

                padding: 1.25rem;

                transition: .2s ease;

                box-shadow: var(--shadow-soft);
            }

            .stat-card:hover {
                transform: translateY(-3px);
                border-color: rgba(124, 58, 237, .18);

                box-shadow:
                    0 14px 34px rgba(124, 58, 237, .10);
            }

            .stat-card::before {
                content: '';

                position: absolute;
                top: -40px;
                right: -40px;

                width: 120px;
                height: 120px;

                background:
                    radial-gradient(circle,
                        rgba(124, 58, 237, .12),
                        transparent 70%);
            }

            .stat-top {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 1rem;
            }

            .stat-label {
                font-size: .76rem;
                font-weight: 700;
                letter-spacing: .08em;
                text-transform: uppercase;
                color: var(--text-subtle);
                margin-bottom: .7rem;
            }

            .stat-value {
                font-size: 1.8rem;
                font-weight: 800;
                line-height: 1;
                color: var(--text);
                margin-bottom: .4rem;
                letter-spacing: -.04em;
            }

            .stat-desc {
                font-size: .8rem;
                color: var(--text-muted);
            }

            .stat-icon {
                width: 52px;
                height: 52px;

                border-radius: 16px;

                display: flex;
                align-items: center;
                justify-content: center;

                flex-shrink: 0;

                font-size: 1.15rem;

                color: #fff;

                box-shadow:
                    0 10px 22px rgba(124, 58, 237, .18);
            }

            .bg-purple {
                background: linear-gradient(135deg, #7C3AED, #A855F7);
            }

            .bg-pink {
                background: linear-gradient(135deg, #D946EF, #EC4899);
            }

            .bg-blue {
                background: linear-gradient(135deg, #6366F1, #3B82F6);
            }

            .bg-orange {
                background: linear-gradient(135deg, #F59E0B, #FB923C);
            }

            .bg-green {
                background: linear-gradient(135deg, #10B981, #34D399);
            }

            .bg-red {
                background: linear-gradient(135deg, #EF4444, #F87171);
            }

            /* ── TABLE CARD ── */
            .table-card {
                background: rgba(255, 255, 255, .92);
                border: 1px solid var(--border);
                border-radius: 24px;
                overflow: hidden;
                box-shadow: var(--shadow-soft);
            }

            .table-header {
                padding: 1.2rem 1.4rem;
                border-bottom: 1px solid var(--border);

                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
                flex-wrap: wrap;
            }

            .table-title {
                margin: 0;
                font-size: 1rem;
                font-weight: 800;
                color: var(--text);
                letter-spacing: -.02em;
            }

            .table-subtitle {
                margin-top: .2rem;
                font-size: .82rem;
                color: var(--text-muted);
            }

            .table-responsive {
                overflow-x: auto;
            }

            .dashboard-table {
                width: 100%;
                border-collapse: collapse;
            }

            .dashboard-table thead {
                background: #FAF7FF;
            }

            .dashboard-table thead th {
                padding: 1rem 1.2rem;

                font-size: .76rem;
                font-weight: 700;
                letter-spacing: .05em;
                text-transform: uppercase;

                color: var(--text-subtle);

                border-bottom: 1px solid var(--border);
            }

            .dashboard-table tbody td {
                padding: 1rem 1.2rem;
                border-bottom: 1px solid #F5F3FF;

                font-size: .86rem;
                color: var(--text);

                vertical-align: middle;
            }

            .dashboard-table tbody tr:hover {
                background: rgba(124, 58, 237, .03);
            }

            .order-id {
                font-weight: 700;
                color: var(--primary);
            }

            .customer-box {
                display: flex;
                align-items: center;
                gap: .8rem;
            }

            .customer-avatar {
                width: 38px;
                height: 38px;

                border-radius: 50%;

                background:
                    linear-gradient(135deg,
                        rgba(124, 58, 237, .9),
                        rgba(168, 85, 247, .9));

                color: #fff;

                display: flex;
                align-items: center;
                justify-content: center;

                font-size: .82rem;
                font-weight: 700;

                flex-shrink: 0;
            }

            .customer-name {
                font-weight: 700;
                color: var(--text);
                margin-bottom: .15rem;
            }

            .customer-email {
                font-size: .77rem;
                color: var(--text-muted);
            }

            .status-badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;

                padding: .45rem .8rem;

                border-radius: 999px;

                font-size: .72rem;
                font-weight: 700;
                letter-spacing: .02em;
            }

            .status-pending {
                background: rgba(245, 158, 11, .12);
                color: #D97706;
            }

            .status-shipping {
                background: #E0F2FE;
                color: #0369A1;
            }

            .status-success {
                background: rgba(16, 185, 129, .12);
                color: #059669;
            }

            .status-process {
                background: rgba(59, 130, 246, .12);
                color: #2563EB;
            }

            .empty-orders {
                padding: 4rem 2rem;
                text-align: center;
            }

            .empty-orders i {
                font-size: 2.5rem;
                color: #D8B4FE;
                margin-bottom: 1rem;
            }

            .empty-orders h5 {
                font-size: 1rem;
                font-weight: 700;
                color: var(--text);
            }

            .empty-orders p {
                color: var(--text-muted);
                margin: 0;
                font-size: .88rem;
            }

            @media(max-width:768px) {
                .dashboard-header {
                    align-items: flex-start;
                    flex-direction: column;
                }

                .dashboard-title {
                    font-size: 1.15rem;
                }

                .stat-value {
                    font-size: 1.45rem;
                }

                .dashboard-table thead th,
                .dashboard-table tbody td {
                    padding: .9rem;
                }
            }
        </style>
    @endpush

    {{-- HEADER --}}
    <div class="dashboard-header">
        <div>
            <h1 class="dashboard-title">Dashboard Admin</h1>
            <p class="dashboard-subtitle">
                Ringkasan statistik toko Buku Sehat Sejahtera
            </p>
        </div>

        <div class="dashboard-date">
            <i class="bi bi-calendar3 me-1"></i>
            {{ now()->format('d M Y') }}
        </div>
    </div>

    {{-- STATISTICS --}}
    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label">Total Produk</div>
                    <div class="stat-value">{{ $total_products }}</div>
                    <div class="stat-desc">Produk tersedia di toko</div>
                </div>

                <div class="stat-icon bg-purple">
                    <i class="bi bi-book"></i>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label">Total Kategori</div>
                    <div class="stat-value">{{ $total_categories }}</div>
                    <div class="stat-desc">Kategori buku aktif</div>
                </div>

                <div class="stat-icon bg-pink">
                    <i class="bi bi-grid"></i>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label">Total Pesanan</div>
                    <div class="stat-value">{{ $total_order }}</div>
                    <div class="stat-desc">Pesanan seluruh customer</div>
                </div>

                <div class="stat-icon bg-blue">
                    <i class="bi bi-bag-check"></i>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label">Total Customer</div>
                    <div class="stat-value">{{ $total_customers }}</div>
                    <div class="stat-desc">User terdaftar</div>
                </div>

                <div class="stat-icon bg-orange">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label">Pesanan Pending</div>
                    <div class="stat-value">{{ $total_pending_orders }}</div>
                    <div class="stat-desc">Menunggu diproses</div>
                </div>

                <div class="stat-icon bg-red">
                    <i class="bi bi-hourglass-split"></i>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-top">
                <div>
                    <div class="stat-label">Pesanan Selesai</div>
                    <div class="stat-value">{{ $total_done_orders }}</div>
                    <div class="stat-desc">Pesanan berhasil</div>
                </div>

                <div class="stat-icon bg-green">
                    <i class="bi bi-patch-check"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- ORDER TABLE --}}
    <div class="table-card">

        <div class="table-header">
            <div>
                <h5 class="table-title">Pesanan Terbaru</h5>
                <div class="table-subtitle">
                    Daftar transaksi customer terbaru
                </div>
            </div>
        </div>

        @if ($latest_total_orders->count())
            <div class="table-responsive">
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($latest_total_orders as $order)
                            <tr>
                                <td>
                                    <span class="order-id">
                                        {{ $order->order_number }}
                                    </span>
                                </td>

                                <td>
                                    <div class="customer-box">

                                        <div class="customer-avatar">
                                            {{ strtoupper(substr($order->user->name ?? 'U', 0, 1)) }}
                                        </div>

                                        <div>
                                            <div class="customer-name">
                                                {{ $order->user->name ?? '-' }}
                                            </div>

                                            <div class="customer-email">
                                                {{ $order->user->email ?? '-' }}
                                            </div>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <strong>
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </strong>
                                </td>

                                <td>
                                    @if ($order->status == 'pending')
                                        <span class="status-badge status-pending">
                                            Pending
                                        </span>
                                    @elseif($order->status == 'diproses')
                                        <span class="status-badge status-process">
                                            Diproses
                                        </span>
                                    @elseif($order->status == 'dikirim')
                                        <span class="status-badge status-shipping">
                                            Dikirim
                                        </span>
                                    @else
                                        <span class="status-badge status-success">
                                            Selesai
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $order->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-orders">
                <i class="bi bi-receipt"></i>
                <h5>Belum ada pesanan</h5>
                <p>Pesanan customer akan muncul di sini.</p>
            </div>

        @endif

    </div>

@endsection
