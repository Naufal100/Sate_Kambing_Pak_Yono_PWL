<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pesanan - Warung Sate</title>
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
            max-width: 800px;
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

        .nota-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .nota-header {
            text-align: center;
            border-bottom: 2px solid #0f172a;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .nota-header h1 {
            color: #0f172a;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .nota-header p {
            color: #6b7280;
            font-size: 14px;
        }

        .nota-number {
            background: #f3f4f6;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nota-number div {
            flex: 1;
        }

        .nota-number strong {
            display: block;
            color: #6b7280;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .nota-number span {
            color: #0f172a;
            font-size: 16px;
            font-weight: 600;
        }

        .nota-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .nota-section {
            flex: 1;
        }

        .nota-section h4 {
            color: #0f172a;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 12px;
            text-transform: uppercase;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 8px;
        }

        .nota-section p {
            color: #4b5563;
            margin-bottom: 8px;
            font-size: 14px;
            line-height: 1.6;
        }

        .nota-section strong {
            color: #1f2937;
        }

        .nota-details {
            background: #f9fafb;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 25px;
            border-left: 4px solid #0f172a;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-row:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0;
        }

        .detail-label {
            color: #6b7280;
            font-weight: 600;
            font-size: 13px;
        }

        .detail-value {
            color: #1f2937;
            font-weight: 600;
            text-align: right;
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

        .catatan-section {
            background: #fffbeb;
            padding: 15px;
            border-radius: 6px;
            border-left: 4px solid #f59e0b;
            margin-bottom: 25px;
        }

        .catatan-section h5 {
            color: #92400e;
            font-size: 13px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .catatan-section p {
            color: #78350f;
            font-size: 14px;
            line-height: 1.5;
        }

        .nota-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 2px solid #e5e7eb;
            color: #6b7280;
            font-size: 12px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #1e3b22;
            color: #fff;
        }

        .btn-primary:hover {
            background: #0f2a16;
        }

        .btn-print {
            background: #3b82f6;
            color: #fff;
        }

        .btn-print:hover {
            background: #2563eb;
        }

        @media print {
            .navbar, .back-btn, .btn-group {
                display: none;
            }

            body {
                background: #fff;
            }

            .container {
                margin: 0;
                padding: 0;
            }

            .nota-container {
                box-shadow: none;
                padding: 0;
            }
        }

        @media (max-width: 600px) {
            .nota-content {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .btn-group {
                flex-direction: column;
            }

            .nota-number {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2><i class="fas fa-receipt"></i> Nota Pesanan</h2>
    <div style="display: flex; gap: 15px; align-items: center;">
        <span>{{ session('admin_username') ?? 'Admin' }}</span>
        <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<div class="container">
    <a href="/dashboard/pesanan" class="back-btn"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Pesanan</a>

    <div class="nota-container">
        <!-- Header Nota -->
        <div class="nota-header">
            <h1><i class="fas fa-file-invoice-dollar"></i> NOTA PESANAN</h1>
            <p>Warung Sate Pak Yono</p>
        </div>

        <!-- Nomor Pesanan & Tanggal -->
        <div class="nota-number">
            <div>
                <strong>Nomor Pesanan</strong>
                <span>#{{ $pesanan->id }}</span>
            </div>
            <div>
                <strong>Tanggal Pesanan</strong>
                <span>{{ $pesanan->created_at->format('d/m/Y') }}</span>
            </div>
            <div>
                <strong>Jam Pesanan</strong>
                <span>{{ $pesanan->created_at->format('H:i') }}</span>
            </div>
            <div>
                <strong>Status</strong>
                <span><span class="badge badge-{{ $pesanan->status }}">{{ ucfirst($pesanan->status) }}</span></span>
            </div>
        </div>

        <!-- Informasi Pelanggan & Pesanan -->
        <div class="nota-content">
            <div>
                <h4><i class="fas fa-user"></i> Informasi Pelanggan</h4>
                <p><strong>Nama:</strong> {{ $pesanan->nama_pelanggan }}</p>
                <p><strong>No. HP:</strong> {{ $pesanan->no_hp }}</p>
                <p><strong>Alamat:</strong></p>
                <p style="margin-left: 0; white-space: pre-wrap;">{{ $pesanan->alamat }}</p>
            </div>
            <div>
                <h4><i class="fas fa-info-circle"></i> Detail Pesanan</h4>
                <p><strong>Total Harga:</strong> Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
                <p><strong>Status Pesanan:</strong> {{ ucfirst($pesanan->status) }}</p>
                <p><strong>Dibuat pada:</strong> {{ $pesanan->created_at->format('d-m-Y H:i:s') }}</p>
                @if($pesanan->updated_at && $pesanan->updated_at != $pesanan->created_at)
                    <p><strong>Diperbarui:</strong> {{ $pesanan->updated_at->format('d-m-Y H:i:s') }}</p>
                @endif
            </div>
        </div>

        <!-- Rincian Pembayaran -->
        <div class="nota-details">
            <div class="detail-row">
                <span class="detail-label">Subtotal</span>
                <span class="detail-value">Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
            </div>
            <div class="detail-row" style="font-size: 16px; padding-top: 12px; border-top: 2px solid #d1d5db;">
                <span class="detail-label">Total Pesanan</span>
                <span class="detail-value">Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Pak Yono - Catatan Pesanan -->
        @if($pesanan->catatan)
            <div class="catatan-section">
                <h5><i class="fas fa-sticky-note"></i> Catatan</h5>
                <p>{{ $pesanan->catatan }}</p>
            </div>
        @endif

        <!-- Footer -->
        <div class="nota-footer">
            <p>Terima kasih telah berbelanja di Warung Sate Pak Yono</p>
            <p>Dicetak pada: {{ now()->format('d-m-Y H:i:s') }}</p>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="btn-group">
        <a href="/dashboard/pesanan" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="/pesanan/{{ $pesanan->id }}/edit" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit Pesanan
        </a>
        <button onclick="window.print()" class="btn btn-print">
            <i class="fas fa-print"></i> Print Nota
        </button>
    </div>
</div>

</body>
</html>
