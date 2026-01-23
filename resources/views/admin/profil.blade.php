<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - Warung Sate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            margin: 0;
            color: #1e3b2a;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #1e3b22 0%, #102a0f 100%);
            color: #fff;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
            font-size: 20px;
        }

        .navbar .user {
            background: #1e293b;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
            color: #334155;
            text-decoration: none;
            font-size: 14px;
        }

        .back:hover {
            text-decoration: underline;
        }

        h3 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        /* PROFILE CARD */
        .profile-card {
            padding: 20px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: #f9fafb;
        }

        .profile-card p {
            margin: 10px 0;
            font-size: 15px;
        }

        .profile-card strong {
            width: 140px;
            display: inline-block;
            color: #334155;
        }

        /* BUTTONS */
        .actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            color: #fff;
            transition: 0.2s ease;
        }

        .btn-edit {
            background: #0f2a16;
        }

        .btn-edit:hover {
            background: #1e3b2c;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .profile-card strong {
                display: block;
                margin-bottom: 4px;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h2><i class="fas fa-user-circle"></i> Profil Admin</h2>
        <div>{{ session('admin_username') ?? 'Admin' }}</div>
    </div>
    <div class="container">
        <a href="/dashboard" class="back"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
        <h3>Profil {{ session('admin_username') ?? 'Admin' }}</h3>
        <div class="profile-card">
            <p><strong>Username :</strong> {{ session('admin_username') ?? 'admin' }}</p>
            <p><strong>Nomor HP :</strong> {{ session('admin_phone') ?? 'Belum diatur' }}</p>
            <p><strong>Email :</strong> {{ session('admin_email') ?? 'Belum diatur' }}</p>
            <p><strong>Tanggal Dibuat :</strong>
                {{ $admin->created_at ? $admin->created_at->format('d M Y') : 'Kosong' }}
            </p>
            <a href="/dashboard/profil/edit"
                style="display:inline-block;margin-top:10px;background:#0f2a17;color:#fff;padding:8px 12px;border-radius:6px;text-decoration:none">Edit
                Profil</a>
            <a href="/dashboard/daftaradmin"
                style="display:inline-block;margin-top:10px;margin-left:8px;background:#112719;color:#fff;padding:8px 12px;border-radius:6px;text-decoration:none">Daftar
                Admin</a>
        </div>
    </div>
</body>

</html>
