<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sate Pak Yono - Pesan Makanan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #f97316;
            --primary-hover: #ea580c;
            --bg-body: #f9fafb;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
            --container-width: 1000px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
            padding-top: 80px;
        }

        a { text-decoration: none; transition: 0.2s; }
        ul { list-style: none; }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            padding: 15px 0;
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            height: 70px;
            display: flex;
            align-items: center;
        }

        .nav-container {
            width: 100%;
            max-width: var(--container-width);
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-actions { display: flex; align-items: center; gap: 15px; }

        .btn-auth {
            padding: 8px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
        }
        .btn-login { color: var(--text-main); }
        .btn-login:hover { color: var(--primary); }

        .btn-register {
            background: var(--primary);
            color: white;
        }
        .btn-register:hover { background: var(--primary-hover); }

        .btn-logout {
            color: #ef4444;
            font-size: 14px;
            font-weight: 600;
        }

        .user-info {
            display: flex; align-items: center; gap: 8px;
            font-size: 14px; font-weight: 600; color: var(--text-main);
            background: #f3f4f6; padding: 6px 12px; border-radius: 50px;
        }

        .hero {
            background: linear-gradient(135deg, #f97316 0%, #fb923c 100%);
            color: white;
            text-align: center;
            padding: 60px 20px;
            margin-bottom: 40px;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 4px 6px -1px rgba(249, 115, 22, 0.2);
        }

        .hero h1 { font-size: 36px; margin-bottom: 10px; font-weight: 800; }
        .hero p { font-size: 16px; opacity: 0.9; max-width: 600px; margin: 0 auto; }

        .container {
            max-width: var(--container-width);
            margin: 0 auto;
            padding: 0 20px 60px 20px;
        }

        /* --- ACTION BAR (NEW) --- */
        .action-bar {
            display: flex;
            justify-content: center; /* Posisi di tengah */
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap; /* Agar responsif di HP */
        }

        .btn-filter {
            background: white;
            border: 1px solid var(--border-color);
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 600;
            color: var(--text-main);
            cursor: pointer;
            display: flex; align-items: center; gap: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: all 0.2s;
        }
        .btn-filter:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }
        .btn-filter.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .btn-saran {
            background: #ecfdf5; /* Hijau muda */
            color: #059669;      /* Hijau tua */
            border: 1px solid #a7f3d0;
        }
        .btn-saran:hover {
            background: #d1fae5;
            color: #047857;
        }
        /* ------------------------ */

        .section-header { margin-bottom: 30px; text-align: center; }
        .section-title { font-size: 28px; font-weight: 700; color: var(--text-main); margin-bottom: 5px; }
        .section-subtitle { color: var(--text-muted); font-size: 15px; }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .menu-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.2s ease;
            display: flex;
            flex-direction: column;
        }
        .menu-card:hover {
            transform: translateY(-5px);
            border-color: var(--primary);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            }

        .menu-img {
            width: 100%; height: 180px;
            object-fit: cover;
            background: #e5e7eb;
        }

        .menu-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .menu-header-row {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 10px;
        }
        .menu-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-main);
            line-height: 1.2;
        }
        .menu-rating {
            font-size: 12px;
            background: #fff7ed;
            color: #f59e0b;
            padding: 4px 8px;
            border-radius: 6px;
            font-weight: 700;
        }
        .menu-price {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 8px;
        }
        .badges {
            display: flex;
            gap: 8px;
            margin-bottom: 12px;
            font-size: 12px;
            color: var(--text-muted);
        }
        .menu-desc {
            font-size: 14px;
            color: var(--text-muted);
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .order-area {
            margin-top: auto;
            border-top: 1px dashed var(--border-color);
            padding-top: 15px;
        }
        .input-group {
            display: flex;
            gap: 8px;
            margin-bottom: 10px;
        }
        .input-qty {
            width: 50px;
            text-align: center;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 8px;
            font-weight: bold;
        }
        .input-note {
            flex: 1;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 13px;
        }
        .btn-order {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-order:hover {
            background: var(--primary-hover);
        }
        .btn-disabled {
            background: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
            display: block;
            text-align: center;
            padding: 10px;
            border-radius: 6px;
            font-weight: 600;
        }
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #10b981;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 2000;
        }
        .toast.error {
            background: #ef4444;
        }

        footer {
            text-align: center;
            padding: 30px;
            color: var(--text-muted);
            font-size: 13px;
            border-top: 1px solid var(--border-color);
            background: white;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="brand">
                <i class="fas fa-fire-flame-curved"></i> Sate Pak Yono
            </a>
            <div class="nav-actions">
                @if(session('loginpelanggan'))
                    <div class="user-info">
                        <i class="fas fa-user-circle"></i>
                        <span>{{ session('pelanggan_username') }}</span>
                    </div>
                    <a href="/logout-pelanggan" class="btn-logout" onclick="return confirm('Yakin ingin keluar?')">Logout</a>
                @else
                    <a href="/login-pelanggan" class="btn-auth btn-login">Masuk</a>
                    <a href="/register-pelanggan" class="btn-auth btn-register">Daftar</a>
                @endif
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="toast">
            <i class="fas fa-check-circle"></i> <span>{{ session('success') }}</span>
        </div>
        <script>setTimeout(() => document.querySelector('.toast').style.display = 'none', 3000);</script>
    @endif
    @if(session('error'))
        <div class="toast error">
            <i class="fas fa-exclamation-circle"></i> <span>{{ session('error') }}</span>
        </div>
        <script>setTimeout(() => document.querySelector('.toast').style.display = 'none', 3000);</script>
    @endif

    <div class="hero">
        <h1>Sate Kambing Pak Yono</h1>
        <p>Legenda Kuliner Sejak 1985. Daging Empuk, Bumbu Meresap.</p>
    </div>

    <div class="container">

        <div class="action-bar">
            <a href="/" class="btn-filter active">
                <i class="fas fa-th-large"></i> Semua
            </a>
            <a href="/?kategori=makanan" class="btn-filter">
                <i class="fas fa-utensils"></i> Makanan
            </a>
            <a href="/?kategori=minuman" class="btn-filter">
                <i class="fas fa-glass-water"></i> Minuman
            </a>

            <a href="/saran" class="btn-filter btn-saran">
                <i class="fas fa-comment-dots"></i> Kirim Saran
            </a>
        </div>

        <div class="section-header">
            <div class="section-title">Pilihan Menu</div>
            <div class="section-subtitle">Silakan pilih dan pesan langsung menu favorit Anda.</div>
        </div>

        <div class="menu-grid">
            @forelse($menus as $menu)
                @if(request('kategori') && $menu->kategori != request('kategori'))
                    @continue
                @endif

                <div class="menu-card">
                    <img src="{{ Str::contains($menu->foto_menu, 'images/') ? asset('storage/' . $menu->foto_menu) : asset('images/' . $menu->foto_menu) }}" 
     class="menu-img" 
     alt="{{ $menu->nama_menu }}">

                    <div class="menu-content">
                        <div class="menu-header-row">
                            <div class="menu-title">{{ $menu->nama_menu }}</div>
                            <div class="menu-rating">
                                <i class="fas fa-star"></i> {{ $menu->rating }}
                            </div>
                        </div>

                        <div class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</div>

                        <div class="badges">
                            <span><i class="fas fa-box"></i> Stok: {{ $menu->stok }}</span>
                            <span>• {{ ucfirst($menu->kategori) }}</span>
                        </div>

                        <p class="menu-desc">{{ $menu->deskripsi_menu }}</p>

                        @if(session('loginpelanggan'))
                            @if($menu->stok > 0)
                                <div class="order-area">
                                    <a href="/pesan/langsung/{{ $menu->id_menu }}" class="btn-order" style="display: block; text-align: center; color: white; text-decoration: none;">
                                        Pesan Sekarang
                                    </a>
                                </div>
                            @else
                                <div class="order-area">
                                    <button class="btn-disabled">Stok Habis</button>
                                </div>
                            @endif
                        @else
                            <div class="order-area">
                                <a href="/login-pelanggan" class="btn-disabled" style="text-decoration: none;">Login untuk Memesan</a>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #6b7280;">
                    <i class="fas fa-utensils" style="font-size: 32px; margin-bottom: 10px;"></i>
                    <p>Belum ada menu yang tersedia untuk kategori ini.</p>
                </div>
            @endforelse
        </div>
    </div>

    <footer>
        &copy; 2026 Warung Sate Kambing Pak Yono.
    </footer>

</body>
</html>
