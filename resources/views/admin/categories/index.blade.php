@extends('layouts.admin_layout')
@section('title', 'Daftar Kategori')

@section('content')

    @push('styles')
        <style>
            .category-wrapper {
                background: #fff;
                border: 1px solid #ECE8F6;
                border-radius: 18px;
                overflow: hidden;
            }

            .category-header {
                padding: 1.2rem 1.4rem;
                border-bottom: 1px solid #F1EDF8;
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 1rem;
            }

            .category-title {
                margin: 0;
                font-size: 1rem;
                font-weight: 700;
                color: #1E1B39;
            }

            .category-subtitle {
                margin-top: 3px;
                font-size: .82rem;
                color: #9CA3AF;
            }

            .btn-add-category {
                background: linear-gradient(135deg, #7C3AED, #8B5CF6);
                border: none;
                color: #fff;
                border-radius: 10px;
                padding: .6rem 1rem;
                font-size: .84rem;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: .45rem;
                text-decoration: none;
                transition: .2s ease;
            }

            .btn-add-category:hover {
                transform: translateY(-1px);
                box-shadow: 0 8px 20px rgba(124, 58, 237, .18);
                color: #fff;
            }

            .table-category {
                margin: 0;
            }

            .table-category thead th {
                background: #FCFBFF;
                border-bottom: 1px solid #F1EDF8;
                color: #9CA3AF;
                font-size: .75rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .03em;
                padding: 1rem 1.2rem;
                white-space: nowrap;
            }

            .table-category tbody td {
                padding: 1rem 1.2rem;
                vertical-align: middle;
                border-bottom: 1px solid #F5F3FB;
            }

            .table-category tbody tr:last-child td {
                border-bottom: none;
            }

            .table-category tbody tr {
                transition: .15s ease;
            }

            .table-category tbody tr:hover {
                background: #FCFBFF;
            }

            .number-badge {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background: #F5F3FF;
                color: #7C3AED;
                font-size: .78rem;
                font-weight: 700;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .category-name {
                font-size: .92rem;
                font-weight: 600;
                color: #1E1B39;
                margin-bottom: 2px;
            }

            .category-desc {
                font-size: .78rem;
                color: #9CA3AF;
            }

            .product-badge {
                display: inline-flex;
                align-items: center;
                gap: .4rem;
                padding: .42rem .75rem;
                border-radius: 999px;
                background: rgba(124, 58, 237, .08);
                color: #7C3AED;
                font-size: .76rem;
                font-weight: 600;
            }

            .date-text {
                font-size: .83rem;
                color: #6B7280;
                font-weight: 500;
            }

            .action-group {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: .55rem;
            }

            .btn-action {
                width: 34px;
                height: 34px;
                border-radius: 10px;
                border: 1px solid #ECE8F6;
                background: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: .15s ease;
                text-decoration: none;
            }

            .btn-edit {
                color: #7C3AED;
            }

            .btn-edit:hover {
                background: rgba(124, 58, 237, .08);
                border-color: rgba(124, 58, 237, .15);
                color: #7C3AED;
            }

            .btn-delete {
                color: #EF4444;
            }

            .btn-delete:hover {
                background: rgba(239, 68, 68, .08);
                border-color: rgba(239, 68, 68, .15);
                color: #EF4444;
            }

            .empty-state {
                padding: 5rem 2rem;
                text-align: center;
            }

            .empty-icon {
                width: 70px;
                height: 70px;
                border-radius: 50%;
                background: #F5F3FF;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1rem;
                color: #8B5CF6;
                font-size: 1.5rem;
            }

            .empty-title {
                font-size: .95rem;
                font-weight: 700;
                color: #1E1B39;
                margin-bottom: .35rem;
            }

            .empty-text {
                font-size: .83rem;
                color: #9CA3AF;
                margin-bottom: 0;
            }
        </style>
    @endpush

    <div class="category-wrapper">

        {{-- HEADER --}}
        <div class="category-header">
            <div>
                <h5 class="category-title">Daftar Kategori</h5>
                <div class="category-subtitle">
                    Kelola seluruh kategori buku toko
                </div>
            </div>


            <a href="{{ route('admin.categories.create') }}" class="btn-add-category">
                <i class="bi bi-plus-lg"></i>
                Tambah Kategori
            </a>
        </div>

        {{-- CONTENT --}}
        @if ($categories->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="bi bi-tags"></i>
                </div>

                <div class="empty-title">
                    Belum Ada Kategori
                </div>

                <p class="empty-text">
                    Tambahkan kategori baru untuk mulai mengelola produk buku.
                </p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-category align-middle">
                    <thead>
                        <tr>
                            <th width="70">No</th>
                            <th>Nama Kategori</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Tanggal Dibuat</th>
                            <th class="text-center" width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $cat)
                            <tr>

                                {{-- NUMBER --}}
                                <td>
                                    <div class="number-badge">
                                        {{ $categories->firstItem() + $loop->index }}
                                    </div>
                                </td>

                                {{-- CATEGORY --}}
                                <td>
                                    <div class="category-name">
                                        {{ $cat->name }}
                                    </div>

                                    <div class="category-desc">
                                        Kategori buku {{ strtolower($cat->name) }}
                                    </div>
                                </td>

                                {{-- PRODUCT --}}
                                <td class="text-center">
                                    <span class="product-badge">
                                        <i class="bi bi-book"></i>
                                        {{ $cat->products_count }} Produk
                                    </span>
                                </td>

                                {{-- DATE --}}
                                <td class="text-center">
                                    <span class="date-text">
                                        {{ $cat->created_at->format('d M Y') }}
                                    </span>
                                </td>

                                {{-- ACTION --}}
                                <td>
                                    <div class="action-group">

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.categories.edit', $cat) }}" class="btn-action btn-edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <button type="button" class="btn-action btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $cat->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    {{-- MODAL --}}
                                    <div class="modal fade" id="deleteModal{{ $cat->id }}" tabindex="-1"
                                        aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0"
                                                style="border-radius:18px; overflow:hidden;">

                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-bold">
                                                        Hapus Kategori
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>

                                                <div class="modal-body pt-2">
                                                    Apakah yakin ingin menghapus kategori
                                                    <strong>{{ $cat->name }}</strong>?
                                                </div>

                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <form action="{{ route('admin.categories.destroy', $cat) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn btn-danger">
                                                            Ya, Hapus
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-3">
                {{ $categories->links() }}
            </div>
        @endif

    </div>

@endsection
