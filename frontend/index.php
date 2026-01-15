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
    <nav class="bg-slate-900 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-tight uppercase">TECH-SHOP <span class="text-blue-400">SPAREPART</span></h1>
            <div class="flex items-center space-x-6">
                <a href="#" class="hover:text-blue-400 transition">Home</a>
                <a href="#" class="hover:text-blue-400 transition">Katalog</a>
                <a href="../admin/tambah.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-bold transition shadow-lg">
                    + Tambah Produk
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-10 px-4">
        <div class="flex justify-between items-end mb-8 border-b-4 border-blue-500 pb-2">
            <h2 class="text-3xl font-extrabold text-slate-800">Katalog Produk</h2>
            <p class="text-slate-500 text-sm">Menampilkan sparepart PC terbaru</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
            while($data = mysqli_fetch_array($query)):
            ?>
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <span class="bg-blue-100 text-blue-800 text-[10px] font-black px-2.5 py-0.5 rounded-full uppercase tracking-wider">
                            <?php echo $data['kategori']; ?>
                        </span>
                        <a href="../admin/hapus.php?id=<?php echo $data['id']; ?>" 
                           onclick="return confirm('Yakin ingin menghapus produk ini?')"
                           class="opacity-0 group-hover:opacity-100 text-red-400 hover:text-red-600 transition-opacity">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </a>
                    </div>

                    <h3 class="text-xl font-bold text-slate-900 mt-3 group-hover:text-blue-600 transition-colors italic uppercase tracking-tighter">
                        <?php echo $data['nama_barang']; ?>
                    </h3>
                    
                    <p class="text-slate-500 text-sm mt-2 line-clamp-2 h-10 border-l-2 border-slate-100 pl-3">
                        <?php echo $data['spesifikasi']; ?>
                    </p>
                    
                    <div class="mt-6 flex items-end justify-between">
                        <div>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest leading-none">Harga</p>
                            <span class="text-2xl font-black text-slate-900">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></span>
                        </div>
                        <div class="text-right">
                            <p class="text-[10px] text-slate-400 font-bold uppercase leading-none">Stok</p>
                            <span class="text-lg font-bold text-blue-600"><?php echo $data['stok']; ?></span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-2 mt-6">
                        <button class="bg-slate-900 text-white font-bold py-3 rounded-xl hover:bg-blue-600 transition-all text-xs">
                            BELI SEKARANG
                        </button>
                        <button class="border-2 border-slate-200 text-slate-600 font-bold py-3 rounded-xl hover:bg-slate-50 transition-all text-xs">
                            DETAIL
                        </button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </main>

    <footer class="bg-white