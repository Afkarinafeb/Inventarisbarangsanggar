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


Program Aplikasi Peminjaman Barang
====================================
Mulai
1. Koneksi ke database "dbsanggar"
2. Tampilkan halaman utama (index.php)
    - Ambil semua data dari tabel 'peminjaman' dengan status = 'dipinjam'
    - Tampilkan data dalam bentuk tabel
    - Sediakan tombol:
        - Tambah Data
        - Edit
        - Hapus
        - Selesai (untuk ubah status jadi 'kembali')
3. Jika user klik "Tambah Data"
    - Tampilkan form input data
    - Jika form disubmit:
        - Validasi input
        - Simpan data ke tabel 'peminjaman' dengan status = 'dipinjam'
4. Jika user klik "Edit"
    - Ambil data berdasarkan ID
    - Tampilkan form dengan data lama
    - Jika disubmit:
        - Update data berdasarkan ID
5. Jika user klik "Hapus"
    - Konfirmasi penghapusan
    - Hapus data berdasarkan ID dari tabel 'peminjaman'
6. Jika user klik "Selesai"
    - Ambil ID data yang dipilih
    - Ubah status dari 'dipinjam' menjadi 'kembali'
7. Halaman Riwayat (riwayat.php)
    - Ambil semua data dari tabel 'peminjaman' dengan status = 'kembali'
    - Tampilkan dalam bentuk tabel
Selesai
