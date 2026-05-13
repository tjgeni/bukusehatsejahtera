<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Sehat Sejahtera — @yield('title', 'Masuk')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #7C3AED;
            --primary-light: #8B5CF6;
            --primary-soft: #F5F3FF;
            --border: #ECE8F6;
            --text: #1E1B39;
            --text-muted: #9CA3AF;
            --surface: #FFFFFF;

            --card-shadow:
                0 24px 60px rgba(124, 58, 237, 0.10),
                0 8px 24px rgba(124, 58, 237, 0.06);
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'DM Sans', sans-serif;

            background:
                radial-gradient(circle at top left,
                    rgba(124, 58, 237, .10),
                    transparent 30%),

                radial-gradient(circle at bottom right,
                    rgba(139, 92, 246, .08),
                    transparent 30%),

                #FAF9FF;

            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 430px;
            animation: fadeSlide .4s ease;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* BRAND */
        .brand-top {
            text-align: center;
            margin-bottom: 1.8rem;
        }

        .brand-icon {
            width: 62px;
            height: 62px;
            border-radius: 18px;

            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            display: inline-flex;
            align-items: center;
            justify-content: center;

            margin-bottom: .9rem;

            box-shadow:
                0 14px 30px rgba(124, 58, 237, .25);
        }

        .brand-icon i {
            color: #fff;
            font-size: 1.6rem;
        }

        .brand-name {
            display: block;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -.02em;
        }

        /* CARD */
        .auth-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.3rem 2rem;
            box-shadow: var(--card-shadow);
        }

        .auth-card h2 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: .3rem;
            letter-spacing: -.03em;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: .88rem;
            margin-bottom: 2rem;
        }

        /* FORM */
        .form-label {
            font-size: .76rem;
            font-weight: 700;
            color: #6B7280;
            margin-bottom: .45rem;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .input-wrap {
            position: relative;
        }

        .form-control {
            height: 50px;
            border-radius: 14px;
            border: 1px solid var(--border);
            background: #FCFBFF;

            padding-left: 1rem;
            padding-right: 2.7rem;

            font-size: .9rem;
            color: var(--text);

            transition: .18s ease;
        }

        .form-control::placeholder {
            color: #B6B0C7;
        }

        .form-control:focus {
            border-color: rgba(124, 58, 237, .35);
            background: #fff;

            box-shadow:
                0 0 0 4px rgba(124, 58, 237, .10);
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #B6B0C7;
            font-size: .95rem;
        }

        /* BUTTON */
        .btn-auth {
            width: 100%;
            height: 52px;

            border: none;
            border-radius: 14px;

            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            color: #fff;
            font-size: .92rem;
            font-weight: 700;

            transition: .18s ease;

            box-shadow:
                0 10px 24px rgba(124, 58, 237, .22);
        }

        .btn-auth:hover {
            transform: translateY(-1px);

            box-shadow:
                0 14px 30px rgba(124, 58, 237, .28);
        }

        .btn-auth:active {
            transform: scale(.99);
        }

        /* ALERT */
        .alert {
            border: none;
            border-radius: 14px;
            font-size: .84rem;
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
        .auth-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: .85rem;
            color: var(--text-muted);
        }

        .auth-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
        }

        .auth-footer a:hover {
            text-decoration: none;
            opacity: .85;
        }
    </style>
</head>

<body>

    <div class="auth-wrapper">
        <!-- Brand -->
        <div class="brand-top">
            <div class="brand-icon">
                <i class="bi bi-book-half"></i>
            </div>
            <span class="brand-name">Buku Sehat Sejahtera</span>
        </div>

        <!-- Card -->
        <div class="auth-card">
            <h2>Selamat datang</h2>
            <p class="subtitle">Masuk untuk melanjutkan belanja buku</p>

            @if (session('success'))
                <div class="alert alert-success mb-3">
                    <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <i class="bi bi-exclamation-circle me-1"></i> {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-wrap">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="email@contoh.com" required>
                        <i class="bi bi-envelope input-icon"></i>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label mb-0">Password</label>
                        {{-- <a href="#" style="font-size:0.78rem; color:var(--green-deep); text-decoration:none;">Lupa password?</a> --}}
                    </div>
                    <div class="input-wrap mt-1">
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        <i class="bi bi-lock input-icon"></i>
                    </div>
                </div>

                <button type="submit" class="btn-auth">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
                </button>
            </form>

            <div class="auth-footer">
                Belum punya akun? <a href="/register">Daftar sekarang</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>

</html>
