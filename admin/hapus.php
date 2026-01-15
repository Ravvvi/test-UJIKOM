<?php
include '../backend/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Hapus data dari database
$query = mysqli_query($koneksi, "DELETE FROM produk WHERE id = '$id'");

if($query) {
    echo "<script>alert('Produk Berhasil Dihapus!'); window.location.href='../frontend/index.php';</script>";
} else {
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>