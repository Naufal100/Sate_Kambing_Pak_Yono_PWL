<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pelanggan - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>

        * { box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f1f5f9;
            margin: 0;
            color: #334155;
        }


        .navbar {
            background: linear-gradient(135deg, #1e3b22 0%, #102a0f 100%);
            color: #fff;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .navbar h2 { margin: 0; font-size: 1.25rem; font-weight: 600; }
        .navbar div { font-size: 0.95rem; opacity: 0.9; }


        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }


        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.2s;
        }
        .back:hover { color: #0f172a; }


        h3 {
            margin-top: 0;
            margin-bottom: 25px;
            color: #1e293b;
            font-size: 1.5rem;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 15px;
        }


        .table-responsive { overflow-x: auto; }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
        }
        th {
            background: #f8fafc;
            color: #475569;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 12px 16px;
            border-bottom: 2px solid #e2e8f0;
            text-align: left;
        }
        td {
            padding: 12px 16px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
            color: #334155;
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background-color: #f8fafc; }


        .action-group {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            font-family: inherit;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
            line-height: 1;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .btn-edit {
            background: #f59e0b;
        }
        .btn-edit:hover {
            background: #d97706;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(245, 158, 11, 0.3);
        }

        .btn-delete {
            background: #ef4444;
        }
        .btn-delete:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(239, 68, 68, 0.3);
        }


        .alert {
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

    </style>
</head>
<body>

<div class="navbar">
    <h2><i class="fas fa-users"></i> Data Pelanggan</h2>
    <div>{{ session('admin_username') ?? 'Admin' }}</div>
</div>

<div class="container">
    <a href="/dashboard" class="back"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>

    <h3>Daftar Pelanggan Terdaftar</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="20%">Username</th>
                    <th width="25%">Email</th>
                    <th width="20%">No HP</th>
                    <th width="15%">Tanggal Daftar</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pelanggan as $p)
                    <tr>
                        <td>{{ $p->id_user }}</td>
                        <td style="font-weight: 500;">{{ $p->username }}</td>
                        <td>{{ $p->email_pelanggan }}</td>
                        <td>{{ $p->no_tlp ?? '-' }}</td>
                        <td>{{ $p->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="action-group">
                                <a href="/dashboard/pelanggan/{{ $p->id_user }}/edit" class="btn-action btn-edit" title="Edit Data">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="/dashboard/pelanggan/{{ $p->id_user }}/delete" method="POST" style="margin:0;" onsubmit="return confirm('Yakin ingin menghapus pelanggan {{ $p->username }}? Data tidak bisa dikembalikan.');">
                                    @csrf
                                    <button type="submit" class="btn-action btn-delete" title="Hapus Data">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center; padding: 30px; color: #94a3b8;">
                            <i class="fas fa-folder-open" style="font-size: 24px; margin-bottom: 10px; display:block;"></i>
                            Belum ada pelanggan terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
