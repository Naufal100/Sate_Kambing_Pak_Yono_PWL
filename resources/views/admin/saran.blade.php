<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Saran - Warung Sate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            margin: 0;
            color: #333;
        }

        .navbar {
            background: linear-gradient(135deg, #1e3b22 0%, #102a0f 100%);
            color: #fff;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        .back:hover {
            color: #0f172a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        .user-info {
            font-weight: 600;
            color: #0f172a;
        }

        .user-email {
            font-size: 12px;
            color: #64748b;
        }

        .date {
            font-size: 13px;
            color: #94a3b8;
        }

        .btn-delete {
            background: #fee2e2;
            color: #ef4444;
            border: 1px solid #fecaca;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
            border-color: #ef4444;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #94a3b8;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2><i class="fas fa-comments"></i> Kelola Saran</h2>
        <div><i class="fas fa-user-circle"></i> {{ session('admin_username') ?? 'Admin' }}</div>
    </div>

    <div class="container">
        <a href="/dashboard" class="back"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>

        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <h3 style="margin: 0; color: #1e293b;">Daftar Pesan Masuk</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="25%">Pelanggan</th>
                    <th width="50%">Isi Saran</th>
                    <th width="15%">Tanggal</th>
                    <th width="5%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sarans as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <div class="user-info">{{ $item->pelanggan->username ?? 'User Tidak Dikenal' }}</div>
                        <div class="user-email">{{ $item->pelanggan->email_pelanggan ?? '-' }}</div>
                    </td>
                    <td style="line-height: 1.6;">{{ $item->isi }}</td>
                    <td class="date">{{ $item->created_at->format('d M Y') }}</td>
                    <td>
                        <form action="/dashboard/saran/{{ $item->id_saran }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus saran ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">
                        <i class="fas fa-inbox" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
                        Belum ada saran yang masuk dari pelanggan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>