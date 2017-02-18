<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Src\Member;

$members = new Member();
$member = $members->getAll();

if (isset($_GET['id'])) {
    $members->softDelete($_GET['id']);

    header('location:data_member.php');
}



?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title></title>

     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
       <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->
   </head>
   <body class="container" width="80%">
       <a href="add_member.php"><button type="button" class="btn btn-info">Tambah</button></a>
      <table class="table-condensed">
          <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Kontak</th>
              <th>Berlaku sampai dengan</th>
              <th colspan="2">Pilihan</th>
          </tr>
          <?php foreach ($member as $values) : ?>
          <tr>
              <td><?= $values['id']?></td>
              <td><?= $values['nama']?></td>
              <td><?= $values['tgl_lahir']?></td>
              <td><?= $values['jenis_kelamin']?></td>
              <td><?= $values['alamat']?></td>
              <td><?= $values['kontak']?></td>
              <td><?= $values['batas_berlaku']?></td>
              <td><a href="edit_member.php?id=<?=$values['id']?>"> <button  class="btn btn-large btn-block btn-warning">Edit</button> </td>
              <td><a href="data_member.php?id=<?=$values['id']?>"> <button  class="btn btn-large btn-block btn-danger">Hapus</button></td>
          </tr>
      <?php endforeach; ?>

      </table>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </body>
 </html>
