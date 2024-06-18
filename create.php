<?php include_once "layouts/header.php" ?>

<?php
require "./database/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    // mempersiapkan query ke database
    $stmt = $mysqli->prepare('INSERT INTO products (name, description, price) VALUES (?, ?, ?)');
    // memasukkan data ke query
    $stmt->bind_param('ssi', $name, $description, $price);
    // eksekusi query
    $stmt->execute();
    // menutup koneksi ke database
    $stmt->close();

    // redirect ke halaman index.php
    header("Location: $baseURL");
    exit;
}
?>

<h1 class="title">Tambah Produk</h1>
<a href="/">Kembali</a>

<form method="POST" action="">
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