<?php include_once "layouts/header.php" ?>
    <h1 class="title">Tambah Produk</h1>
    <a href="/">Kembali</a>

    <form method="POST" action="<?= $baseURL ?>//controllers/create-product.php">
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" required>
        </div>

        <button type="submit" class="btn">Create</button>
    </form>
<?php include_once "layouts/footer.php" ?>