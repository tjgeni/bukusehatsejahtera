@extends('layouts.customer_layout')

@section('title', 'About')

@section('content')

    <style>
        .about-hero {
            position: relative;

            overflow: hidden;

            background:
                linear-gradient(135deg,
                    rgba(139, 92, 246, .12),
                    rgba(236, 72, 153, .08));

            border: 1px solid var(--border-color);

            border-radius: 28px;

            padding: 4rem 3rem;

            margin-bottom: 2rem;

            box-shadow: var(--shadow-soft);
        }

        .about-hero::before {
            content: '';

            position: absolute;

            top: -120px;
            right: -100px;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            background:
                radial-gradient(circle,
                    rgba(139, 92, 246, .16),
                    transparent 70%);
        }

        .about-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;

            background: rgba(255, 255, 255, .75);

            border: 1px solid rgba(139, 92, 246, .12);

            color: var(--primary);

            padding: .45rem .9rem;

            border-radius: 999px;

            font-size: .78rem;
            font-weight: 700;

            margin-bottom: 1.2rem;

            backdrop-filter: blur(10px);
        }

        .about-title {
            font-family: var(--font-display);

            font-size: 2.4rem;
            font-weight: 700;

            line-height: 1.2;

            color: var(--text-dark);

            margin-bottom: 1rem;

            max-width: 720px;

            letter-spacing: -.03em;
        }

        .about-desc {
            font-size: .95rem;

            color: var(--text-muted);

            line-height: 1.9;

            max-width: 720px;

            margin-bottom: 0;
        }

        .about-grid {
            display: grid;

            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));

            gap: 1.2rem;

            margin-bottom: 2rem;
        }

        .about-card {
            background: rgba(255, 255, 255, .92);

            border: 1px solid var(--border-color);

            border-radius: 22px;

            padding: 1.5rem;

            transition: .2s ease;

            box-shadow:
                0 8px 24px rgba(139, 92, 246, .04);
        }

        .about-card:hover {
            transform: translateY(-4px);

            border-color: rgba(139, 92, 246, .14);

            box-shadow:
                0 18px 36px rgba(139, 92, 246, .10);
        }

        .about-icon {
            width: 54px;
            height: 54px;

            border-radius: 16px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(135deg,
                    var(--primary),
                    var(--primary-light));

            color: #fff;

            font-size: 1.3rem;

            margin-bottom: 1rem;

            box-shadow:
                0 10px 20px rgba(139, 92, 246, .18);
        }

        .about-card-title {
            font-size: 1rem;
            font-weight: 700;

            color: var(--text-dark);

            margin-bottom: .6rem;
        }

        .about-card-desc {
            font-size: .88rem;

            color: var(--text-muted);

            line-height: 1.8;

            margin-bottom: 0;
        }

        .story-section {
            background: rgba(255, 255, 255, .88);

            border: 1px solid var(--border-color);

            border-radius: 28px;

            padding: 2.5rem;

            box-shadow: var(--shadow-soft);
        }

        .story-label {
            display: inline-flex;
            align-items: center;
            gap: .45rem;

            color: var(--primary);

            font-size: .8rem;
            font-weight: 700;

            margin-bottom: 1rem;
        }

        .story-title {
            font-size: 1.5rem;
            font-weight: 700;

            color: var(--text-dark);

            margin-bottom: 1rem;

            letter-spacing: -.02em;
        }

        .story-text {
            font-size: .92rem;

            color: var(--text-muted);

            line-height: 1.9;

            margin-bottom: 1rem;
        }

        .quote-box {
            margin-top: 2rem;

            background:
                linear-gradient(135deg,
                    rgba(139, 92, 246, .10),
                    rgba(236, 72, 153, .06));

            border-radius: 22px;

            padding: 1.5rem;

            border: 1px solid rgba(139, 92, 246, .08);
        }

        .quote-box p {
            font-size: 1rem;
            font-weight: 600;

            line-height: 1.8;

            color: var(--text-dark);

            margin: 0;
        }

        @media (max-width: 768px) {
            .about-hero {
                padding: 2.5rem 1.5rem;
            }

            .about-title {
                font-size: 1.8rem;
            }

            .story-section {
                padding: 1.6rem;
            }
        }
    </style>

    <div class="container py-4">

        {{-- HERO --}}
        <section class="about-hero">

            <div class="about-badge">
                <i class="bi bi-stars"></i>
                Tentang Kami
            </div>

            <h1 class="about-title">
                Buku Sehat Sejahtera hadir untuk membawa pengalaman membaca yang hangat,
                modern, dan penuh inspirasi.
            </h1>

            <p class="about-desc">
                Kami percaya bahwa buku bukan sekadar kumpulan halaman, tetapi jendela menuju
                pengetahuan, ketenangan, dan perubahan hidup yang lebih baik.
                Dari novel, pengembangan diri, kesehatan, hingga buku edukasi —
                kami ingin setiap pembaca menemukan cerita yang tepat untuk dirinya.
            </p>

        </section>

        {{-- CARDS --}}
        <div class="about-grid">
            <div class="about-card">
                <div class="about-icon">
                    <i class="bi bi-book-half"></i>
                </div>
                <h3 class="about-card-title">
                    Koleksi Berkualitas
                </h3>

                <p class="about-card-desc">
                    Kami menyediakan berbagai pilihan buku pilihan dengan kualitas terbaik
                    dari penulis lokal maupun internasional.
                </p>
            </div>

            <div class="about-card">
                <div class="about-icon">
                    <i class="bi bi-heart"></i>
                </div>

                <h3 class="about-card-title">
                    Pengalaman Nyaman
                </h3>

                <p class="about-card-desc">
                    Tampilan toko dirancang sederhana, modern, dan nyaman agar proses
                    mencari buku terasa lebih menyenangkan.
                </p>
            </div>

            <div class="about-card">
                <div class="about-icon">
                    <i class="bi bi-lightbulb"></i>
                </div>

                <h3 class="about-card-title">
                    Inspirasi Setiap Hari
                </h3>

                <p class="about-card-desc">
                    Kami ingin membantu pembaca menemukan inspirasi baru melalui
                    cerita, wawasan, dan ide-ide bermakna.
                </p>
            </div>

        </div>

        {{-- STORY --}}
        <section class="story-section">

            <div class="story-label">
                <i class="bi bi-journal-richtext"></i>
                Cerita Kami
            </div>

            <h2 class="story-title">
                Dari kecintaan terhadap buku, lahirlah Buku Sehat Sejahtera.
            </h2>

            <p class="story-text">
                Buku Sehat Sejahtera dibangun dengan semangat untuk menciptakan ruang digital
                yang terasa personal dan hangat bagi setiap pembaca.
                Kami percaya bahwa membaca dapat menjadi langkah kecil yang membawa perubahan besar.
            </p>

            <p class="story-text">
                Dengan desain modern bernuansa lembut dan koleksi buku yang terus berkembang,
                kami ingin menghadirkan pengalaman berbelanja buku yang tidak hanya praktis,
                tetapi juga menyenangkan secara visual.
            </p>

            <div class="quote-box">
                <p>
                    “Setiap buku memiliki cerita, dan setiap pembaca memiliki perjalanan.”
                </p>
            </div>

        </section>

    </div>

@endsection
