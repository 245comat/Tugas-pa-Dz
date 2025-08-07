<?php
// FOR - Menampilkan daftar buku perpustakaan
echo "<br>Daftar Buku Perpustakaan:<br>";
for ($i = 1; $i <= 5; $i++) {
    echo "Buku nomor f$i<br>";
}

// WHILE - Menghitung pengunjung yang sedang membaca
echo "<br>Pengunjung yang sedang membaca:<br>";
$pengunjung = 1;
while ($pengunjung <= 10) {
    echo "Pengunjung ke-$pengunjung sedang membaca.<br>";
     $pengunjung++;   
}
 echo "<br><hr><br>";

$buku = ["Bumi", "Laskar Pelangi", "Dilan", "Negeri 5 Menara", "Ayah"];
echo "Daftar Buku:<br>";
for ($i = 0; $i < count($buku); $i++) {
    echo ($i+1) . ". " . $buku[$i] . "<br>";
}

echo "<br>";

$jumlahPinjam = 0;
while ($jumlahPinjam < 3) {
    echo "Peminjaman ke-" . ($jumlahPinjam + 1) . "<br>";
    $jumlahPinjam++;
}
?>
