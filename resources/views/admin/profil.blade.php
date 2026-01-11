<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - Warung Sate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f3f4f6; margin:0; }
        .navbar{background:#0f172a;color:#fff;padding:18px 30px;display:flex;justify-content:space-between}
        .container{max-width:1100px;margin:30px auto;padding:20px;background:#fff;border-radius:8px}
        .back{display:inline-block;margin-bottom:10px;color:#334155;text-decoration:none}
        .profile-card{padding:15px;border:1px solid #e2e8f0;border-radius:8px}
    </style>
</head>
<body>
<div class="navbar">
    <h2><i class="fas fa-user-circle"></i> Profil Admin</h2>
    <div>{{ session('admin_username') ?? 'Admin' }}</div>
</div>
<div class="container">
    <a href="/dashboard" class="back"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
    <h3>Profil</h3>
    <div class="profile-card">
        <p><strong>Username:</strong> {{ session('admin_username') ?? 'admin' }}</p>
        <p><strong>Email:</strong> admin@example.com</p>
        <p>Di sini Anda dapat memperbarui informasi profil dan mengganti password.</p>
    </div>
</div>
</body>
</html>
