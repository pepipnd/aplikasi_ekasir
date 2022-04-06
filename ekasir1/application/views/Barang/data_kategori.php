<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data kategori</title>
</head>
<body>
    <center>
    <h2>Data Kategori</h2>
    <a href="<?= base_url('Barang/tambah_kategori') ?>"><button>Tambah Data</button></a><br><br>
    <table border='1'>
      <tr>
        <th>No</th>
        <th>Satuan</th>
        <th>Aksi</th>
      </tr>
      <?php 
      foreach ($kategori as $dkt):
      ?>
      <tr>
        <td><?= $dkt->pk_kategori_id ?></td>
        <td><?= $dkt->nama_kategori ?></td>
        <td>
        <a href="<?= base_url('Barang/hapuskategori/'.$dkt->pk_kategori_id) ?>">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    </center>
</body>
</html>