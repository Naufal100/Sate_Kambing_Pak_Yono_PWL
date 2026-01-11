<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Saran - Warung Sate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f3f4f6; margin:0; }
        .navbar{background:#0f172a;color:#fff;padding:18px 30px;display:flex;justify-content:space-between}
        .container{max-width:1100px;margin:30px auto;padding:20px;background:#fff;border-radius:8px}
        .back{display:inline-block;margin-bottom:10px;color:#334155;text-decoration:none}
    </style>
</head>
<body>
<div class="navbar">
    <h2><i class="fas fa-comments"></i> Kelola Saran</h2>
    <div>{{ session('admin_username') ?? 'Admin' }}</div>
</div>
<div class="container">
    <a href="/dashboard" class="back"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
    <h3>Daftar Saran</h3>
    <p>Halaman untuk melihat dan merespon saran dari pelanggan.</p>
</div>
</body>
</html>
