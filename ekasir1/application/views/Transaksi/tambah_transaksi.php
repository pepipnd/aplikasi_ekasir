<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah transaksi</title>
</head>
<body>
    <center>
    <h2>Tambah transaksi</h2>
    <form action="<?= base_url('Transaksi/simpan_transaksi') ?>" method="post">
      <table>
        <tr>
           <td>Tanggal transaksi</td>
           <td>:</td>
           <td><input type="date" name="tanggal_transaksi" id="tanggal_transaksi"></td>
        </tr>
        <tr>
          <td>Tipe konsumen</td>
          <td>:</td>
          <td>
          <select name="tipe_konsumen" id="tipe_konsumen">
          <option value="umum">Umum</option>
          <option value="member">Member</option>
          </select>
          </td>
        </tr>
        <tr>
          <td>Member id</td>
          <td>:</td>
          <td><input type="number" name="member_id" id="member_id"></td>
        </tr>
        <tr>
          <td><input type="submit" class="btn btn-success" value="Selanjutnya"></td>
        </tr>
      </table>
    </form>
    </center>
</body>
</html>