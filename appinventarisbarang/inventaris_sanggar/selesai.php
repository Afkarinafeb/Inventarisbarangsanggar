<?php
include 'config.php';

$id = $_GET['id'];
$koneksi->query("UPDATE peminjaman SET status = 'selesai' WHERE id = $id");

header("Location: index.php");
exit;
