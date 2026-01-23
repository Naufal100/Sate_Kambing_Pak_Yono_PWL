<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Warung Sate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1eeb81 0%, #3e824a 100%);
            min-height: 100vh;
            color: #333;
        }

        .navbar {
            background: linear-gradient(135deg, #1e3b22 0%, #102a0f 100%);
            color: white;
            padding: 20px 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 28px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
        }

        .container {
            padding: 40px 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .welcome-section {
            background: linear-gradient(135deg, #ffffff 0%, #cfcfcf 100%);
            color: rgb(0, 94, 11);
            padding: 40px;
            border-radius: 12px;
            margin-bottom: 40px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .welcome-section h3 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .welcome-section p {
            font-size: 16px;
            opacity: 0.95;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #667eea;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .stat-card h4 {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #1e293b;
        }

        .menu-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .menu-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #333;
            border: 2px solid transparent;
        }

        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            border-color: #667eea;
        }

        .menu-icon {
            font-size: 48px;
            margin-bottom: 15px;
            color: #66ea94;
        }

        .menu-card h4 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #1e293b;
        }

        .menu-card p {
            font-size: 13px;
            color: #64748b;
        }

        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: white;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            font-size: 28px;
        }

        .footer {
            text-align: center;
            padding: 30px;
            color: white;
            margin-top: 50px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .container {
                padding: 20px 15px;
            }

            .welcome-section {
                padding: 25px;
            }

            .welcome-section h3 {
                font-size: 24px;
            }

            .stats-grid,
            .menu-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2><i class="fas fa-chart-line"></i> Dashboard Admin</h2>
    <div class="navbar-user">
        <span>{{ session('admin_username') ?? 'Admin' }}</span>
        <a href="/logout" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<div class="container">
    <!-- Selamat Datang -->
    <div class="welcome-section">
        <h3><i class="fas fa-hand-wave"></i> Selamat Datang, {{ session('admin_username') ?? 'Admin' }}!</h3>
        <p>Anda berhasil login sebagai {{ session('admin_username') ?? 'Admin' }}. Kelola warung sate Anda dengan mudah dan efisien.</p>
    </div>

    <!-- Statistik -->
    <div class="section-title">
        <i class="fas fa-bar-chart"></i> Menu Pintasan
    </div>
    <div class="stats-grid">
        <a href="/" class="menu-card">
            <div class="menu-icon">
                <i class="fas fa-house"></i>
            </div>
            <h4>Menu Utama</h4>
            <p>Masuk ke halaman menu utama</p>
        </a>



        <a href="/dashboard/pelanggan" class="menu-card">
            <div class="menu-icon">
                <i class="fas fa-users"></i>
            </div>
            <h4>Kelola Pelanggan</h4>
            <p>Lihat data pelanggan terdaftar</p>
        </a>


    </div>

    <!-- Menu -->
    <div class="section-title">
        <i class="fas fa-list"></i> Menu Utama
    </div>
    <div class="menu-section">
        <a href="/dashboard/menu" class="menu-card">
            <div class="menu-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <h4>Kelola Menu</h4>
            <p>Tambah, ubah, atau hapus menu makanan</p>
        </a>

        <a href="/dashboard/pesanan" class="menu-card">
            <div class="menu-icon">
                <i class="fas fa-file-invoice"></i>
            </div>
            <h4>Kelola Pesanan</h4>
            <p>Kelola Pesanan Pelanggan</p>
        </a>

        <a href="/dashboard/saran" class="menu-card">
            <div class="menu-icon">
                <i class="fas fa-gift"></i>
            </div>
            <h4>Kelola Saran</h4>
            <p>Kelola Saran yang telah Diberikan oleh Pelanggan</p>
        </a>

        <a href="/dashboard/profil" class="menu-card">
            <div class="menu-icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <h4>Profil</h4>
            <p>Kelola profil dan password Anda</p>
        </a>
    </div>
</div>

<div class="footer">
    <p>&copy; 2026 Warung Sate Kambing Pak Yono. Semua hak cipta dilindungi.</p>
</div>

</body>
</html>
