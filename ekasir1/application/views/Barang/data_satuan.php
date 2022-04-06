<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data satuan</title>
</head>
<body>
    <center>
    <h2>Data Satuan</h2>
    <a href="<?= base_url('Barang/tambah_satuan') ?>"><button>Tambah Data</button></a><br><br>
    <table border='1'>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Aksi</th>
      </tr>
      <?php 
      foreach ($satuan as $st):
      ?>
      <tr>
        <td><?= $st->pk_satuan_id ?></td>
        <td><?= $st->nama_satuan ?></td>
        <td>
        <a href="<?= base_url('Barang/hapussatuan/'.$st->pk_satuan_id) ?>">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    </center>
</body>
</html>