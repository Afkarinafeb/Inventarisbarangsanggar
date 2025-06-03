# Inventarisbarangsanggar

Database dbsanggar
CREATE TABLE peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_peminjam VARCHAR(100),
    sekolah VARCHAR(100),
    nama_barang VARCHAR(100),
    jumlah INT,
    kondisi VARCHAR(50),
    tanggal_pinjam DATE,
    tanggal_kembali DATE,
    status ENUM('dipinjam', 'kembali') DEFAULT 'dipinjam'
);
