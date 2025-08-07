<?php
// IF - Mengecek stok buku
$peminjam1 = 2;
$peminjam2 = 2;
$stok = 10;
if ($peminjam1 < $stok) {
    echo "Status: Buku tersedia.<br>";
}

// IF-ELSE - Mengecek apakah kursi tersedia
$jumlah_kursi = 9;
if ($jumlah_kursi > 7) {
    echo "Ada kursi yang kosong.<br>";
} else {
    echo "Semua kursi sedang terisi, silakan menunggu.<br>";
}

// IF-ELSEIF-ELSE - Cek kategori bahan bacaan
$bahan_bacaan = "buku umum";
if ($bahan_bacaan == "Buku") {
    echo "Anda memilih kategori Buku.<br>";
} elseif ($bahan_bacaan == "Buku Umum") {
    echo "Anda memilih kategori Buku Umum.<br>";
} elseif ($bahan_bacaan == "Buku Kompetensi") {
    echo "Anda memilih kategori Buku Kompetensi.<br>";
} else {
    echo "Kategori tidak dikenal.<br>";
}
?>