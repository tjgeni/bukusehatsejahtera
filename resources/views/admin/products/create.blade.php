@extends('layouts.admin_layout')
@section('title', 'Tambah Produk')
@section('content')
    @push('styles')
        <style>
            .form-card {
                background: rgba(255, 255, 255, .92);
                backdrop-filter: blur(12px);
                border: 1px solid var(--border);
                border-radius: 30px;
                overflow: hidden;
                box-shadow:
                    0 10px 30px rgba(124, 58, 237, .06);
            }

            .form-card-header {
                padding: 28px 30px;
                border-bottom: 1px solid var(--border);
                display: flex;
                align-items: center;
                gap: 18px;
                background:
                    linear-gradient(180deg,
                        rgba(124, 58, 237, .03),
                        rgba(124, 58, 237, .01));
            }

            .form-icon {
                width: 58px;
                height: 58px;
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                background:
                    linear-gradient(135deg,
                        var(--primary),
                        var(--primary-light));
                color: #fff;
                font-size: 1.25rem;
                flex-shrink: 0;
                box-shadow:
                    0 12px 26px rgba(124, 58, 237, .22);
            }

            .form-title {
                margin: 0;
                font-size: 1.08rem;
                font-weight: 700;
                color: var(--text);
                letter-spacing: -.02em;
            }

            .form-subtitle {
                margin: 5px 0 0;
                font-size: .83rem;
                color: var(--text-muted);
            }

            .form-card-body {
                padding: 30px;
            }

            .form-label-custom {
                display: inline-block;
                margin-bottom: 10px;
                font-size: .8rem;
                font-weight: 700;
                color: var(--text);
            }

            .form-control-custom,
            .form-select-custom {
                width: 100%;
                min-height: 52px;
                padding: 0 16px;
                border: 1px solid var(--border);
                border-radius: 16px;
                background: #fff;
                font-size: .86rem;
                transition: .18s ease;
                box-shadow: none !important;
            }

            .form-control-custom:focus,
            .form-select-custom:focus,
            .form-textarea-custom:focus {
                outline: none;
                border-color: rgba(124, 58, 237, .35);
                box-shadow:
                    0 0 0 4px rgba(124, 58, 237, .08) !important;
            }

            .form-textarea-custom {
                width: 100%;
                padding: 16px;
                border: 1px solid var(--border);
                border-radius: 18px;
                background: #fff;
                font-size: .86rem;
                resize: none;
                transition: .18s ease;
            }

            .input-group-custom {
                display: flex;
            }

            .input-group-label {
                min-width: 58px;
                border: 1px solid var(--border);
                border-right: none;
                border-radius: 16px 0 0 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #FAF7FF;
                font-size: .84rem;
                font-weight: 700;
                color: var(--primary);
            }

            .border-start-0 {
                border-radius: 0 16px 16px 0 !important;
            }

            .upload-box {
                position: relative;
                border: 2px dashed #DDD6FE;
                border-radius: 24px;
                background: #FCFBFF;
                overflow: hidden;
                transition: .18s ease;
            }

            .upload-box:hover {
                border-color: #C4B5FD;
                background: #FAF7FF;
            }

            .upload-input {
                position: absolute;
                inset: 0;
                opacity: 0;
                cursor: pointer;
                z-index: 2;
            }

            .upload-content {
                padding: 42px 20px;
                text-align: center;
            }

            .upload-icon {
                width: 68px;
                height: 68px;
                margin: 0 auto 16px;
                border-radius: 22px;
                display: flex;
                align-items: center;
                justify-content: center;
                background:
                    linear-gradient(135deg,
                        rgba(124, 58, 237, .12),
                        rgba(139, 92, 246, .08));

                color: var(--primary);
                font-size: 1.5rem;
            }

            .upload-title {
                font-size: .92rem;
                font-weight: 700;
                color: var(--text);
                margin-bottom: 4px;
            }

            .upload-subtitle {
                font-size: .78rem;
                color: var(--text-muted);
            }

            .preview-wrapper {
                margin-top: 18px;
            }

            .preview-image {
                width: 160px;
                height: 200px;
                object-fit: cover;
                border-radius: 18px;
                border: 1px solid #ECE8F6;
                box-shadow:
                    0 10px 20px rgba(124, 58, 237, .08);
            }

            .form-footer {
                margin-top: 34px;
                padding-top: 24px;
                border-top: 1px solid var(--border);
                display: flex;
                align-items: center;
                gap: 14px;
                flex-wrap: wrap;
            }

            .btn-save {
                min-height: 50px;
                padding: 0 22px;
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
                    0 12px 24px rgba(124, 58, 237, .18);
            }

            .btn-save:hover {
                transform: translateY(-1px);
                opacity: .96;
            }

            .btn-cancel {
                min-height: 50px;
                padding: 0 22px;
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

            .alert-custom {
                display: flex;
                gap: 12px;
                padding: 16px 18px;
                border-radius: 18px;
                margin-bottom: 24px;
                font-size: .82rem;
            }

            .alert-danger-custom {
                background: #FEF2F2;
                border: 1px solid #FECACA;
                color: #B91C1C;
            }

            .input-error {
                margin-top: 8px;
                font-size: .76rem;
                color: #DC2626;
            }
        </style>
    @endpush
    <div class="row justify-content-center">

        <div class="col-xl-9">

            <div class="form-card">

                {{-- HEADER --}}
                <div class="form-card-header">

                    <div class="form-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div>
                        <h2 class="form-title">
                            Tambah Produk
                        </h2>

                        <p class="form-subtitle">
                            Tambahkan produk baru ke katalog toko.
                        </p>
                    </div>

                </div>

                {{-- BODY --}}
                <div class="form-card-body">

                    {{-- ERROR --}}
                    @if ($errors->any())
                        <div class="alert-custom alert-danger-custom">

                            <i class="bi bi-exclamation-circle"></i>

                            <div>
                                @foreach ($errors->all() as $e)
                                    <div>{{ $e }}</div>
                                @endforeach
                            </div>

                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row g-4">

                            {{-- NAME --}}
                            <div class="col-md-8">

                                <label class="form-label-custom">
                                    Nama Produk
                                </label>

                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control-custom @error('name') is-invalid @enderror"
                                    placeholder="Contoh: Atomic Habits">

                                @error('name')
                                    <div class="input-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- CATEGORY --}}
                            <div class="col-md-4">

                                <label class="form-label-custom">
                                    Kategori
                                </label>

                                <select name="category_id"
                                    class="form-select-custom @error('category_id') is-invalid @enderror">

                                    <option value="">
                                        -- Pilih Kategori --
                                    </option>

                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ old('category_id') == $cat->id ? 'selected' : '' }}>

                                            {{ $cat->name }}

                                        </option>
                                    @endforeach

                                </select>

                                @error('category_id')
                                    <div class="input-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- PRICE --}}
                            <div class="col-md-6">

                                <label class="form-label-custom">
                                    Harga
                                </label>

                                <div class="input-group-custom">

                                    <span class="input-group-label">
                                        Rp
                                    </span>

                                    <input type="number" name="price" min="0" value="{{ old('price') }}"
                                        class="form-control-custom border-start-0 @error('price') is-invalid @enderror"
                                        placeholder="50000">

                                </div>

                                @error('price')
                                    <div class="input-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- STOCK --}}
                            <div class="col-md-6">

                                <label class="form-label-custom">
                                    Stok
                                </label>

                                <input type="number" name="stock" min="0" value="{{ old('stock', 0) }}"
                                    class="form-control-custom @error('stock') is-invalid @enderror" placeholder="0">

                                @error('stock')
                                    <div class="input-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            {{-- DESCRIPTION --}}
                            <div class="col-12">

                                <label class="form-label-custom">
                                    Deskripsi Produk
                                </label>

                                <textarea name="description" rows="5" class="form-textarea-custom"
                                    placeholder="Tulis deskripsi singkat produk...">{{ old('description') }}</textarea>

                            </div>

                            {{-- IMAGE --}}
                            <div class="col-12">

                                <label class="form-label-custom">
                                    Foto Produk
                                </label>

                                <div class="upload-box">

                                    <input type="file" name="image" id="imageInput" accept="image/*"
                                        class="upload-input @error('image') is-invalid @enderror">

                                    <div class="upload-content">
                                        <div class="upload-icon">
                                            <i class="bi bi-image"></i>
                                        </div>

                                        <div class="upload-title">
                                            Upload gambar produk
                                        </div>

                                        <div class="upload-subtitle">
                                            JPG, PNG, WEBP • Maksimal 5MB
                                        </div>

                                    </div>

                                </div>

                                @error('image')
                                    <div class="input-error mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                                {{-- PREVIEW --}}
                                <div class="preview-wrapper">

                                    <img id="preview" src="" alt="Preview" class="preview-image d-none">

                                </div>

                            </div>

                        </div>

                        {{-- ACTION --}}
                        <div class="form-footer">
                            <button type="submit" class="btn-save">
                                <i class="bi bi-check2-circle me-1"></i>
                                Simpan Produk
                            </button>

                            <a href="{{ route('admin.products.index') }}" class="btn-cancel">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            const file = e.target.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('d-none');
            }
        });
    </script>
@endpush
