<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6; /* Abu-abu muda agar card menonjol */
            margin: 0;
        }

        /* Navbar Hijau Gelap sesuai foto */
        .navbar-custom {
            background: linear-gradient(135deg, #1e3b22 0%, #102a0f 100%);
            padding: 15px 30px;
        }

        /* Styling Card Putih */
        .main-card {
            background: #ffffff;
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        /* Styling Link Kembali dengan HOVER */
        .back-link {
            text-decoration: none;
            color: #4b5563;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .back-link:hover {
            color: #1e3b22; /* Berubah jadi hijau gelap */
            transform: translateX(-5px); /* Geser ke kiri sedikit */
        }

        .btn-simpan {
            background-color: #1e3b22;
            border: none;
            padding: 10px 25px;
            transition: 0.3s;
        }

        .btn-simpan:hover {
            background-color: #2d5a33;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-plus-circle me-2"></i> Tambah Menu Baru
        </a>
        <div class="ms-auto">
            <span class="text-white">{{ auth()->user()->name ?? 'reyhan admin' }}</span>
        </div>
    </div>
</nav>

<div class="container py-4">
    <a href="/dashboard/menu" class="back-link">
        <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Menu
    </a>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card main-card p-4">
                <h4 class="fw-bold text-dark mb-4">Formulir Tambah Menu</h4>
                
                <form action="/dashboard/menu" method="POST" enctype="multipart/form-data">
                    @csrf <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Menu</label>
                            <input type="text" name="nama_menu" class="form-control rounded-3" placeholder="Contoh: Sate Ayam Madura" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="kategori" class="form-select rounded-3">
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control rounded-3" placeholder="25000" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Stok Tersedia</label>
                            <input type="number" name="stok" class="form-control rounded-3" placeholder="50" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi Menu</label>
                        <textarea name="deskripsi_menu" class="form-control rounded-3" rows="3" placeholder="Tuliskan komposisi atau keunggulan menu..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Foto Menu</label>
                        <input type="file" name="foto_menu" class="form-control rounded-3">
                        <small class="text-muted">Format: JPG, PNG, JPEG (Maks. 2MB)</small>
                    </div>

                    <hr class="text-muted mb-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="/dashboard/menu" class="btn btn-light px-4 border">Batal</a>
                        <button type="submit" class="btn btn-success btn-simpan rounded-pill px-5 shadow-sm">
                            <i class="bi bi-save me-1"></i> Simpan Menu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>