@extends('layouts.customer_layout')

@section('title', 'Contact')

@section('content')

    <style>
        .contact-wrapper {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 1.5rem;

            margin-top: 1rem;
        }

        /* HERO / INFO */
        .contact-hero {
            position: relative;

            overflow: hidden;

            background:
                linear-gradient(135deg,
                    rgba(139, 92, 246, .12),
                    rgba(236, 72, 153, .08));

            border: 1px solid var(--border-color);

            border-radius: 28px;

            padding: 2.2rem;

            box-shadow: var(--shadow-soft);
        }

        .contact-hero::before {
            content: '';

            position: absolute;

            top: -90px;
            right: -90px;

            width: 240px;
            height: 240px;

            border-radius: 50%;

            background:
                radial-gradient(circle,
                    rgba(139, 92, 246, .16),
                    transparent 70%);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;

            padding: .45rem .9rem;

            border-radius: 999px;

            background: rgba(255, 255, 255, .75);

            border: 1px solid rgba(139, 92, 246, .12);

            color: var(--primary);

            font-size: .78rem;
            font-weight: 700;

            backdrop-filter: blur(10px);

            margin-bottom: 1.1rem;
        }

        .hero-title {
            font-size: 2rem;
            font-weight: 700;

            line-height: 1.2;

            color: var(--text-dark);

            letter-spacing: -.03em;

            margin-bottom: .9rem;

            max-width: 520px;
        }

        .hero-desc {
            font-size: .92rem;

            line-height: 1.9;

            color: var(--text-muted);

            margin-bottom: 1.8rem;

            max-width: 520px;
        }

        .contact-feature {
            display: flex;
            align-items: flex-start;
            gap: .9rem;

            margin-bottom: 1.1rem;
        }

        .contact-feature-icon {
            width: 44px;
            height: 44px;

            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            color: #fff;

            font-size: 1rem;

            flex-shrink: 0;

            box-shadow:
                0 10px 20px rgba(139, 92, 246, .18);
        }

        .contact-feature h6 {
            font-size: .9rem;
            font-weight: 700;

            margin-bottom: .25rem;

            color: var(--text-dark);
        }

        .contact-feature p {
            margin: 0;

            font-size: .82rem;

            color: var(--text-muted);

            line-height: 1.7;
        }

        /* FORM CARD */
        .contact-card {
            background: rgba(255, 255, 255, .92);

            border: 1px solid var(--border-color);

            border-radius: 28px;

            padding: 2rem;

            box-shadow:
                0 10px 30px rgba(139, 92, 246, .05);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 700;

            color: var(--text-dark);

            margin-bottom: .35rem;
        }

        .card-subtitle {
            font-size: .88rem;

            color: var(--text-muted);

            margin-bottom: 1.8rem;
        }

        /* ALERT */
        .alert-danger-ui {
            background: #FEF2F2;

            border: 1px solid #FECACA;

            color: #DC2626;

            border-radius: 18px;

            padding: 1rem 1.1rem;

            margin-bottom: 1.5rem;

            font-size: .85rem;
        }

        .alert-danger-ui ul {
            margin: .5rem 0 0 1rem;
            padding: 0;
        }

        /* FORM */
        .form-label-custom {
            font-size: .76rem;
            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: .04em;

            color: var(--text-muted);

            margin-bottom: .55rem;

            display: block;
        }

        .req {
            color: #EC4899;
        }

        .form-control-custom {
            width: 100%;

            border: 1px solid var(--border-color);

            background: #fff;

            border-radius: 16px;

            padding: .9rem 1rem;

            font-size: .9rem;

            color: var(--text-dark);

            transition: .18s ease;

            outline: none;
        }

        .form-control-custom:focus {
            border-color: rgba(139, 92, 246, .35);

            box-shadow:
                0 0 0 4px rgba(139, 92, 246, .08);
        }

        textarea.form-control-custom {
            resize: none;
        }

        .form-control-custom.is-invalid {
            border-color: #F87171;
        }

        .invalid-msg {
            margin-top: .45rem;

            font-size: .78rem;

            color: #DC2626;
        }

        .form-hint {
            margin-top: .45rem;

            font-size: .76rem;

            color: var(--text-muted);
        }

        /* ACTIONS */
        .form-actions {
            display: flex;
            align-items: center;

            gap: .8rem;

            margin-top: 1.8rem;
        }

        .btn-purple {
            border: none;

            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            color: #fff;

            border-radius: 16px;

            padding: .9rem 1.25rem;

            font-size: .88rem;
            font-weight: 700;

            display: inline-flex;
            align-items: center;
            gap: .55rem;

            transition: .18s ease;

            box-shadow:
                0 12px 24px rgba(139, 92, 246, .22);
        }

        .btn-purple:hover {
            transform: translateY(-2px);

            box-shadow:
                0 16px 30px rgba(139, 92, 246, .28);

            color: #fff;
        }

        .btn-ghost {
            border: 1px solid var(--border-color);

            background: #fff;

            color: var(--text-muted);

            border-radius: 16px;

            padding: .9rem 1.1rem;

            font-size: .88rem;
            font-weight: 600;

            text-decoration: none;

            transition: .18s ease;
        }

        .btn-ghost:hover {
            background: var(--primary-soft);

            border-color: rgba(139, 92, 246, .12);

            color: var(--primary);
        }

        @media (max-width: 991px) {
            .contact-wrapper {
                grid-template-columns: 1fr;
            }

            .contact-hero,
            .contact-card {
                padding: 1.5rem;
            }

            .hero-title {
                font-size: 1.65rem;
            }

            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-purple,
            .btn-ghost {
                justify-content: center;
            }
        }
    </style>

    <div class="container py-4">

        <div class="contact-wrapper">

            {{-- LEFT --}}
            <div class="contact-hero">

                <div class="hero-badge">
                    <i class="bi bi-chat-heart"></i>
                    Hubungi Kami
                </div>

                <h1 class="hero-title">
                    Kami siap membantu pengalaman membaca kamu jadi lebih nyaman.
                </h1>

                <p class="hero-desc">
                    Punya pertanyaan tentang pesanan, buku, atau ingin memberikan saran?
                    Tim Buku Sehat Sejahtera akan dengan senang hati mendengarkan pesanmu.
                </p>

                <div class="contact-feature">
                    <div class="contact-feature-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>

                    <div>
                        <h6>Respon Cepat</h6>
                        <p>
                            Pesan akan diproses secepat mungkin oleh tim kami.
                        </p>
                    </div>
                </div>

                <div class="contact-feature">
                    <div class="contact-feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <div>
                        <h6>Aman & Privat</h6>
                        <p>
                            Informasi dan pesan kamu akan dijaga dengan aman.
                        </p>
                    </div>
                </div>

                <div class="contact-feature mb-0">
                    <div class="contact-feature-icon">
                        <i class="bi bi-stars"></i>
                    </div>

                    <div>
                        <h6>Selalu Berkembang</h6>
                        <p>
                            Masukan dari pembaca membantu kami menjadi lebih baik setiap hari.
                        </p>
                    </div>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="contact-card">

                <h2 class="card-title">
                    Kirim Pesan
                </h2>

                <p class="card-subtitle">
                    Isi formulir di bawah dan kami akan segera menghubungi kamu kembali.
                </p>

                @if ($errors->any())
                    <div class="alert-danger-ui">
                        <i class="bi bi-exclamation-circle me-2"></i>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/contact">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label-custom">
                            Nama
                        </label>

                        <input type="text" class="form-control-custom" value="{{ Auth::user()->name }}" disabled>

                        <div class="form-hint">
                            Pesan dikirim menggunakan akun kamu.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label-custom">
                            Subjek <span class="req">*</span>
                        </label>

                        <input type="text" name="subject"
                            class="form-control-custom @error('subject') is-invalid @enderror" value="{{ old('subject') }}"
                            placeholder="Contoh: Pertanyaan tentang pesanan buku">

                        @error('subject')
                            <div class="invalid-msg">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label-custom">
                            Pesan <span class="req">*</span>
                        </label>

                        <textarea name="body" rows="6" class="form-control-custom @error('body') is-invalid @enderror"
                            placeholder="Tulis pesan kamu di sini...">{{ old('body') }}</textarea>

                        @error('body')
                            <div class="invalid-msg">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-purple">
                            <i class="bi bi-send-fill"></i>
                            Kirim Pesan
                        </button>

                        <a href="/home" class="btn-ghost">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
