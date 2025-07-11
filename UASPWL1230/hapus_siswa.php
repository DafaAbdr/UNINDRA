<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $nis = $_GET['id'];
    $query = "DELETE FROM siswa WHERE nis = '$nis'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: tampil_siswa.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
