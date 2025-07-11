<?php
    include 'koneksi.php';

    $nis       = $_POST['nis'];
    $nama      = $_POST['nama'];
    $kelas     = $_POST['kelas'];
    $alamat    = $_POST['alamat'];
    $tgl_masuk = $_POST['tgl_masuk'];

    if (isset($_POST['ubah'])) {
        mysqli_query($koneksi,
            "UPDATE siswa SET
                nama='$nama',
                kelas='$kelas',
                alamat='$alamat',
                tgl_masuk='$tgl_masuk'
            WHERE nis='$nis'"
        );

        header("Location: tampil_siswa.php");
    }
?>
