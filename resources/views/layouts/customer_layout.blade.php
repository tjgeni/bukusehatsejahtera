<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Sehat Sejahtera — @yield('title', 'Toko Buku Lengkap')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #8B5CF6;
            --primary-light: #A78BFA;
            --primary-soft: #F5F3FF;

            --accent: #EC4899;

            --bg-main: #FCFAFF;
            --bg-white: #FFFFFF;

            --text-dark: #241B35;
            --text-muted: #8B84A1;
            --text-soft: #B5AEC9;

            --border-color: #EEE9FA;

            --shadow-soft:
                0 10px 30px rgba(139, 92, 246, .06);

            --font-body: 'DM Sans', sans-serif;
            --font-display: 'Lora', serif;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background:
                radial-gradient(circle at top left,
                    rgba(139, 92, 246, .07),
                    transparent 28%),

                radial-gradient(circle at bottom right,
                    rgba(236, 72, 153, .05),
                    transparent 28%),

                var(--bg-main);

            color: var(--text-dark);

            font-family: var(--font-body);
            font-size: .9rem;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(255, 255, 255, .88);

            backdrop-filter: blur(12px);

            border-bottom: 1px solid var(--border-color);

            padding: .9rem 0;

            box-shadow: var(--shadow-soft);
        }

        .navbar-brand {
            font-family: var(--font-body);
            font-weight: 700;
            font-size: 1rem;

            color: var(--text-dark) !important;

            letter-spacing: -.02em;

            display: flex;
            align-items: center;
            gap: .55rem;
        }

        .navbar-brand i {
            font-size: 1.1rem;
            color: var(--primary);
        }

        /* GRID */
        .navbar>.container {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
        }

        .navbar .nav-left {
            justify-self: start;
        }

        .navbar .nav-center {
            justify-self: center;
        }

        .navbar .nav-right {
            justify-self: end;
        }

        /* NAV LINK */
        .nav-link {
            position: relative;

            color: #6D6780 !important;

            font-size: .88rem;
            font-weight: 500;

            padding: .45rem .95rem !important;

            border-radius: 999px;

            transition: .18s ease;
        }

        .nav-link:hover {
            color: var(--primary) !important;
            background: var(--primary-soft);
        }

        .nav-link.active {
            color: var(--primary) !important;
            background: rgba(139, 92, 246, .10);

            font-weight: 700 !important;
        }

        /* CART */
        .cart-icon-wrap {
            position: relative;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: #fff;

            border: 1px solid var(--border-color);

            color: var(--text-dark);

            text-decoration: none;

            font-size: 1.05rem;

            transition: .18s ease;

            box-shadow: 0 4px 12px rgba(139, 92, 246, .05);
        }

        .cart-icon-wrap:hover {
            background: var(--primary-soft);
            color: var(--primary);

            border-color: rgba(139, 92, 246, .18);
        }

        .cart-badge {
            position: absolute;

            top: -5px;
            right: -5px;

            background:
                linear-gradient(135deg,
                    #EC4899,
                    #F472B6);

            color: #fff;

            font-size: .62rem;
            font-weight: 700;

            border-radius: 50%;

            width: 18px;
            height: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow:
                0 4px 10px rgba(236, 72, 153, .25);
        }

        /* DOT MENU */
        .nav-dots-btn {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            border: 1px solid var(--border-color);

            background: #fff;

            color: var(--text-dark);

            font-size: 1rem;

            cursor: pointer;

            transition: .18s ease;
        }

        .nav-dots-btn:hover {
            background: var(--primary-soft);
            color: var(--primary);
        }

        /* DROPDOWN */
        .dropdown-menu {
            border: 1px solid var(--border-color);

            border-radius: 16px;

            padding: .5rem;

            background: rgba(255, 255, 255, .96);

            backdrop-filter: blur(10px);

            box-shadow:
                0 14px 40px rgba(139, 92, 246, .10);

            font-size: .88rem;
        }

        .dropdown-item {
            border-radius: 10px;

            padding: .65rem .9rem;

            color: #6D6780;

            transition: .16s ease;
        }

        .dropdown-item:hover {
            background: var(--primary-soft);
            color: var(--primary);
        }

        /* ALERT */
        .alert {
            border: none;

            border-radius: 16px;

            font-size: .88rem;

            padding: .9rem 1rem;
        }

        .alert-success {
            background: #ECFDF5;
            color: #047857;
        }

        .alert-danger {
            background: #FEF2F2;
            color: #DC2626;
        }

        /* FOOTER */
        footer {
            background: rgba(255, 255, 255, .82);

            backdrop-filter: blur(10px);

            border-top: 1px solid var(--border-color);

            font-size: .82rem;

            color: var(--text-muted);

            margin-top: 4rem;
        }

        footer a {
            color: var(--text-muted) !important;
            transition: .18s ease;
            text-decoration: none;
        }

        footer a:hover {
            color: var(--primary) !important;
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

    {{-- Navbar --}}
    <nav class="navbar sticky-top">
        <div class="container">

            {{-- Left: Brand --}}
            <div class="nav-left">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="bi bi-book me-1"></i> Buku Sehat Sejahtera
                </a>
            </div>

            <div class="nav-center d-none d-lg-flex">
                <ul class="navbar-nav flex-row gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}"
                            href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active fw-semibold' : '' }}"
                            href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active fw-semibold' : '' }}"
                            href="{{ route('contact') }}">Kontak Kami</a>
                    </li>
                </ul>
            </div>

            {{-- Right: Icons / Auth --}}
            <div class="nav-right d-flex align-items-center gap-3">

                @auth
                    <a href="{{ route('cart.index') }}" class="position-relative">
                        <i class="bi bi-cart3 fs-5" style="color:#7C3AED;"></i>
                        @if (isset($cartCount) && $cartCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    {{-- Three-dot dropdown --}}
                    <div class="dropdown">
                        <button class="nav-dots-btn" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <span class="dropdown-item-text text-muted px-3 py-1" style="font-size:0.78rem;">
                                    {{ Auth::user()->name }}
                                </span>
                            </li>
                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.index') }}">
                                    <i class="bi bi-bag me-2"></i>Pesanan saya
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider my-1">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary"
                        style="font-size:0.82rem;">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-dark" style="font-size:0.82rem;">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-purple alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-1"></i>
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

    {{-- Main Content --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="py-4 mt-5">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <span><i class="bi bi-book me-1"></i> Buku Sehat Sejahtera &copy; {{ date('Y') }}</span>
            <div class="d-flex gap-3">
                <a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a>
                <a href="{{ route('about') }}" class="text-decoration-none text-muted">About</a>
                <a href="{{ route('contact') }}" class="text-decoration-none text-muted">Kontak</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>

</html>
