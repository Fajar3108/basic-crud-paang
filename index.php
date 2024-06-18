<?php include_once "layouts/header.php" ?>

<?php
require 'database/database.php';

$result = $mysqli->query('SELECT * FROM products');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_GET['id'];

    $stmt = $mysqli->prepare('DELETE FROM products WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();

    header("Location: $baseURL");
    exit;
}
?>

<div class="header">
    <h1>Welcome to Super Market</h1>
    <a href="<?= $baseURL ?>/create.php" class="btn">Tambah Produk</a>
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
        <?php while ($product = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= htmlspecialchars($product['id']) ?></td>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['description']) ?></td>
                <td>Rp<?= number_format((int)$product['price']) ?></td>
                <td>
                    <a href="<?= $baseURL ?>/edit.php?id=<?= $product['id'] ?>" class="btn">Edit</a>
                    <form method="POST" action="?id=<?= $product['id'] ?>" style="border: none; padding: 0; margin: 0; display: inline-block">
                        <button class="btn" type="submit" style="cursor: pointer;">Delete</button>
                    </form>

                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php include_once "layouts/footer.php" ?>