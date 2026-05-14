<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin — @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary: #7C3AED;
            --primary-light: #8B5CF6;
            --primary-soft: #F5F3FF;
            --surface: #FFFFFF;
            --surface-2: #FCFBFF;
            --border: #ECE8F6;
            --text: #1E1B39;
            --text-muted: #9CA3AF;
            --text-subtle: #B6B0C7;
            --shadow:
                0 10px 30px rgba(124, 58, 237, .06);
            --shadow-soft:
                0 4px 18px rgba(124, 58, 237, .05);
        }

        * {
            box-sizing: border-box;
        }

        body {
            background:
                radial-gradient(circle at top left,
                    rgba(124, 58, 237, .06),
                    transparent 28%),

                radial-gradient(circle at bottom right,
                    rgba(139, 92, 246, .05),
                    transparent 30%),

                #FAF9FF;

            color: var(--text);
            font-family: 'DM Sans', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 228px;
            height: 100vh;
            background: rgba(255, 255, 255, .94);
            backdrop-filter: blur(12px);
            border-right: 1px solid var(--border);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            z-index: 100;
            box-shadow: var(--shadow-soft);
            overflow: hidden;
        }

        .sidebar-brand {
            padding: 16px 18px;
            border-bottom: 1px solid var(--border);
            font-weight: 700;
            font-size: .93rem;
            color: var(--text);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: -.02em;
        }

        .sidebar-brand:hover {
            color: var(--primary);
        }

        .sidebar-brand i {
            font-size: .95rem;
            color: var(--primary);
        }

        .sidebar-nav {
            padding: 10px 0;
            flex: 1;
        }

        .sidebar-label {
            font-size: .62rem;
            font-weight: 700;
            letter-spacing: .08em;
            color: var(--text-subtle);
            text-transform: uppercase;
            padding: 10px 18px 5px;
            margin-bottom: 2px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 2px 10px;
            padding: 9px 12px;
            font-size: .82rem;
            font-weight: 500;
            color: #6F6A86;
            text-decoration: none;
            border-radius: 10px;
            transition: .18s ease;
            position: relative;
            min-height: 40px;
        }

        .sidebar-link:hover {
            background: var(--primary-soft);
            color: var(--primary);
        }

        .sidebar-link.active {
            background:
                linear-gradient(90deg,
                    rgba(124, 58, 237, .12),
                    rgba(124, 58, 237, .05));

            color: var(--primary);
            font-weight: 700;
        }

        .sidebar-link.active::before {
            content: '';
            position: absolute;
            left: -10px;
            top: 7px;
            bottom: 7px;
            width: 3px;
            background: var(--primary);
            border-radius: 999px;
        }

        .sidebar-link .bi {
            width: 16px;
            font-size: .95rem;
        }

        .sidebar-badge {
            margin-left: auto;
            font-size: .58rem;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary);
        }

        /* FOOTER */
        .sidebar-footer {
            padding: 14px 16px;

            border-top: 1px solid var(--border);

            background: rgba(255, 255, 255, .75);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 10px;
        }

        .sidebar-avatar {
            width: 34px;
            height: 34px;

            border-radius: 50%;

            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            color: #fff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: .72rem;
            font-weight: 700;

            flex-shrink: 0;

            box-shadow:
                0 6px 14px rgba(124, 58, 237, .18);
        }

        .sidebar-username {
            font-size: .82rem;
            font-weight: 700;

            color: var(--text);

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-role {
            font-size: .68rem;
            color: var(--text-muted);
        }


        /* MAIN */
        .main-wrapper {
            margin-left: 220px;
            min-height: 100vh;

            display: flex;
            flex-direction: column;
        }

        .topbar {
            height: 70px;

            background: rgba(255, 255, 255, .88);

            backdrop-filter: blur(12px);

            border-bottom: 1px solid var(--border);

            padding: 0 28px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            position: sticky;
            top: 0;

            z-index: 99;
        }

        .topbar-title {
            font-size: 1rem;
            font-weight: 700;

            color: var(--text);

            margin: 0;

            letter-spacing: -.02em;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .main-content {
            padding: 28px;
            flex: 1;
        }

        /* BUTTONS */
        .btn-logout {
            width: 100%;
            border: 1px solid var(--border);
            background: #fff;
            color: #6F6A86;
            border-radius: 12px;
            padding: .7rem .9rem;
            font-size: .84rem;
            font-weight: 600;
            transition: .18s ease;
        }

        .btn-logout:hover {
            border-color: rgba(124, 58, 237, .2);
            background: var(--primary-soft);
            color: var(--primary);
        }

        /* MOBILE */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(16, 10, 40, .35);
            backdrop-filter: blur(2px);
            z-index: 99;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform .25s ease;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .main-content {
                padding: 20px;
            }

            .topbar {
                padding: 0 18px;
            }
        }

        /* ── Pagination ── */
        .pagination {
            gap: .45rem;
        }

        .page-item .page-link {
            border: 1px solid #E9DDFD;
            background: #fff;
            color: #7C3AED;
            min-width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px !important;
            font-size: .84rem;
            font-weight: 600;
            transition: .18s ease;
            box-shadow: none;
        }

        .page-item .page-link:hover {
            background: #F5F3FF;
            border-color: #C4B5FD;
            color: #6D28D9;
            transform: translateY(-1px);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #7C3AED, #A855F7);
            border-color: transparent;
            color: #fff;

            box-shadow:
                0 8px 18px rgba(124, 58, 237, .22);
        }

        .page-item.disabled .page-link {
            background: #FAF7FF;
            border-color: #F1E8FF;
            color: #C4B5FD;
        }

        .page-link:focus {
            box-shadow: 0 0 0 4px rgba(124, 58, 237, .12);
        }

        .alert-purple {
            background:
                linear-gradient(135deg,
                    rgba(124, 58, 237, .10),
                    rgba(139, 92, 246, .08));

            border: 1px solid rgba(124, 58, 237, .14);
            color: #6D28D9;
            border-radius: 18px;
            padding: 15px 18px;
            font-size: .84rem;
            font-weight: 600;
            box-shadow:
                0 10px 24px rgba(124, 58, 237, .06);
        }

        .alert-purple .bi {
            font-size: 1rem;
            color: var(--primary);
        }

        .alert-purple .btn-close {
            box-shadow: none;
            opacity: .55;
        }

        .alert-purple .btn-close:hover {
            opacity: 1;
        }
    </style>
    @stack('styles')
</head>

<body>

    {{-- Sidebar --}}
    <aside class="sidebar" id="sidebar">

        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <i class="bi bi-book"></i> Buku Sehat Sejahtera
        </a>

        <nav class="sidebar-nav">

            <p class="sidebar-label">Utama</p>

            <a href="{{ route('admin.dashboard') }}"
                class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid"></i> Dashboard
            </a>

            <p class="sidebar-label">Katalog</p>

            <a href="{{ route('admin.categories.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="bi bi-tag"></i> Kategori
            </a>

            <a href="{{ route('admin.products.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i class="bi bi-book"></i> Produk
            </a>



            <p class="sidebar-label">Transaksi</p>

            <a href="{{ route('admin.orders.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <i class="bi bi-bag"></i> Pesanan
            </a>

            <p class="sidebar-label">Lainnya</p>

            <a href="{{ route('admin.messages.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                <i class="bi bi-envelope"></i> Pesan Masuk
                @if (isset($unreadMessageCount) && $unreadMessageCount > 0)
                    <span class="sidebar-badge bg-danger text-white">{{ $unreadMessageCount }}</span>
                @endif
            </a>


            <a href="{{ route('admin.customers.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Pengguna

            </a>

        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div style="overflow: hidden;">
                    <p class="sidebar-username" style="margin:0">{{ Auth::user()->name }}</p>
                    <p class="sidebar-role" style="margin:0">Administrator</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout w-100" style="font-size: 0.8rem;">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- Sidebar overlay (mobile) --}}
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    {{-- Main wrapper --}}
    <div class="main-wrapper">

        {{-- Topbar --}}
        <div class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-sm d-lg-none" onclick="openSidebar()" style="border: 1px solid #e8e5de;">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <h1 class="topbar-title">@yield('title', 'Dashboard')</h1>
            </div>
        </div>

        {{-- Flash messages --}}
        <div class="px-4 pt-3">
            @if (session('success'))
                <div class="alert alert-purple alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <span>
                            {{ session('success') }}
                        </span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>

        {{-- Page content --}}
        <main class="main-content">
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function openSidebar() {
            document.getElementById('sidebar').classList.add('show');
            document.getElementById('sidebarOverlay').classList.add('show');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('show');
            document.getElementById('sidebarOverlay').classList.remove('show');
        }
    </script>

    @stack('scripts')

</body>

</html>
