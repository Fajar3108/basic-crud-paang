<?php

require '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = (int)$_POST['price'];

    $stmt = $mysqli->prepare('UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?');
    $stmt->bind_param('ssii', $name, $description, $price, $id);
    $stmt->execute();
    $stmt->close();

    header('Location: /index.php');
    exit;
}