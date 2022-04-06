<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="<?= base_url('template/bootstrap.min.css') ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail transaksi</title>
</head>
<body>
    <?php 
    foreach($transaksi as $trs):
        $trs_id = $trs->pk_transaksi_id;
        $notransaksi = $trs->pk_transaksi_id;
        $tanggal_transaksi = $trs->tanggal_transaksi;
        $member = $trs->tipe_konsumen;
    endforeach;

    if(!empty($datamember)){
        foreach ($datamember as $mm):
            $status_member = $mm->tipe_member;
        endforeach;
    }else{
        $status_member = '';
    }
    ?>
    <br>
    <br>
    <div class="container">
    <h2>Detail Tsransaksi</h2>
    <table>
       <tr>
         <td>No transaksi</td>
         <td>:</td>
         <td><?= $notransaksi; ?></td>
       </tr>
       <tr>
         <td>Tanggal transaksi</td>
         <td>:</td>
         <td><?= $tanggal_transaksi ?></td>
       </tr>
       <tr>
         <td>Tipe konsumen</td>
         <td>:</td>
         <td><?= $member.' '.$status_member ?></td>
       </tr>
    </table>
    <hr>
    <table class="table table-bordered">
    <tr>
       <th>No</th>
       <th>Nama barang</th>
       <th>Kuantitas</th>
       <th>Harga satuan</th>
       <th>Total</th>
       <th>Aksi</th>
    </tr>
    <?php
    $no=1;
    $grand=0;
    foreach ($hasil as $hsl):
        $harga = $hsl->harga;
        $kuantitas = $hsl->kuantitas;
        $total = $harga*$kuantitas;
    ?>
    <tr>
      <td><?= $no; ?></td>
      <td><?= $hsl->nama_barang ?></td>
      <td><?= $kuantitas.' '.$hsl->nama_satuan ?></td>
      <td><?= "Rp.".number_format($harga) ?></td>
      <td><?= "Rp.".number_format($total); ?></td>
      <td>
      <a href="<?= base_url('Transaksi/hapusdetail/'. $hsl->pk_detail_transaksi_id.'/'.$trs_id) ?>">Hapus</a>
      </td>
    </tr>
    <?php 
    $no++;
    $grand += $total;
    endforeach;
    ?>
    </table>
    <br>
    <?php 
    if($status_member == 'clasic'){
        $persen = 5*$grand/100;
        $grandtotal = $grand-$persen;
    }
    else if($status_member == 'premium'){
        $persen = 15*$grand/100;
        $grandtotal = $grand-$persen;
    }
    else{
        $persen = 0;
        $grandtotal = $grand;
    }
    ?>
    <form action="<?= base_url('Transaksi/saveprint_transaksi') ?>" method="post">
    <table>
     <input type="hidden" name="transaksi_id" value="<?= $trs_id ?>">
     <tr>
       <td>Harga asal</td>
       <td>:</td>
       <td><?= "Rp.".number_format($grand); ?></td>
     </tr>
     <tr>
       <td>Diskon</td>
       <td>:</td>
       <td><?= "Rp.".number_format($persen); ?></td>
     </tr>
     <tr>
       <td>Total belanja</td>
       <td>:</td>
       <td><?= "Rp.".number_format($grandtotal); ?></td>
     </tr>
     <tr>
       <td>Bayar</td>
       <td>:</td>
       <td><input type="number" name="bayar" id="bayar"></td>
     </tr>
     <tr>
      <td><input type="submit" class="btn btn-sm btn-success" value="Selesai &print"></td>
     </tr>
    </table>
    </form>
    <hr>
    <h2>Tambah barang</h2>
    <form action="<?= base_url('Transaksi/tambah_detail') ?>" method="post">
    <table>
    <input type="hidden" name="transaksi_id" value="<?= $trs_id ?>">
    <tr>
     <td>Nama barang</td>
     <td>:</td>
     <td>
     <select name="barang" id="barang">
     <?php foreach ($barang as $br): ?>
     <option value="<?= $br->pk_barang_id ?>"><?= $br->nama_barang ?></option>
     <?php endforeach; ?>
     </select>
     </td>
    </tr>
    <tr>
      <td>Kuantitas</td>
      <td>:</td>
      <td><input type="number" name="kuantitas" id="kuantitas"></td>
    </tr>
    <tr>
     <td><input type="submit" class="btn btn-sm btn-success" value="Tambah barang"></td>
    </tr>
    </table>
    </form>
    </div>
</body>
</html>