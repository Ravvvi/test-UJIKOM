<?php
include '../backend/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$id'");

    if ($query) {
        echo "<script>
                alert('Produk berhasil dihapus!');
                window.location.href='../frontend/index.php';
              </script>";
    } else {
        echo "Gagal menghapus: " . mysqli_error($koneksi);
    }
} else {
    header("Location: ../frontend/index.php");
}
?>