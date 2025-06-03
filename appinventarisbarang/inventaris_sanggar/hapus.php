<?php
$koneksi = new mysqli("localhost", "root", "", "dbsanggar");

$id = $_GET['id'];
$koneksi->query("DELETE FROM peminjaman WHERE id = $id");

header("Location: index.php");
exit;
