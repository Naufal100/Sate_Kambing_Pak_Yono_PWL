<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Warung Sate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            margin: 0;
        }

        .navbar {
            background: linear-gradient(135deg, #1e3b22 0%, #102a0f 100%);
            color: #fff;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between
        }

        .container {
            max-width: 700px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px
        }

        .back {
            display: inline-block;
            margin-bottom: 10px;
            color: #334155;
            text-decoration: none
        }

        .form-row {
            margin-bottom: 12px
        }

        label {
            display: block;
            margin-bottom: 6px
        }

        input[type=text],
        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 6px
        }

        .btn {
            background: #0f172a;
            color: #fff;
            padding: 10px 14px;
            border-radius: 6px;
            border: none;
            cursor: pointer
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h2><i class="fas fa-user-circle"></i> Edit Profil</h2>
        <div>{{ session('admin_username') ?? 'Admin' }}</div>
    </div>
    <div class="container">
        <a href="/dashboard/profil" class="back"><i class="fas fa-arrow-left"></i> Kembali ke Profil</a>

        @if ($errors->any())
            <div style="background:#fee2e2;padding:10px;border-radius:6px;margin-bottom:12px;color:#991b1b">
                <ul style="margin:0;padding-left:18px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/dashboard/profil/update">
            @csrf
            <div class="form-row">
                <label>Username</label>
                <input type="text" name="username" value="{{ old('username', $admin->username ?? '') }}" required>
            </div>
            <div class="form-row">
                <label>Nomor HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $admin->no_hp ?? '') }}">
            </div>
            <div class="form-row">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $admin->email ?? '') }}">
            </div>
            <div class="form-row">
                <label>Password baru (kosongkan jika tidak ingin mengganti)</label>
                <input type="password" name="password" autocomplete="new-password">
            </div>
            <button class="btn" type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>
