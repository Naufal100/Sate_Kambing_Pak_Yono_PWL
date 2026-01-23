<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin - Warung Sate</title>
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
            max-width: 1100px;
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

        table {
            width: 100%;
            border-collapse: collapse
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left
        }

        th {
            background: #f8fafc
        }

        .actions a {
            margin-right: 8px;
            color: #0f172a;
            text-decoration: none
        }

        .btn-action {
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-delete {
            background: #ef4444;
        }
        .btn-delete:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(239, 68, 68, 0.3);
        }

    </style>
</head>

<body>
    <div class="navbar">
        <h2><i class="fas fa-users"></i> Daftar Admin</h2>
        <div>{{ session('admin_username') ?? 'Admin' }}</div>
    </div>
    <div class="container">
        <a href="/dashboard" class="back"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
            <p style="margin:0">Berikut adalah daftar akun admin yang sudah terdaftar.</p>
            <a href="/dashboard/admins/create"
                style="background:#0f2a18;color:#fff;padding:8px 12px;border-radius:6px;text-decoration:none">Tambah
                Admin</a>
        </div>

        @if (session('success'))
            <div style="background:#d1fae5;padding:10px;border-radius:6px;margin-bottom:12px;color:#065f46">
                {{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div style="background:#fee2e2;padding:10px;border-radius:6px;margin-bottom:12px;color:#991b1b">
                {{ session('error') }}</div>
        @endif


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admins as $a)
                    <tr>
                        <td>{{ $a->id_admin }}</td>
                        <td>{{ $a->username }}</td>
                        <td>{{ $a->email ?? '-' }}</td>
                        <td>{{ $a->no_hp ?? '-' }}</td>
                        <td>{{ $a->created_at ? $a->created_at->format('d M Y') : '-' }}</td>
                        <td class="actions">
                            <form method="POST" action="/dashboard/admins/{{ $a->id_admin }}/delete"
                                style="display:inline" onsubmit="return confirm('Hapus admin {{ $a->username }}?');">
                                @csrf
                                <button type="submit" class="btn-action btn-delete"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada admin terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
