<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #preview {
            max-width: 150px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Tambah Menu</h1>

    <form action="/dashboard/menu" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?= csrf_token() ?>">

        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select">
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi_menu" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto_menu" class="form-control" id="foto_menu">
            <img id="preview" src="#" alt="Preview Foto" style="display:none;">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/dashboard/menu" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
    const inputFoto = document.getElementById('foto_menu');
    const preview = document.getElementById('preview');

    inputFoto.addEventListener('change', function(){
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                preview.setAttribute('src', e.target.result);
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
</body>
</html>
