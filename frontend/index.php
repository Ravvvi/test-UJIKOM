<?php include '../backend/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Sparepart PC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-slate-900 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-tight">TECH-SHOP <span class="text-blue-400">SPAREPART</span></h1>
            <div class="space-x-4">
                <a href="#" class="hover:text-blue-400">Home</a>
                <a href="#" class="hover:text-blue-400">Katalog</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-10 px-4">
        <h2 class="text-3xl font-extrabold text-slate-800 mb-8 border-b-4 border-blue-500 inline-block">Katalog Produk</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM produk");
            while($data = mysqli_fetch_array($query)):
            ?>
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="p-6">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded uppercase"><?php echo $data['kategori']; ?></span>
                    <h3 class="text-xl font-bold text-slate-900 mt-2"><?php echo $data['nama_barang']; ?></h3>
                    <p class="text-slate-600 text-sm mt-2 line-clamp-3"><?php echo $data['spesifikasi']; ?></p>
                    
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-2xl font-black text-blue-600">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></span>
                        <span class="text-sm text-slate-400">Stok: <?php echo $data['stok']; ?></span>
                    </div>
                    
                    <button class="w-full mt-6 bg-slate-900 text-white font-bold py-3 rounded-lg hover:bg-slate-800 transition-colors">
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </main>
</body>
</html>