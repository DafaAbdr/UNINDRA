<?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $edit = "SELECT * FROM siswa WHERE nis = '$id'";
    $hasil = mysqli_query($koneksi, $edit);
    $row = mysqli_fetch_array($hasil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <h2>Edit Data Siswa</h2>
    <form method="post" action="edit_proses_siswa.php">
        <label>NIS</label><br>
        <input type="text" name="nis" value="<?php echo $row['nis']; ?>" readonly><br><br>

        <label>Nama</label><br>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br><br>

        <label>Kelas</label><br>
        <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>" required><br><br>

        <label>Alamat</label><br>
        <textarea name="alamat" rows="4" cols="30" required><?php echo $row['alamat']; ?></textarea><br><br>

        <label>Tanggal Masuk</label><br>
        <input type="date" name="tgl_masuk" value="<?php echo $row['tgl_masuk']; ?>" required><br><br>

        <input type="submit" name="ubah" value="Ubah">
    </form>
</body>
</html>
