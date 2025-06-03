<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "UPDATE peminjaman SET status = 'kembali' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update status: " . $conn->error;
    }
} else {
    echo "ID tidak valid!";
}
?>
