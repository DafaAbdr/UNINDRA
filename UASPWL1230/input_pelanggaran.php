<?php include 'koneksi.php';

$poinMap = [
    'Tidak Berseragam Lengkap' => 5,
    'Terlambat' => 3,
    'Merokok' => 10,
    'Keluar Tanpa Izin' => 7
];

$pesan = "";

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $jenis = $_POST['jenis_pelanggaran'];
    $tanggal = $_POST['tanggal'];

    $poin = $poinMap[$jenis];

    $query = "INSERT INTO pelanggaran (id_pelanggaran, nis, tanggal, jenis_pelanggaran, poin)
              VALUES ('$id', '$nis', '$tanggal', '$jenis', '$poin')";
    
    if (mysqli_query($koneksi, $query)) {
        $bulan = date('m', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));

        $qTotal = "SELECT SUM(poin) as total_poin FROM pelanggaran 
                   WHERE nis='$nis' AND MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun'";
        $res = mysqli_query($koneksi, $qTotal);
        $data = mysqli_fetch_assoc($res);
        $totalPoin = $data['total_poin'];

        $pesan = "<p>Data pelanggaran berhasil disimpan.</p>";
        if ($totalPoin > 15) {
            $pesan .= "<p><span style='color:red;'>Peringatan:</span> Total poin siswa bulan ini $totalPoin (lebih dari 15).</p>";
        }
    } else {
        $pesan = "<p style='color:red;'>Gagal menyimpan data: " . mysqli_error($koneksi) . "</p>";
    } 
}
?>

<h2>Form Input Pelanggaran</h2>
<?= $pesan ?>
<form method="post">
    <label>ID : </label>
    <input type="text" name="id" required><br>

    <label>NIS : </label>
    <select name="nis" required>
        <option value="">-- Pilih NIS --</option>
        <?php
        $result = mysqli_query($koneksi, "SELECT nis FROM siswa");
        while ($row = mysqli_fetch_array($result)) {
            echo "<option value='{$row['nis']}'>{$row['nis']}</option>";
        }
        ?>
    </select><br>

    <label>Jenis Pelanggaran :</label>
    <select name="jenis_pelanggaran" required>
        <option value="">-- Pilih --</option>
        <option value="Tidak Berseragam Lengkap">Tidak Berseragam Lengkap</option>
        <option value="Terlambat">Terlambat</option>
        <option value="Merokok">Merokok</option>
        <option value="Keluar Tanpa Izin">Keluar Tanpa Izin</option>
    </select><br>

    <label>Tanggal Pelanggaran :</label>
    <input type="date" name="tanggal" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>