<?php
require "./database/database.php";
$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();
?>

<?php include_once "layouts/header.php" ?>
<h1 class="title">Tambah Produk</h1>
<a href="/">Kembali</a>

<form method="POST" action="<?= $baseURL ?>controllers/edit-product.php?id=<?= $id ?>">
    <div class="form-group">
        <label for="name">Nama Produk</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($product['name']) ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea name="description" id="description" required><?= htmlspecialchars($product['description']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="price">Harga</label>
        <input type="number" name="price" id="price" value="<?= (int)$product['price'] ?>" required>
    </div>

    <button type="submit" class="btn">Update</button>
</form>
<?php include_once "layouts/footer.php" ?>
