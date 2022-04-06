<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <center>
      <h2>E-KASIR</h2>

      <form action="<?= base_url('Home/dashboard') ?>" method="post">
       <table>
         <tr>
            <td>Username</td>
            <td>:</td>
            <td><input type="text" name="" id=""></td>
         </tr>
         <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="" id=""></td>
         </tr>
         <tr>
           <td></td>
           <td></td>
           <td><input type="submit" value="Login"></td>
         </tr>
       </table>
      </form>
    </center>
</body>
</html>