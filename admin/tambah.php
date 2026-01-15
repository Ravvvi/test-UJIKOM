<?php include '../backend/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Tambah Sparepart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-3xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-slate-800">Tambah Produk Baru</h2>
        
        <form action="" method="POST" class="space-y-4">
            <input type="text" name="nama" placeholder="Nama Barang" class="w-full p-3 border rounded-xl" required>
            <select name="kategori" class="w-full p-3 border rounded-xl">
                <option value="VGA">VGA</option>
                <option value="Processor">Processor</option>
                <option value="RAM">RAM</option>
                <option value="Motherboard">Motherboard</option>
            </select>
            <input type="number" name="harga" placeholder="Harga (Rp)" class="w-full p-3 border rounded-xl" required>
            <input type="number" name="stok" placeholder="Jumlah Stok" class="w-full p-3 border rounded-xl" required>
            <textarea name="spesifikasi" placeholder="Spesifikasi Singkat" class="w-full p-3 border rounded-xl"></textarea>
            
            <button type="submit" name="simpan" class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700">
                Simpan ke Database
            </button>
        </form>

        <?php
        if(isset($_POST['simpan'])){
            $nama = $_POST['nama'];
            $kat  = $_POST['kategori'];
            $hrg  = $_POST['harga'];
            $stk  = $_POST['stok'];
            $spek = $_POST['spesifikasi'];

           $insert = mysqli_query($koneksi, "INSERT INTO produk (nama_barang, kategori, harga, stok, spesifikasi) 
          VALUES ('$nama', '$kat', '$hrg', '$stk', '$spek')");
        }
        ?>
    </div>
</body>
</html>