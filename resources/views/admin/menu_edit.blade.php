<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
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
    <h1>Edit Menu</h1>

    <form action="/dashboard/menu/<?= $menu->id_menu ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?= csrf_token() ?>">
        <input type="hidden" name="_method" value="PUT">

        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" value="<?= $menu->nama_menu ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select">
                <option value="makanan" <?= $menu->kategori == 'makanan' ? 'selected' : '' ?>>Makanan</option>
                <option value="minuman" <?= $menu->kategori == 'minuman' ? 'selected' : '' ?>>Minuman</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= $menu->harga ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $menu->stok ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi_menu" class="form-control"><?= $menu->deskripsi_menu ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto_menu" class="form-control" id="foto_menu">
            <?php if($menu->foto_menu): ?>
                <img id="preview" src="/storage/<?= $menu->foto_menu ?>" class="img-thumbnail mt-2">
            <?php else: ?>
                <img id="preview" src="#" style="display:none;">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
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
