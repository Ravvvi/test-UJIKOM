-- Membuat Database
CREATE DATABASE IF NOT EXISTS shop_sparepart;
USE shop_sparepart;

-- Tabel Produk (Untuk menyimpan spek dan tgl rilis)
CREATE TABLE produk (
    id_produk INT PRIMARY KEY AUTO_INCREMENT,
    nama_komponen VARCHAR(100) NOT NULL,
    kategori ENUM('CPU', 'GPU', 'RAM', 'Motherboard', 'Storage') NOT NULL,
    spesifikasi TEXT,
    harga DECIMAL(12, 2) NOT NULL,
    stok INT DEFAULT 0,
    tanggal_rilis DATE,
    gambar VARCHAR(255)
);

-- Tabel Transaksi (Untuk mencatat pembelian)
CREATE TABLE transaksi (
    id_transaksi INT PRIMARY KEY AUTO_INCREMENT,
    id_produk INT,
    jumlah INT,
    total_harga DECIMAL(12, 2),
    tanggal_beli TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);