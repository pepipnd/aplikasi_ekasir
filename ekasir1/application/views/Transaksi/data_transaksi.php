<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data transaksi</title>
</head>
<body>
    <div class="container">
      <h2>Data transaksi</h2>
      <a href="<?= base_url('Transaksi/tambah_transaksi') ?>"><button class="btn btn-success">Tambah Data</button></a><br><br>
      <table class="table table-bordered table-striped">
        <tr>
          <th>No transaksi</th>
          <th>Tanggal transaksi</th>
          <th>Tipe konsumen</th>
          <th>Bayar</th>
          <th>Aksi</th>
        </tr>
      <?php
      foreach ($transaksi as $trs):
      ?>
      <tr>
        <td><?= "TRS".$trs->pk_transaksi_id ?></td>
        <td><?= $trs->tanggal_transaksi ?></td>
        <td><?= $trs->tipe_konsumen ?></td>
        <td><?= "Rp.".number_format($trs->bayar) ?></td>
        <td>
        <a href="<?= base_url('Transaksi/hapustransaksi/'.$trs->pk_transaksi_id ) ?>" class="btn btn-success "><i class="fa fa-trash"></i> </a>
        </td>
      </tr>
      <?php 
      endforeach;
      ?>
      </table>
      </div>
</body>
</html>