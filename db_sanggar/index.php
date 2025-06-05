<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

$koneksi = new mysqli("localhost", "root", "", "db_sanggar");

$perPage = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $perPage;
$totalData = $koneksi->query("SELECT COUNT(*) as total FROM peminjaman WHERE status = 'dipinjam'")->fetch_assoc()['total'];
$totalPages = ceil($totalData / $perPage);
$data = $koneksi->query("SELECT * FROM peminjaman WHERE status = 'dipinjam' LIMIT $start, $perPage");
$no = $start + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Peminjaman Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f1f3f5;
      font-family: 'Segoe UI', sans-serif;
    }
    .container-box {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      margin-top: 20px;
    }
    h3 {
      font-weight: 600;
    }
    .table th {
      background-color: #343a40;
      color: white;
      text-align: center;
    }
    .table td {
      vertical-align: middle;
    }
    .btn {
      border-radius: 8px;
    }
    .btn-sm i {
      margin-right: 5px;
    }
    .pagination .page-link {
      border-radius: 8px;
      margin: 0 3px;
    }
    .btn-add, .btn-history {
      margin-left: 10px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="d-flex justify-content-end mt-4 mb-3">
    <a href="logout.php" class="btn btn-outline-danger">
      <i class="bi bi-box-arrow-right"></i> Logout
    </a>
  </div>

  <h3 class="text-center">Data Peminjaman Barang</h3>

  <div class="container-box">
    <div class="d-flex justify-content-end mb-3">
      <a href="tambah.php" class="btn btn-success btn-add">
        <i class="bi bi-plus-lg"></i> Tambah Data
      </a>
      <a href="riwayat.php" class="btn btn-info text-white btn-history">
        <i class="bi bi-clock-history"></i> Riwayat
      </a>
    </div>

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Peminjam</th>
          <th>Sekolah</th>
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Kondisi</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $data->fetch_assoc()): ?>
        <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['nama_peminjam']) ?></td>
          <td><?= htmlspecialchars($row['sekolah']) ?></td>
          <td><?= htmlspecialchars($row['nama_barang']) ?></td>
          <td class="text-center"><?= $row['jumlah'] ?></td>
          <td class="text-center"><?= $row['kondisi'] ?></td>
          <td class="text-center"><?= date('d-m-Y', strtotime($row['tanggal_pinjam'])) ?></td>
          <td class="text-center"><?= date('d-m-Y', strtotime($row['tanggal_kembali'])) ?></td>

          <td class="text-center">
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success">
              <i class="bi bi-pencil-square"></i>Edit
            </a>
            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">
              <i class="bi bi-trash"></i>Hapus
            </a>
            <?php if ($_SESSION['id_level'] == 1): ?>
              <a href="selesai.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning text-white">
                <i class="bi bi-check-circle"></i>Selesai
              </a>
            <?php endif; ?>

          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-end">
        <?php if ($page > 1): ?>
          <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">«</a></li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
          <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
          <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">»</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</div>

</body>
</html>
