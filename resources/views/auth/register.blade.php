<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Sehat Sejahtera — @yield('title', 'Daftar')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM Sans:wght@400;500;600&family=DM+Sans:wght@300;400;500;600&display=swap"
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
            max-width: 460px;
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
            width: 64px;
            height: 64px;
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
            font-size: 1.7rem;
        }

        .brand-name {
            display: block;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -.02em;
        }

        /* CARD */
        .auth-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.4rem 2rem;
            box-shadow: var(--card-shadow);
        }

        .auth-card h2 {
            font-size: 1.35rem;
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

        .form-control.is-invalid {
            border-color: #DC2626;
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #B6B0C7;
            font-size: .95rem;
            pointer-events: none;
        }

        /* PASSWORD STRENGTH */
        .pwd-strength {
            display: flex;
            gap: 5px;
            margin-top: 8px;
        }

        .pwd-strength span {
            flex: 1;
            height: 4px;
            border-radius: 999px;
            background: #ECE8F6;
            transition: .25s ease;
        }

        .pwd-strength.weak span:nth-child(1) {
            background: #EF4444;
        }

        .pwd-strength.medium span:nth-child(1),
        .pwd-strength.medium span:nth-child(2) {
            background: #F59E0B;
        }

        .pwd-strength.strong span {
            background: var(--primary);
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
            opacity: .85;
            text-decoration: none;
        }

        /* TERMS */
        .terms-note {
            font-size: .74rem;
            color: #B6B0C7;
            text-align: center;
            margin-top: 1rem;
            line-height: 1.6;
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
            <h2>Buat akun baru</h2>
            <p class="subtitle">Gratis, cepat, dan langsung bisa belanja</p>

            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <i class="bi bi-exclamation-circle me-1"></i> {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/register">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-wrap">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="Nama kamu" required>
                        <i class="bi bi-person input-icon"></i>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-wrap">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" placeholder="email@contoh.com" required>
                        <i class="bi bi-envelope input-icon"></i>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-wrap">
                        <input type="password" name="password" id="passwordInput"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Min. 6 karakter"
                            required>
                        <i class="bi bi-lock input-icon"></i>
                    </div>
                    <div class="pwd-strength" id="pwdStrength">
                        <span></span><span></span><span></span>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <div class="input-wrap">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Ulangi password" required>
                        <i class="bi bi-shield-check input-icon"></i>
                    </div>
                </div>

                <button type="submit" class="btn-auth">
                    <i class="bi bi-person-check me-1"></i> Daftar Sekarang
                </button>
            </form>

            <p class="terms-note">Dengan mendaftar, kamu menyetujui syarat & ketentuan kami.</p>

            <div class="auth-footer">
                Sudah punya akun? <a href="/login">Masuk di sini</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const pwdInput = document.getElementById('passwordInput');
        const pwdStrength = document.getElementById('pwdStrength');

        pwdInput.addEventListener('input', () => {
            const val = pwdInput.value;
            pwdStrength.className = 'pwd-strength';
            if (val.length === 0) return;
            if (val.length < 6) pwdStrength.classList.add('weak');
            else if (val.length < 10) pwdStrength.classList.add('medium');
            else pwdStrength.classList.add('strong');
        });
    </script>
    @stack('scripts')

</body>

</html>
