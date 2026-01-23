<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - Warung Sate Pak Yono</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f3f4f6; }

        .navbar {
            background: linear-gradient(135deg, #1e3b22 0%, #102a0f 100%);
            color: #fff;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar h2 { font-size: 24px; }
        .navbar a { color: #fff; text-decoration: none; padding: 8px 16px; border-radius: 4px; }
        .navbar a:hover { background: #1e293b; }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: #0f172a;
            text-decoration: none;
            font-weight: 500;
        }

        .back-btn:hover { color: #334155; }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h3 { color: #0f172a; font-size: 28px; }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #1e3b22;
            color: #fff;
        }

        .btn-primary:hover {
            background: #0f2a16;
        }

        .btn-success {
            background: #10b981;
            color: #fff;
        }

        .btn-success:hover {
            background: #059669;
        }

        .btn-warning {
            background: #f59e0b;
            color: #fff;
        }

        .btn-warning:hover {
            background: #d97706;
        }

        .btn-danger {
            background: #ef4444;
            color: #fff;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        .table-wrapper {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f3f4f6;
            border-bottom: 2px solid #e5e7eb;
        }

        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #1f2937;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
            color: #4b5563;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-diproses {
            background: #bfdbfe;
            color: #1e40af;
        }

        .badge-selesai {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-dibatalkan {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 48px;
            color: #d1d5db;
            margin-bottom: 15px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 25px;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .modal-header {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 15px;
        }

        .modal-body {
            color: #4b5563;
            margin-bottom: 20px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover { color: #000; }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-sm {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2><i class="fas fa-file-invoice"></i> Kelola Pesanan</h2>
    <div style="display: flex; gap: 15px; align-items: center;">
        <span>{{ session('admin_username') ?? 'Admin' }}</span>
        <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<div class="container">
    <a href="/dashboard" class="back-btn"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>

    @if ($message = session('success'))
        <div class="alert alert-success">
            <strong><i class="fas fa-check-circle"></i> Berhasil!</strong> {{ $message }}
        </div>
    @endif

    @if ($message = session('error'))
        <div class="alert alert-error">
            <strong><i class="fas fa-exclamation-circle"></i> Error!</strong> {{ $message }}
        </div>
    @endif

    <div class="header">
        <h3>Daftar Pesanan</h3>
        <a href="/pesanan/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pesanan
        </a>
    </div>

    @if (count($pesananList) > 0)
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>No. HP</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal Pesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesananList as $index => $pesanan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $pesanan->nama_pelanggan }}</strong></td>
                            <td>{{ $pesanan->no_hp }}</td>
                            <td>Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge badge-{{ $pesanan->status }}">
                                    {{ ucfirst($pesanan->status) }}
                                </span>
                            </td>
                            <td>{{ $pesanan->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="/pesanan/{{ $pesanan->id }}" class="btn btn-success btn-sm" title="Lihat Detail">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="/pesanan/{{ $pesanan->id }}/edit" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-danger btn-sm" onclick="openDeleteModal({{ $pesanan->id }}, '{{ $pesanan->nama_pelanggan }}')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="table-wrapper">
            <div class="empty-state">
                <div><i class="fas fa-inbox"></i></div>
                <p><strong>Belum ada pesanan</strong></p>
                <p>Klik tombol "Tambah Pesanan" untuk membuat pesanan baru</p>
            </div>
        </div>
    @endif
</div>

<!-- Modal Delete -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeDeleteModal()">&times;</span>
        <div class="modal-header">
            <i class="fas fa-trash"></i> Hapus Pesanan
        </div>
        <div class="modal-body">
            Apakah Anda yakin ingin menghapus pesanan dari <strong id="deleteName"></strong>?
        </div>
        <div class="modal-footer">
            <button class="btn" style="background: #d1d5db; color: #374151;" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(id, name) {
        document.getElementById('deleteName').textContent = name;
        document.getElementById('deleteForm').action = `/pesanan/${id}/delete`;
        document.getElementById('deleteModal').style.display = 'block';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    }
</script>

</body>
</html>
