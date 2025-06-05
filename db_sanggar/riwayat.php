<?php
include 'config.php';

$sql = "SELECT * FROM peminjaman WHERE status = 'selesai'";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Peminjaman Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 95%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #4285f4;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .back-btn {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4285f4;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #3367d6;
        }
    </style>
</head>
<body>

    <h2>Riwayat Peminjaman Barang</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Sekolah</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
        </tr>
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_peminjam']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_barang']) . "</td>";
            echo "<td>" . $row['jumlah'] . "</td>";
            echo "<td>" . htmlspecialchars($row['kondisi']) . "</td>";
            echo "<td>" . htmlspecialchars($row['sekolah']) . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($row['tanggal_pinjam'])) . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($row['tanggal_kembali'])) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="index.php" class="back-btn">← Kembali ke Halaman Utama</a>

</body>
</html>
