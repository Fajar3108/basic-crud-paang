<?php

require "../database/database.php";

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
    header('Location: /index.php');
    exit;
}