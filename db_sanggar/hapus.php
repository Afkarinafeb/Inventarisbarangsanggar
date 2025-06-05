<?php
$koneksi = new mysqli("localhost", "root", "", "db_sanggar");

$id = $_GET['id'];
$koneksi->query("DELETE FROM peminjaman WHERE id = $id");

header("Location: index.php");
exit;
