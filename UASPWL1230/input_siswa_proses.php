<?php
    include 'koneksi.php';
    $a = $_POST['nis'];
    $b = $_POST['nama'];
    $c = $_POST['kelas'];
    $d = $_POST['alamat'];
    $e = $_POST['tgl_masuk'];
    if(isset($_POST['simpan'])){
        $sql = "INSERT INTO siswa VALUES('$a','$b','$c','$d','$e')";
        $query = mysqli_query($koneksi, $sql);

        header("location:tampil_siswa.php");
    } else
        {
            echo "<h1>Data Tidak Berhasil di Simpan</h1>";
        }
?>