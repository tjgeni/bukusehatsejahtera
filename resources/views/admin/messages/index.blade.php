@extends('layouts.admin_layout')
@section('title', 'Daftar Pesan')

@push('styles')
    <style>
        /* ───────── PAGE HEADER ───────── */
        .messages-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 1.6rem;
            gap: 1rem;
        }

        .messages-title-wrap h2 {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text);

            margin: 0 0 .2rem;
            letter-spacing: -.02em;
        }

        .messages-title-wrap p {
            margin: 0;

            font-size: .83rem;
            color: var(--text-muted);
        }

        .messages-badge {
            display: inline-flex;
            align-items: center;
            gap: .45rem;

            background: linear-gradient(135deg,
                    rgba(124, 58, 237, .12),
                    rgba(168, 85, 247, .10));

            color: var(--primary);

            border: 1px solid rgba(124, 58, 237, .14);

            padding: .6rem .9rem;

            border-radius: 14px;

            font-size: .8rem;
            font-weight: 700;
        }

        /* ───────── EMPTY STATE ───────── */
        .empty-state {
            background: rgba(255, 255, 255, .9);

            border: 1px solid var(--border);

            border-radius: 22px;

            padding: 4rem 2rem;

            text-align: center;

            box-shadow: var(--shadow-soft);
        }

        .empty-icon {
            width: 72px;
            height: 72px;

            margin: 0 auto 1.2rem;

            border-radius: 24px;

            background:
                linear-gradient(135deg,
                    rgba(124, 58, 237, .12),
                    rgba(168, 85, 247, .12));

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--primary);

            font-size: 1.7rem;
        }

        .empty-title {
            font-size: 1rem;
            font-weight: 700;

            color: var(--text);

            margin-bottom: .4rem;
        }

        .empty-desc {
            font-size: .84rem;
            color: var(--text-muted);

            margin: 0;
        }

        /* ───────── MESSAGE CARD ───────── */
        .message-card {
            background: rgba(255, 255, 255, .94);

            border: 1px solid var(--border);

            border-radius: 22px;

            padding: 1.3rem 1.4rem;

            transition:
                .2s ease,
                transform .18s ease;

            box-shadow: var(--shadow-soft);

            height: 100%;
        }

        .message-card:hover {
            transform: translateY(-2px);

            border-color: rgba(124, 58, 237, .18);

            box-shadow:
                0 10px 26px rgba(124, 58, 237, .08);
        }

        /* Top section */
        .message-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            gap: 1rem;

            margin-bottom: 1rem;
        }

        .message-user {
            display: flex;
            align-items: center;
            gap: .9rem;

            min-width: 0;
        }

        .message-avatar {
            width: 48px;
            height: 48px;

            border-radius: 16px;

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
                0 10px 20px rgba(124, 58, 237, .18);
        }

        .message-user-info {
            min-width: 0;
        }

        .message-name {
            font-size: .9rem;
            font-weight: 700;

            color: var(--text);

            margin-bottom: .12rem;
        }

        .message-email {
            font-size: .78rem;

            color: var(--text-muted);

            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .message-time {
            flex-shrink: 0;

            font-size: .74rem;
            font-weight: 600;

            color: var(--primary);

            background: var(--primary-soft);

            padding: .4rem .7rem;

            border-radius: 999px;
        }

        /* Subject */
        .message-subject {
            font-size: .95rem;
            font-weight: 700;

            color: #24143F;

            margin-bottom: .8rem;

            line-height: 1.45;
        }

        /* Divider */
        .message-divider {
            height: 1px;

            background:
                linear-gradient(to right,
                    rgba(124, 58, 237, .10),
                    transparent);

            margin-bottom: .9rem;
        }

        /* Body */
        .message-body {
            font-size: .84rem;

            color: #6F6A86;

            margin: 0;

        }

        /* ───────── RESPONSIVE ───────── */
        @media (max-width: 768px) {
            .messages-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .message-top {
                flex-direction: column;
            }

            .message-time {
                align-self: flex-start;
            }

            .message-card {
                border-radius: 18px;
            }
        }
    </style>
@endpush

@section('content')

    {{-- HEADER --}}
    <div class="messages-header">

        <div class="messages-title-wrap">
            <h2>Pesan Masuk Customer</h2>
            <p>Lihat seluruh pesan yang dikirim pengguna.</p>
        </div>

        <div class="messages-badge">
            <i class="bi bi-envelope"></i>
            {{ $messages->count() }} Pesan
        </div>

    </div>

    {{-- EMPTY --}}
    @if ($messages->isEmpty())
        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-inbox"></i>
            </div>

            <div class="empty-title">
                Belum ada pesan masuk
            </div>

            <p class="empty-desc">
                Semua pesan dari customer akan muncul di halaman ini.
            </p>

        </div>
    @else
        {{-- LIST --}}
        <div class="row g-4">

            @foreach ($messages as $msg)
                <div class="col-12">

                    <div class="message-card">

                        {{-- TOP --}}
                        <div class="message-top">

                            <div class="message-user">

                                <div class="message-avatar">
                                    {{ strtoupper(substr($msg->user->name, 0, 2)) }}
                                </div>

                                <div class="message-user-info">

                                    <div class="message-name">
                                        {{ $msg->user->name }}
                                    </div>

                                    <div class="message-email">
                                        {{ $msg->user->email }}
                                    </div>

                                </div>

                            </div>

                            <div class="message-time">
                                {{ $msg->created_at->diffForHumans() }}
                            </div>

                        </div>

                        {{-- SUBJECT --}}
                        <div class="message-subject">
                            {{ $msg->subject }}
                        </div>

                        {{-- DIVIDER --}}
                        <div class="message-divider"></div>

                        {{-- BODY --}}
                        <p class="message-body">
                            {{ $msg->body }}
                        </p>

                    </div>

                </div>
            @endforeach

        </div>
    @endif

@endsection
