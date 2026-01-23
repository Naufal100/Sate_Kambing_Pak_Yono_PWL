<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pesanan - Warung Pak Yono Sate</title>
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
            max-width: 600px;
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

        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .form-container h3 {
            color: #0f172a;
            font-size: 24px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="tel"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        input[type="tel"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #0f172a;
            box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .required {
            color: #ef4444;
        }

        .form-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-submit {
            background: #0f172a;
            color: #fff;
        }

        .btn-submit:hover {
            background: #1e293b;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-cancel:hover {
            background: #d1d5db;
        }

        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #ef4444;
        }

        .error-list {
            list-style: none;
            padding-left: 0;
        }

        .error-list li {
            margin: 5px 0;
        }

        .error-list li:before {
            content: "• ";
            margin-right: 10px;
        }

        .input-error {
            border-color: #ef4444 !important;
        }

        .input-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        @media (max-width: 600px) {
            .input-group {
                grid-template-columns: 1fr;
            }

            .form-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2><i class="fas fa-plus-circle"></i> Tambah Pesanan</h2>
    <div style="display: flex; gap: 15px; align-items: center;">
        <span>{{ session('admin_username') ?? 'Admin' }}</span>
        <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

<div class="container">
    <a href="/dashboard/pesanan" class="back-btn"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Pesanan</a>

    <div class="form-container">
        <h3>Form Tambah Pesanan Baru</h3>

        @if ($errors->any())
            <div class="error-message">
                <strong><i class="fas fa-exclamation-circle"></i> Terjadi Kesalahan!</strong>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/pesanan">
            @csrf

            <div class="input-group">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan <span class="required">*</span></label>
                    <input
                        type="text"
                        id="nama_pelanggan"
                        name="nama_pelanggan"
                        placeholder="Masukkan nama pelanggan"
                        value="{{ old('nama_pelanggan') }}"
                        class="@error('nama_pelanggan') input-error @enderror"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="no_hp">No. HP <span class="required">*</span></label>
                    <input
                        type="tel"
                        id="no_hp"
                        name="no_hp"
                        placeholder="08xxx..."
                        value="{{ old('no_hp') }}"
                        class="@error('no_hp') input-error @enderror"
                        required
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat <span class="required">*</span></label>
                <textarea
                    id="alamat"
                    name="alamat"
                    placeholder="Masukkan alamat pelanggan"
                    class="@error('alamat') input-error @enderror"
                    required
                >{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="total_harga">Total Harga <span class="required">*</span></label>
                <input
                    type="number"
                    id="total_harga"
                    name="total_harga"
                    placeholder="0"
                    value="{{ old('total_harga', 0) }}"
                    class="@error('total_harga') input-error @enderror"
                    step="0.01"
                    min="0"
                    required
                >
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea
                    id="catatan"
                    name="catatan"
                    placeholder="Catatan tambahan (opsional)"
                    class="@error('catatan') input-error @enderror"
                >{{ old('catatan') }}</textarea>
            </div>

            <div class="form-buttons">
                <a href="/dashboard/pesanan" class="btn btn-cancel">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save"></i> Simpan Pesanan
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
