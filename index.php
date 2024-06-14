<?php
require 'database/database.php';

$result = $mysqli->query('SELECT * FROM products');
?>

<?php include_once "layouts/header.php" ?>
<div class="header">
    <h1>Welcome to Super Market</h1>
    <a href="<?= $baseURL ?>create.php" class="btn">Tambah Produk</a>
</div>

<table border="">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($product = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($product['id']) ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= htmlspecialchars($product['description']) ?></td>
            <td>Rp<?= number_format((int)$product['price']) ?></td>
            <td>
                <a href="<?= $baseURL ?>edit.php?id=<?= $product['id'] ?>" class="btn">Edit</a>
                <a href="<?= $baseURL ?>controllers/delete-product.php?id=<?= $product['id'] ?>" class="btn">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php include_once "layouts/footer.php" ?>
