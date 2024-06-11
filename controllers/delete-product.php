<?php
require '../database/database.php';

$id = (int)$_GET['id'];

$stmt = $mysqli->prepare('DELETE FROM products WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

header('Location: /index.php');
exit;
?>