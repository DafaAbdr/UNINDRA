<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Siswa</title>
</head>
<body>
    <h2>Input Data Siswa</h2>
    <form action="input_siswa_proses.php" method="POST">
        <label for="nis">NIS</label><br>
        <input type="text" name="nis" required><br><br>

        <label for="nama">Nama</label><br>
        <input type="text" name="nama" required><br><br>

        <label for="kelas">Kelas</label><br>
        <input type="text" name="kelas" required><br><br>

        <label for="alamat">Alamat</label><br>
        <textarea name="alamat" rows="4" cols="20" required></textarea><br><br>

        <label for="tgl_masuk">Tanggal Masuk</label><br>
        <input type="date" name="tgl_masuk" required><br><br>

        <input type="submit" name="simpan" value="Simpan">
    </form>
</body>
</html>
