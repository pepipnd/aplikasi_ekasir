<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data barang</title>
</head>
<body>
    <center>
      <h2>Data Barang</h2>
      <a href="<?= base_url('Barang/tambah_barang') ?>"><button>Tambah Data</button></a><br><br>
      <table border='1'>
        <tr>
          <th>No barang</th>
          <th>Nama barang</th>
          <th>Kategori</th>
          <th>Satuan</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
        <?php 
        foreach ($barang as $br):
        ?>
        <tr>
        <td><?= "BR".$br->pk_barang_id ?></td>
        <td><?= $br->nama_barang ?></td>
        <td><?= $br->nama_kategori ?></td>
        <td><?= $br->nama_satuan ?></td>
        <td><?= "Rp.".number_format($br->harga) ?></td>
        <td><?= $br->stok ?></td>
        <td>
        <a href="">Edit</a> |
        <a href="<?= base_url('Barang/hapusbarang/'.$br->pk_barang_id) ?>">Hapus</a>
        </td>
        </tr>
        <?php 
        endforeach;
        ?>
      </table>
    </center>
</body>
</html>