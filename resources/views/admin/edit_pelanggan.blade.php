<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI',
            sans-serif;
            background:#f3f4f6;
            margin:0; }
        .navbar{
            background: linear-gradient(135deg, #1e3b22 0%, #102a0f 100%);
            color:#fff;
            padding:18px 30px;
            display:flex;
            justify-content:space-between}
        .container{
            max-width:700px;
            margin:30px auto;
            padding:20px;
            background:#fff;
            border-radius:8px}
        .back{
            display:inline-block;
            margin-bottom:10px;
            color:#334155;
            text-decoration:none
        }
        .form-row{
            margin-bottom:12px
        }
        label{
            display:block;
            margin-bottom:6px;
            font-weight: 500;
            color: #334155;}
        input[type=text],
        input[type=email],
        input[type=password]{
            width:100%;
            padding:10px;
            border:1px solid #e2e8f0;
            border-radius:6px;
            box-sizing: border-box;}
        .btn{
            background:#0f172a;
            color:#fff;
            padding:10px 14px;
            border-radius:6px;
            border:none;
            cursor:pointer; font-size: 14px;}
        .btn:hover{
            background:#1e293b;
        }

        .error-list {
            background:#fee2e2;
            padding:10px;
            border-radius:6px;
            margin-bottom:12px;
            color:#991b1b;
        }
        .error-list ul {
            margin:0;
            padding-left:18px;
        }
    </style>
</head>
<body>
<div class="navbar">
    <h2><i class="fas fa-user-edit"></i> Edit Pelanggan</h2>
    <div>{{ session('admin_username') ?? 'Admin' }}</div>
</div>

<div class="container">
    <a href="/dashboard/pelanggan" class="back"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Pelanggan</a>

    @if ($errors->any())
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/dashboard/pelanggan/{{ $pelanggan->id_user }}/update">
        @csrf

        <div class="form-row">
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username', $pelanggan->username) }}" required>
        </div>

        <div class="form-row">
            <label>Email Pelanggan</label>
            <input type="email" name="email" value="{{ old('email', $pelanggan->email_pelanggan) }}" required>
        </div>

        <div class="form-row">
            <label>Nomor HP (WhatsApp)</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $pelanggan->no_tlp) }}">
        </div>

        <div class="form-row">
            <label>Password Baru (Opsional)</label>
            <input type="password" name="password" placeholder="Isi hanya jika ingin mereset password pelanggan">
            <small style="color: #64748b;">Biarkan kosong jika tidak ingin mengganti password.</small>
        </div>

        <button class="btn" type="submit"><i class="fas fa-save"></i> Simpan Perubahan</button>
    </form>
</div>
</body>
</html>
