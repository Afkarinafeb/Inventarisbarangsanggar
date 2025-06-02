<?php
$host = "localhost";      // Nama host
$user = "root";           // Username MySQL
$pass = "";               // Password MySQL (kosongkan jika default)
$db   = "dbsanggar";      // Nama database

$koneksi = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>
