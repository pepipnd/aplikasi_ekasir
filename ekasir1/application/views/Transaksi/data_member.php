<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data member</title>
</head>
<body>
   <center>
   <h2>Data member</h2>
   <a href=""><button>Tambah data</button></a><br><br>
   <table border='1'>
     <tr>
       <th>No member</th>
       <th>Nama member</th>
       <th>Alamat</th>
       <th>No hp</th>
       <th>Tipe member</th>
       <th>Dibuat pada</th>
       <th>Aksi</th>
     </tr>
     <?php 
     foreach($datamember as $mm):
     ?>
     <tr>
       <td><?= $mm->pk_member_id ?></td>
       <td><?= $mm->nama_member ?></td>
       <td><?= $mm->alamat ?></td>
       <td><?= $mm->no_hp ?></td>
       <td><?= $mm->tipe_member ?></td>
       <td><?= $mm->dibuat_pada ?></td>
       <td>
       <a href="">Edit</a> |
       <a href="">Hapus</a> |
       <a href="">Print</a>
       </td>
     </tr>
     <?php endforeach; ?>
   </table>
   </center> 
</body>
</html>