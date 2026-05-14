@extends('layouts.admin_layout')
@section('title', 'Daftar Produk')

@section('content')

    @push('styles')
        <style>
            .product-wrapper {
                background: #fff;
                border: 1px solid #ECE8F6;
                border-radius: 18px;
                overflow: hidden;
            }

            .product-header {
                padding: 1.2rem 1.4rem;
                border-bottom: 1px solid #F1EDF8;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
                flex-wrap: wrap;
            }

            .product-title {
                font-size: 1rem;
                font-weight: 700;
                color: #1E1B39;
                margin: 0;
            }

            .product-subtitle {
                margin-top: 3px;
                font-size: .82rem;
                color: #9CA3AF;
            }

            .btn-add-product {
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

            .btn-add-product:hover {
                transform: translateY(-1px);
                box-shadow: 0 8px 20px rgba(124, 58, 237, .18);
                color: #fff;
            }

            .table-product {
                margin: 0;
            }

            .table-product thead th {
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

            .table-product tbody td {
                padding: 1rem 1.2rem;
                vertical-align: middle;
                border-bottom: 1px solid #F5F3FB;
            }

            .table-product tbody tr:last-child td {
                border-bottom: none;
            }

            .table-product tbody tr {
                transition: .15s ease;
            }

            .table-product tbody tr:hover {
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

            .product-image {
                width: 58px;
                height: 78px;
                object-fit: cover;
                border-radius: 12px;
                border: 1px solid #ECE8F6;
                background: #fff;
            }

            .product-name {
                font-size: .92rem;
                font-weight: 700;
                color: #1E1B39;
                margin-bottom: 3px;
            }

            .product-desc {
                font-size: .8rem;
                color: #9CA3AF;
                line-height: 1.5;
                max-width: 320px;
            }

            .category-badge {
                display: inline-flex;
                align-items: center;
                padding: .42rem .75rem;
                border-radius: 999px;
                background: rgba(124, 58, 237, .08);
                color: #7C3AED;
                font-size: .76rem;
                font-weight: 600;
            }

            .price-text {
                font-size: .9rem;
                font-weight: 700;
                color: #1E1B39;
            }

            .stock-badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 42px;
                padding: .42rem .7rem;
                border-radius: 999px;
                font-size: .76rem;
                font-weight: 700;
            }

            .stock-normal {
                background: rgba(124, 58, 237, .08);
                color: #7C3AED;
            }

            .stock-low {
                background: rgba(245, 158, 11, .1);
                color: #D97706;
            }

            .stock-empty {
                background: rgba(239, 68, 68, .1);
                color: #DC2626;
            }

            .action-group {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: .55rem;
            }

            .btn-action {
                width: 36px;
                height: 36px;
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

    <div class="product-wrapper">

        {{-- HEADER --}}
        <div class="product-header">

            <div>
                <h5 class="product-title">Daftar Produk</h5>
                <div class="product-subtitle">
                    Kelola seluruh koleksi buku toko
                </div>
            </div>

            <a href="{{ route('admin.products.create') }}" class="btn-add-product">
                <i class="bi bi-plus-lg"></i>
                Tambah Produk
            </a>

        </div>

        {{-- CONTENT --}}
        @if ($products->isEmpty())

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="bi bi-book"></i>
                </div>

                <div class="empty-title">
                    Belum Ada Produk
                </div>

                <p class="empty-text">
                    Tambahkan produk buku untuk mulai dijual.
                </p>

            </div>
        @else
            <div class="table-responsive">

                <table class="table table-product align-middle">

                    <thead>
                        <tr>
                            <th width="70">No</th>
                            <th width="100">Cover</th>
                            <th>Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th class="text-center">Stok</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($products as $product)
                            @php
                                $image = Illuminate\Support\Str::startsWith($product->image, ['http://', 'https://'])
                                    ? $product->image
                                    : asset('storage/' . $product->image);
                            @endphp

                            <tr>

                                {{-- NUMBER --}}
                                <td>
                                    <div class="number-badge">
                                        {{ $products->firstItem() + $loop->index }}
                                    </div>
                                </td>

                                {{-- IMAGE --}}
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" class="product-image"
                                            alt="{{ $product->name }}">
                                    @else
                                        <img src="https://dummyimage.com/300x450/e9d5ff/7c3aed&text=No+Image"
                                            class="product-image" alt="No image">
                                    @endif
                                </td>

                                {{-- PRODUCT --}}
                                <td>

                                    <div class="product-name">
                                        {{ $product->name }}
                                    </div>

                                    <div class="product-desc">
                                        {{ Str::limit($product->description, 70) }}
                                    </div>

                                </td>

                                {{-- CATEGORY --}}
                                <td>
                                    <span class="category-badge">
                                        {{ $product->category->name ?? '-' }}
                                    </span>
                                </td>

                                {{-- PRICE --}}
                                <td>
                                    <div class="price-text">
                                        Rp{{ number_format($product->price, 0, ',', '.') }}
                                    </div>
                                </td>

                                {{-- STOCK --}}
                                <td class="text-center">

                                    @if ($product->stock <= 0)
                                        <span class="stock-badge stock-empty">
                                            Habis
                                        </span>
                                    @elseif($product->stock <= 10)
                                        <span class="stock-badge stock-low">
                                            {{ $product->stock }}
                                        </span>
                                    @else
                                        <span class="stock-badge stock-normal">
                                            {{ $product->stock }}
                                        </span>
                                    @endif

                                </td>

                                {{-- ACTION --}}
                                <td>

                                    <div class="action-group">

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.products.edit', $product) }}" class="btn-action btn-edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        <button type="button" class="btn-action btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $product->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </div>

                                    {{-- MODAL --}}
                                    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                                        aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered">

                                            <div class="modal-content border-0"
                                                style="border-radius:18px; overflow:hidden;">

                                                <div class="modal-header border-0 pb-0">

                                                    <h5 class="modal-title fw-bold">
                                                        Hapus Produk
                                                    </h5>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>

                                                </div>

                                                <div class="modal-body pt-2">
                                                    Yakin ingin menghapus produk
                                                    <strong>{{ $product->name }}</strong>?
                                                </div>

                                                <div class="modal-footer border-0 pt-0">

                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <form action="{{ route('admin.products.destroy', $product) }}"
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
                {{ $products->links() }}
            </div>

        @endif

    </div>

@endsection
