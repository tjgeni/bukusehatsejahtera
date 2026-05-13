@extends('layouts.admin_layout')
@section('title', 'Daftar Pesanan')
@section('content')

    @push('styles')
        <style>
            /* ── PAGE HEADER ── */
            .page-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 1.5rem;
            }

            .page-title {
                font-size: 1.05rem;
                font-weight: 700;
                color: #1C1033;
                letter-spacing: -0.2px;
                margin: 0;
            }

            .page-badge {
                font-size: 0.72rem;
                font-weight: 600;
                padding: 3px 10px;
                border-radius: 20px;
                background: #F5F3FF;
                color: #7C3AED;
                border: 1px solid #EDE9FE;
                letter-spacing: 0.02em;
            }

            /* ── EMPTY STATE ── */
            .empty-state {
                background: #fff;
                border: 1px solid #EDE9FE;
                border-radius: 12px;
                padding: 4rem 2rem;
                text-align: center;
            }

            .empty-icon {
                width: 56px;
                height: 56px;
                background: #F5F3FF;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.4rem;
                color: #A78BFA;
                margin: 0 auto 1rem;
            }

            .empty-title {
                font-size: 0.9rem;
                font-weight: 600;
                color: #1C1033;
                margin-bottom: 0.3rem;
            }

            .empty-desc {
                font-size: 0.845rem;
                color: #9CA3AF;
                margin: 0;
            }

            /* ── MESSAGE CARD ── */
            .msg-card {
                background: #fff;
                border: 1px solid #EDE9FE;
                border-radius: 12px;
                padding: 1.25rem 1.5rem;
                transition: border-color 0.15s, box-shadow 0.15s;
            }

            .msg-card:hover {
                border-color: #C4B5FD;
                box-shadow: 0 4px 16px rgba(124, 58, 237, 0.07);
            }

            .msg-header {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 1rem;
                margin-bottom: 0.75rem;
            }

            .msg-subject {
                font-size: 0.9rem;
                font-weight: 600;
                color: #1C1033;
                letter-spacing: -0.1px;
                margin-bottom: 0.3rem;
            }

            .msg-meta {
                display: flex;
                align-items: center;
                gap: 10px;
                flex-wrap: wrap;
            }

            .msg-meta-item {
                display: flex;
                align-items: center;
                gap: 5px;
                font-size: 0.78rem;
                color: #9CA3AF;
            }

            .msg-meta-item i {
                font-size: 0.72rem;
            }

            .msg-sender-avatar {
                width: 28px;
                height: 28px;
                border-radius: 50%;
                background: linear-gradient(135deg, #7C3AED, #D946EF);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.68rem;
                font-weight: 700;
                color: #fff;
                flex-shrink: 0;
            }

            .msg-time {
                font-size: 0.75rem;
                color: #9CA3AF;
                white-space: nowrap;
                flex-shrink: 0;
            }

            .msg-divider {
                border: none;
                border-top: 1px solid #F5F3FF;
                margin: 0.75rem 0;
            }

            .msg-body {
                font-size: 0.845rem;
                color: #6B7280;
                line-height: 1.7;
                margin: 0;
            }
        </style>
    @endpush



@endsection
