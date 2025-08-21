<?php
function hitungSelisihHari($tgl1, $tgl2) {
    $tanggal1 = new DateTime($tgl1);
    $tanggal2 = new DateTime($tgl2);
    $selisih = $tanggal1->diff($tanggal2);
    return $selisih->days;
}

$hasil = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stok = $_POST['stok'];
    $totalPinjam = $_POST['total'];

    // Percabangan stok
    if ($totalPinjam <= $stok) {
        $tampilPinjam = $totalPinjam;
    } else {
        $tampilPinjam = "Stok buku terbatas";
    }

    // Hitung total hari
    $totalHari = hitungSelisihHari($_POST['tgl_pinjam'], $_POST['tgl_kembali']);

    $hasil = [
        'nama' => $_POST['nama'],
        'kelas' => $_POST['kelas'],
        'jurusan' => $_POST['jurusan'],
        'judul' => $_POST['judul'],
        'stok' => $stok,
        'pinjam' => $tampilPinjam,
        'tgl_pinjam' => $_POST['tgl_pinjam'],
        'tgl_kembali' => $_POST['tgl_kembali'],
        'total_hari' => $totalHari
    ];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .container {
            width: 800px;
            background: white;
            padding: 20px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }
        form input, form select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            background: #4CAF50;
            color: white;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn:hover {
            background: #45a049;
        }
        table {
            width: 800px;
            border-collapse: collapse;
            margin: 20px auto;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>

<!-- Form -->
<div class="container">
    <h2>Form Peminjaman Buku</h2>
    <form method="post">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Kelas</label>
        <select name="kelas" required>
            <option value="">-- Pilih Kelas --</option>
            <option>X</option>
            <option>XI</option>
            <option>XII</option>
        </select>

        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <optgroup label="MPLB">
                <option value="MPLB 1">MPLB 1</option>
                <option value="MPLB 2">MPLB 2</option>
                <option value="MPLB 3">MPLB 3</option>
            </optgroup>
            <optgroup label="RPL">
                <option value="RPL 1">RPL 1</option>
                <option value="RPL 2">RPL 2</option>
            </optgroup>
            <optgroup label="TKJ">
                <option value="TKJ 1">TKJ 1</option>
                <option value="TKJ 2">TKJ 2</option>
            </optgroup>
            <optgroup label="AKL">
                <option value="AKL 1">AKL 1</option>
                <option value="AKL 2">AKL 2</option>
                <option value="AKL 3">AKL 3</option>
            </optgroup>
            <optgroup label="PS">
                <option value="PS 1">PS 1</option>
                <option value="PS 2">PS 2</option>
                <option value="PS 3">PS 3</option>
                <option value="PS 4">PS 4</option>
            </optgroup>
            <optgroup label="DKV">
                <option value="DKV 1">DKV 1</option>
                <option value="DKV 2">DKV 2</option>
            </optgroup>
            <optgroup label="TPM">
                <option value="TPM 1">TPM 1</option>
                <option value="TPM 2">TPM 2</option>
                <option value="TPM 3">TPM 3</option>
            </optgroup>
            <optgroup label="TO">
                <option value="TO 1">TO 1</option>
                <option value="TO 2">TO 2</option>
                <option value="TO 3">TO 3</option>
            </optgroup>
            <optgroup label="TL">
                <option value="TL">TL</option>
            </optgroup>
            <optgroup label="KL">
                <option value="KL">KL</option>
            </optgroup>
        </select>

        <label>Judul Buku</label>
        <select name="judul" id="judul" required onchange="setStok()">
            <option value="">-- Pilih Buku --</option>
            <option value="Matematika Kelas X" data-stok="10">Matematika Kelas X</option>
            <option value="Bahasa Indonesia Kelas XI" data-stok="8">Bahasa Indonesia Kelas XI</option>
            <option value="Fisika Dasar" data-stok="5">Fisika Dasar</option>
            <option value="Pemrograman Web" data-stok="7">Pemrograman Web</option>
            <option value="Desain Grafis" data-stok="6">Desain Grafis</option>
        </select>

        <label>Stok (pcs)</label>
        <input type="number" name="stok" id="stok" readonly>

        <label>Total Pinjaman</label>
        <input type="number" name="total" required>

        <label>Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" required>

        <label>Tanggal Pengembalian</label>
        <input type="date" name="tgl_kembali" required>

        <button type="submit" class="btn">KIRIM</button>
    </form>
</div>

<!-- Tabel Hasil -->
<?php if ($hasil): ?>
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Judul Buku</th>
        <th>Stok</th>
        <th>Total Pinjaman</th>
        <th>Tgl Pinjam</th>
        <th>Tgl Pengembalian</th>
        <th>Total Hari</th>
    </tr>
    <tr>
        <td>1</td>
        <td><?= $hasil['nama']; ?></td>
        <td><?= $hasil['kelas']; ?></td>
        <td><?= $hasil['jurusan']; ?></td>
        <td><?= $hasil['judul']; ?></td>
        <td><?= $hasil['stok']; ?></td>
        <td><?= $hasil['pinjam']; ?></td>
        <td><?= $hasil['tgl_pinjam']; ?></td>
        <td><?= $hasil['tgl_kembali']; ?></td>
        <td><?= $hasil['total_hari']; ?> hari</td>
    </tr>
</table>
<?php endif; ?>

<script>
function setStok() {
    let judulSelect = document.getElementById("judul");
    let stokValue = judulSelect.options[judulSelect.selectedIndex].getAttribute("data-stok");
    document.getElementById("stok").value = stokValue || "";
}
</script>

</body>
</html>