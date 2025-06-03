<?php
$koneksi = new mysqli("localhost", "root", "", "dbsanggar");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $koneksi->prepare("INSERT INTO peminjaman (nama_peminjam, sekolah, nama_barang, jumlah, kondisi, tanggal_pinjam, tanggal_kembali) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $_POST['nama'], $_POST['sekolah'], $_POST['barang'], $_POST['jumlah'], $_POST['kondisi'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4" style="max-width: 600px;">
  <h3 class="text-center mb-4">Tambah Data Peminjaman</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Sekolah</label>
      <input type="text" name="sekolah" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nama Barang</label>
      <input type="text" name="barang" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Kondisi</label>
      <input type="text" name="kondisi" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tanggal Pinjam</label>
      <input type="date" name="tgl_pinjam" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tanggal Kembali</label>
      <input type="date" name="tgl_kembali" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
