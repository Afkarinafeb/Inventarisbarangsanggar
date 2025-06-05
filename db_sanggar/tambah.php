<?php
require 'config.php';
require 'cek_login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_peminjam    = $_POST['nama_peminjam'] ?? '';
    $sekolah          = $_POST['sekolah'] ?? '';
    $tanggal_pinjam   = $_POST['tanggal_pinjam'] ?? '';
    $jumlah           = $_POST['jumlah'] ?? 0;
    $nama_barang      = $_POST['nama_barang'] ?? '';
    $kondisi          = $_POST['kondisi'] ?? '';
    $tanggal_kembali  = $_POST['tanggal_kembali'] ?? '';
    $id_petugas       = $_SESSION['id_petugas'] ?? null;

    if ($nama_peminjam && $sekolah && $tanggal_pinjam && $jumlah > 0 && $nama_barang && $kondisi && $tanggal_kembali && $id_petugas) {
        $stmt = $conn->prepare("INSERT INTO peminjaman 
            (nama_peminjam, sekolah, tanggal_pinjam, jumlah, nama_barang, kondisi, tanggal_kembali, id_petugas) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisssi", $nama_peminjam, $sekolah, $tanggal_pinjam, $jumlah, $nama_barang, $kondisi, $tanggal_kembali, $id_petugas);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan data: " . $stmt->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Mohon isi semua data dengan benar.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body class="container mt-5">
    <h2>Tambah Data Peminjaman</h2>
    <form method="post" action="tambah.php">
        <div class="mb-3">
            <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" required>
        </div>
        <div class="mb-3">
            <label for="sekolah" class="form-label">Sekolah</label>
            <input type="text" class="form-control" id="sekolah" name="sekolah" required>
        </div>
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
        </div>
        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi Barang</label>
            <input type="text" class="form-control" id="kondisi" name="kondisi" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
