<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<script>
        alert('✅ data berhasil dikirim!');
        window.location.href = 'form.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5680beff;
            padding: 50px;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Peminjaman Buku</h2>
        <form method="POST">
            <label>Nama Siswa:</label>
            <input type="text" name="nama" required>

            <label>Kelas:</label>
            <input type="text" name="kelas" required>

            <label>Judul Buku:</label>
            <input type="text" name="judul" required>

            <label>Tanggal Pinjam:</label>
            <input type="date" name="tanggal_pinjam" required>

            <label>Tanggal Kembali:</label>
            <input type="date" name="tanggal_kembali" required>

            <input type="submit" value="Kirim">
        </form>
    </div>
</body>
</html>