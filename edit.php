<?php include_once "layouts/header.php" ?>

<?php
require "./database/database.php";

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = (int)$_POST['price'];

    $stmt = $mysqli->prepare('UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?');
    $stmt->bind_param('ssii', $name, $description, $price, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: $baseURL");
    exit;
}

?>

<h1 class="title">Tambah Produk</h1>
<a href="/">Kembali</a>

<form method="POST" action="">
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