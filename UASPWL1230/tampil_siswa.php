<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Data Siswa</title>
</head>
<body>
  <h2>List Siswa</h2>
  <a href="input_siswa.php"><strong>+ Tambah Data</strong></a>
  <br><br>

  <table border="1">
    <tr>
      <th>No</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Alamat</th>
      <th>Tanggal Masuk</th>
      <th>Action</th>
    </tr>
    <?php include "koneksi.php";
    $siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
    $no = 1;

    foreach ($siswa as $row) {
      echo "<tr>
              <td>$no</td>
              <td>{$row['nis']}</td>
              <td>{$row['nama']}</td>
              <td>{$row['kelas']}</td>
              <td>{$row['alamat']}</td>
              <td>{$row['tgl_masuk']}</td>
              <td>
                <a href='edit_form_siswa.php?id={$row['nis']}'>Edit</a> |
                <a href='hapus_siswa.php?id={$row['nis']}'
                   onclick=\"return confirm('Yakin ingin menghapus data siswa ini?')\">Hapus</a>
              </td>
            </tr>";
      $no++;
    }
    ?>
  </table>
</body>
</html>
