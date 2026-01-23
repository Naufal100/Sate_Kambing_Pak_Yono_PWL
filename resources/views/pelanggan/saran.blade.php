<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saran & Masukan - Sate Pak Yono</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #f97316;
            --primary-hover: #ea580c;
            --bg: #f9fafb;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: var(--bg);
            color: #333; margin: 0;
            padding-top: 80px;
        }
        .navbar {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 15px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
            display: flex;
            justify-content: center;
        }
        .nav-inner {
            width: 100%;
            max-width: 900px;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand {
            font-size: 20px;
            font-weight: bold;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        .back-link {
            text-decoration: none;
            color: #6b7280;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 25px; font-weight: 500;
        }
        .back-link:hover {
            color: var(--primary);
        }
        .form-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        h3 {
            margin-top: 0;
            color: #1f2937;
        }
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-family: inherit;
            margin: 10px 0;
            min-height: 100px;
            box-sizing: border-box;
            resize: vertical;
        }
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            ring: 2px solid #fdba74;
        }
        .btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.2s;
        }
        .btn:hover {
            background: var(--primary-hover);
        }
        .saran-list {
            display: grid;
            gap: 15px;
        }
        .saran-item {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }
        .saran-date {
            font-size: 12px;
            color: #9ca3af;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .saran-content {
            color: #374151;
            line-height: 1.5;
            white-space: pre-wrap;
        }
        .actions {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed #e5e7eb;
            display: flex;
            gap: 10px;
        }
        .btn-act {
            background: none;
            border: none;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .edit {
            color: #f59e0b;
        }
        .del {
            color: #ef4444;
        }

        .edit-form {
            display: none;
            margin-top: 10px;
        }
        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            background: #ecfdf5;
            color: #064e3b;
            border: 1px solid #a7f3d0;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-inner">
        <a href="/" class="brand"><i class="fas fa-fire"></i> Sate Pak Yono</a>
        <span><i class="fas fa-user"></i> {{ session('pelanggan_username') }}</span>
    </div>
</nav>

<div class="container">
    <a href="/" class="back-link"><i class="fas fa-arrow-left"></i> Kembali ke Menu Utama</a>

    @if(session('success'))
        <div class="alert"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
    @endif

    <div class="form-card">
        <h3><i class="far fa-pen-to-square"></i> Tulis Masukan Anda</h3>
        <p style="color: #6b7280; font-size: 14px;">Kritik dan saran Anda membantu kami berkembang.</p>
        <form action="/saran" method="POST">
            @csrf
            <textarea name="isi" placeholder="Contoh: Rasa sate sudah enak, tapi pelayanan agak lama..." required></textarea>
            <button type="submit" class="btn">Kirim Masukan</button>
        </form>
    </div>

    <h3>Riwayat Masukan Saya</h3>
    <div class="saran-list">
        @forelse($sarans as $s)
        <div class="saran-item">
            <div class="saran-date">
                <i class="far fa-clock"></i> {{ $s->created_at->format('d M Y') }}
            </div>

            <div id="display-{{ $s->id_saran }}" class="saran-content">{{ $s->isi }}</div>

            <div id="form-{{ $s->id_saran }}" class="edit-form">
                <form action="/saran/{{ $s->id_saran }}" method="POST">
                    @csrf @method('PUT')
                    <textarea name="isi" required>{{ $s->isi }}</textarea>
                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn" style="padding: 8px 16px; font-size: 13px;">Simpan</button>
                        <button type="button" onclick="toggleEdit({{ $s->id_saran }})" style="padding: 8px 16px; border: 1px solid #d1d5db; background: white; border-radius: 6px; cursor: pointer;">Batal</button>
                    </div>
                </form>
            </div>

            <div class="actions">
                <button class="btn-act edit" onclick="toggleEdit({{ $s->id_saran }})">
                    <i class="fas fa-pencil-alt"></i> Edit
                </button>
                <form action="/saran/{{ $s->id_saran }}" method="POST" onsubmit="return confirm('Hapus saran ini?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-act del">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div style="text-align: center; color: #9ca3af; padding: 30px;">
            <i class="far fa-comment-dots" style="font-size: 32px; margin-bottom: 10px;"></i><br>
            Belum ada saran yang dikirim.
        </div>
        @endforelse
    </div>
</div>

<script>
    function toggleEdit(id) {
        var display = document.getElementById('display-' + id);
        var form = document.getElementById('form-' + id);

        if (form.style.display === 'block') {
            form.style.display = 'none';
            display.style.display = 'block';
        } else {
            form.style.display = 'block';
            display.style.display = 'none';
        }
    }
</script>

</body>
</html>
