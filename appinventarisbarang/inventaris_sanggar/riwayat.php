<?php
$koneksi = new mysqli("localhost", "root", "", "dbsanggar");
$data = $koneksi->query("SELECT * FROM peminjaman WHERE status = 'selesai' ORDER BY tanggal_pinjam DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Riwayat Peminjaman</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .container-box {
      background: white;
      margin-top: 40px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h3 {
      font-weight: 600;
      margin-bottom: 20px;
      text-align: center;
      color: #333;
    }
    .btn-back {
      margin-bottom: 20px;
      border-radius: 8px;
    }
    table thead th {
      text-align: center;
      vertical-align: middle;
    }
    table tbody td {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="container container-box">
    <h3>Riwayat Peminjaman</h3>
    <a href="index.php" class="btn btn-secondary btn-back">
      <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Sekolah</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;  
          while ($row = $data->fetch_assoc()): ?>
          <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= htmlspecialchars($row['nama_peminjam']) ?></td>
            <td><?= htmlspecialchars($row['sekolah']) ?></td>
            <td><?= htmlspecialchars($row['nama_barang']) ?></td>
            <td class="text-center"><?= htmlspecialchars($row['jumlah']) ?></td>
            <td class="text-center"><?= htmlspecialchars($row['kondisi']) ?></td>
            <td class="text-center"><?= htmlspecialchars($row['tanggal_pinjam']) ?></td>
            <td class="text-center"><?= htmlspecialchars($row['tanggal_kembali']) ?></td>
          </tr>
          <?php 
          $no++; 
          endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</body>
</html>
