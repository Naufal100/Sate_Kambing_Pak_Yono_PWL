<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan - Warung Sate Pak Yono</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #f97316;
            --primary-hover: #ea580c;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --radius: 12px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-body);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-main);
            padding: 20px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: var(--radius);
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 420px;
            border: 1px solid white;
        }

        .card-header { text-align: center; margin-bottom: 30px; }

        h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .subtitle { font-size: 14px; color: var(--text-muted); }

        .form-group { margin-bottom: 20px; }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-main);
            font-weight: 500;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            color: var(--text-main);
            transition: all 0.2s ease;
            background: #fff;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.15);
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }

        .btn:hover {
            background: var(--primary-hover);
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);
        }

        .btn:active { transform: scale(0.98); }

        .link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: var(--text-muted);
            padding-top: 20px;
            border-top: 1px dashed var(--border-color);
        }

        .link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .link a:hover { color: var(--primary-hover); text-decoration: underline; }

        .brand-icon {
            font-size: 40px;
            color: var(--primary);
            margin-bottom: 15px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-fire-flame-curved brand-icon"></i>
            <h2>Buat Akun Baru</h2>
            <div class="subtitle">Bergabunglah untuk menikmati Sate Pak Yono</div>
        </div>

        <form action="/register-pelanggan" method="POST">
            @csrf
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Cth: budisantoso" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="nama@email.com" required>
            </div>
            <div class="form-group">
                <label>Nomor HP (WhatsApp)</label>
                <input type="text" name="no_hp" placeholder="0812..." required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn">Daftar Sekarang</button>
        </form>

        <div class="link">
            Sudah punya akun? <a href="/login-pelanggan">Login disini</a>
        </div>
    </div>
</body>
</html>
