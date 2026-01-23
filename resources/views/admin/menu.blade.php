<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #2ecc71, #27ae60);
            min-height: 100vh;
            margin: 0;
        }
        /* Navbar hitam sesuai foto dashboard */
        .navbar-custom {
        background: linear-gradient(135deg, #1e3b22 0%, #102a0f 100%);
        padding: 15px 30px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .back-link {
        text-decoration: none;
        color: white; /* Mengikuti warna teks di background hijau */
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease; /* Durasi efek transisi */
    }

    /* Efek HOVER */
    .back-link:hover {
        color: #e0e0e0; /* Warna teks agak meredup saat disentuh */
        transform: translateX(-5px); /* Memberikan efek geser ke kiri sedikit */
    }

    .back-link i {
        margin-right: 8px;
    }
        /* Card putih melengkung */
        .main-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            border: none;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }
        .table thead {
            background-color: #f8f9fa;
            color: #27ae60;
        }
        .btn-logout {
            background-color: #e74c3c;
            color: white;
            border-radius: 8px;
            padding: 5px 15px;
            text-decoration: none;
            border: none;
        }
        .btn-logout:hover { background-color: #c0392b; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/admin/menu">
            <i class="bi bi-speedometer2"></i> Kelola Menu
        </a>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-white me-3">{{ auth()->user()->name ?? 'reyhan admin' }}</span>
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn-logout btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container pt-4">
    <div class="mb-3">
        <a href="/dashboard" class="back-link">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
        </a>
    </div>
    
<div class="container py-5">
    <div class="d-flex align-items-center mb-4 text-white">
        <i class="bi bi-egg-fried display-6 me-3"></i>
        <h2 class="fw-bold m-0">Daftar Menu Warung Sate</h2>
    </div>

    <div class="card main-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold text-success m-0">Data Menu Tersedia</h5>
            <a href="/dashboard/menu/create" class="btn btn-success shadow-sm rounded-pill px-4">
                <i class="bi bi-plus-lg me-1"></i> Tambah Menu
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th class="border-0">Foto</th>
                        <th class="border-0">Nama Menu</th>
                        <th class="border-0">Kategori</th>
                        <th class="border-0">Harga</th>
                        <th class="border-0">Stok</th>
                        <th class="border-0 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                    <tr>
                        <td>
                            @if($menu->foto_menu)
                                <img src="/images/{{ $menu->foto_menu }}" width="55" height="55" class="rounded-circle shadow-sm" style="object-fit: cover; border: 2px solid #2ecc71;">
                            @else
                                <div class="bg-light rounded-circle text-center border" style="width:55px; height:55px; line-height:55px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $menu->nama_menu }}</div>
                            <small class="text-muted">ID: #{{ $menu->id_menu }}</small>
                        </td>
                        <td><span class="badge rounded-pill bg-light text-success border border-success">{{ $menu->kategori }}</span></td>
                        <td class="fw-bold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                        <td>
                            @if($menu->stok <= 5)
                                <span class="badge bg-danger">Hampir Habis: {{ $menu->stok }}</span>
                            @else
                                <span class="text-muted">{{ $menu->stok }} Porsi</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="/dashboard/menu/{{ $menu->id_menu }}/edit" class="btn btn-outline-warning btn-sm rounded-3">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="/dashboard/menu/{{ $menu->id_menu }}" method="POST" onsubmit="return confirm('Hapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-3">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>