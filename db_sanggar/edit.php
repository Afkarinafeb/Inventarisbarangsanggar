<?php
$koneksi = new mysqli("localhost", "root", "", "db_sanggar");

$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM peminjaman WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $koneksi->prepare("UPDATE peminjaman SET nama_peminjam=?, sekolah=?, nama_barang=?, jumlah=?, kondisi=?, tanggal_pinjam=?, tanggal_kembali=? WHERE id=?");
    $stmt->bind_param("sssssssi", $_POST['nama'], $_POST['sekolah'], $_POST['barang'], $_POST['jumlah'], $_POST['kondisi'], $_POST['tgl_pinjam'], $_POST['tgl_kembali'], $id);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Data Peminjaman</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4" style="max-width: 600px;">
  <h3 class="text-center mb-4">Edit Data Peminjaman</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama_peminjam']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Sekolah</label>
      <input type="text" name="sekolah" class="form-control" value="<?= htmlspecialchars($data['sekolah']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Nama Barang</label>
      <input type="text" name="barang" class="form-control" value="<?= htmlspecialchars($data['nama_barang']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" value="<?= htmlspecialchars($data['jumlah']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Kondisi</label>
      <input type="text" name="kondisi" class="form-control" value="<?= htmlspecialchars($data['kondisi']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Tanggal Pinjam</label>
      <input type="date" name="tgl_pinjam" class="form-control" value="<?= htmlspecialchars($data['tanggal_pinjam']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Tanggal Kembali</label>
      <input type="date" name="tgl_kembali" class="form-control" value="<?= htmlspecialchars($data['tanggal_kembali']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
