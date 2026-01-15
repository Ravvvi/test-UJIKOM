<?php include '../backend/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Sparepart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-lg w-full bg-white p-8 rounded-3xl shadow-xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Tambah Produk Baru</h2>
            <a href="../frontend/index.php" class="text-blue-600 text-sm hover:underline">Batal</a>
        </div>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Barang</label>
                <input type="text" name="nama" placeholder="Contoh: Core i7 13700K" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="VGA">VGA</option>
                    <option value="Processor">Processor</option>
                    <option value="RAM">RAM</option>
                    <option value="Motherboard">Motherboard</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" placeholder="0" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Stok</label>
                    <input type="number" name="stok" placeholder="0" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Spesifikasi Singkat</label>
                <textarea name="spesifikasi" rows="3" placeholder="Contoh: 16 Core, 5.4 GHz..." class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
            </div>
            
            <button type="submit" name="simpan" class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition duration-200">
                Simpan ke Database
            </button>
        </form>

        <?php
        if(isset($_POST['simpan'])){
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $kat  = $_POST['kategori'];
            $hrg  = $_POST['harga'];
            $stk  = $_POST['stok'];
            $spek = mysqli_real_escape_string($koneksi, $_POST['spesifikasi']);

            $insert = mysqli_query($koneksi, "INSERT INTO produk (nama_barang, kategori, harga, stok, spesifikasi) 
                                              VALUES ('$nama', '$kat', '$hrg', '$stk', '$spek')");

            if($insert){
                echo "<script>
                        alert('Berhasil! Produk baru telah ditambahkan.');
                        window.location.href='../frontend/index.php';
                      </script>";
            } else {
                echo "<div class='mt-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm'>
                        Gagal menyimpan: " . mysqli_error($koneksi) . "
                      </div>";
            }
        }
        ?>
    </div>
</body>
</html>