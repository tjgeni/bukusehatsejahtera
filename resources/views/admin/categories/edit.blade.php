@extends('layouts.admin_layout')
@section('title', 'Edit Kategori')
@section('content')
    @push('styles')
        <style>
            .form-card {
                background: rgba(255, 255, 255, .92);
                backdrop-filter: blur(12px);
                border: 1px solid var(--border);
                border-radius: 28px;
                overflow: hidden;
                box-shadow:
                    0 10px 30px rgba(124, 58, 237, .06);
            }

            .form-card-header {
                padding: 26px 28px;
                border-bottom: 1px solid var(--border);
                display: flex;
                align-items: center;
                gap: 16px;
                background:
                    linear-gradient(180deg,
                        rgba(124, 58, 237, .03),
                        rgba(124, 58, 237, .01));
            }

            .form-icon {
                width: 54px;
                height: 54px;
                border-radius: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                background:
                    linear-gradient(135deg,
                        var(--primary),
                        var(--primary-light));
                color: #fff;
                font-size: 1.2rem;
                flex-shrink: 0;
                box-shadow:
                    0 10px 24px rgba(124, 58, 237, .22);
            }

            .form-title {
                margin: 0;
                font-size: 1.05rem;
                font-weight: 700;
                color: var(--text);
                letter-spacing: -.02em;
            }

            .form-subtitle {
                margin: 5px 0 0;
                font-size: .82rem;
                color: var(--text-muted);
            }

            .form-card-body {
                padding: 28px;
            }

            .form-label-custom {
                display: inline-block;
                margin-bottom: 10px;
                font-size: .8rem;
                font-weight: 700;
                color: var(--text);
            }

            .form-control-custom {
                width: 100%;
                min-height: 52px;
                padding: 0 16px;
                border: 1px solid var(--border);
                border-radius: 16px;
                background: #fff;
                font-size: .86rem;
                color: var(--text);
                transition: .18s ease;
            }

            .form-control-custom:focus {
                outline: none;
                border-color: rgba(124, 58, 237, .35);
                box-shadow:
                    0 0 0 4px rgba(124, 58, 237, .08);
            }

            .form-control-custom::placeholder {
                color: #A1A1AA;
            }

            .alert-custom {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 14px 16px;
                border-radius: 16px;
                margin-bottom: 22px;
                font-size: .82rem;
                font-weight: 500;
            }

            .alert-danger-custom {
                background: #FEF2F2;
                color: #B91C1C;
                border: 1px solid #FECACA;
            }

            .input-error {
                margin-top: 8px;
                font-size: .76rem;
                color: #DC2626;
            }

            .btn-save {
                min-height: 48px;
                padding: 0 20px;
                border: none;
                border-radius: 16px;
                background:
                    linear-gradient(135deg,
                        var(--primary),
                        var(--primary-light));
                color: #fff;
                font-size: .84rem;
                font-weight: 700;
                transition: .18s ease;
                box-shadow:
                    0 10px 20px rgba(124, 58, 237, .18);
            }

            .btn-save:hover {
                transform: translateY(-1px);
                opacity: .96;
            }

            .btn-cancel {
                min-height: 48px;
                padding: 0 20px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 16px;
                border: 1px solid var(--border);
                background: #fff;
                color: #6B7280;
                text-decoration: none;
                font-size: .84rem;
                font-weight: 600;
                transition: .18s ease;
            }

            .btn-cancel:hover {
                background: var(--primary-soft);
                border-color: rgba(124, 58, 237, .18);
                color: var(--primary);
            }
        </style>
    @endpush

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="form-card">
                {{-- HEADER --}}
                <div class="form-card-header">
                    <div class="form-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                    <div>
                        <h2 class="form-title">
                            Edit Kategori
                        </h2>

                        <p class="form-subtitle">
                            Perbarui informasi kategori produk.
                        </p>
                    </div>
                </div>

                {{-- BODY --}}
                <div class="form-card-body">

                    @if ($errors->any())
                        <div class="alert-custom alert-danger-custom">

                            <i class="bi bi-exclamation-circle"></i>

                            <span>
                                {{ $errors->first() }}
                            </span>

                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.categories.update', $category) }}">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">

                            <label class="form-label-custom">
                                Nama Kategori
                            </label>

                            <input type="text" name="name" value="{{ old('name', $category->name) }}"
                                class="form-control-custom @error('name') is-invalid @enderror"
                                placeholder="Contoh: Novel, Komik, Pendidikan">

                            @error('name')
                                <div class="input-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- ACTION --}}
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <button type="submit" class="btn-save">
                                <i class="bi bi-check2-circle me-1"></i>
                                Update Kategori
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="btn-cancel">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
