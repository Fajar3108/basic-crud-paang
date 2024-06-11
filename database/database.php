<?php
// Melakukan koneksi ke database

$host = 'localhost';
$db = 'basic_crud_php'; // nama database
$user = 'root';
$pass = '';

// koneksi ke database dengan fungsi mysqli
$mysqli = new mysqli($host, $user, $pass, $db);

// Jika koneksi ke database error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>