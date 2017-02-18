<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Src\Member;

$members = new Member();

if (isset($_GET['id'])) {
    $member = $members->getMemberId($_GET['id']);
}
$tgl_diperbarui = date('Y-m-d');

if (isset($_POST['edit'])) {
    $members->edit($_POST['id'], 3, $_POST['nama'], $_POST['tgl_lahir'], $_POST['jenis_kelamin'], $_POST['alamat'], $_POST['kontak'], $_POST['batas_berlaku'], $tgl_diperbarui);

    header('location:data_member.php');
}

 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Edit Member</title>

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
   <body>
       <form  action="edit_member.php" method="post">
             <input type="hidden" name="id"  value="<?=$member['id']?>">

           <div class="form-group">
             <label for="">Nama</label>
             <input type="text" name="nama" class="form-control" value="<?=$member['nama']?>">
           </div>

           <div class="form-group">
             <label for="">Tanggal Lahir</label>
             <input type="text" name="tgl_lahir" class="form-control" value="<?=$member['tgl_lahir']?>">
           </div>

           <div class="form-group">
             <label for="">Jenis Kelamin</label>
             <input type="text" name="jenis_kelamin" class="form-control" value="<?=$member['jenis_kelamin']?>">
           </div>

           <div class="form-group">
             <label for="">Alamat</label>
             <input type="text" name="alamat" class="form-control" value="<?=$member['alamat']?>">
           </div>

           <div class="form-group">
             <label for="">Kontak</label>
             <input type="text" name="kontak" class="form-control" value="<?=$member['kontak']?>">
           </div>

           <div class="form-group">
             <label for="">Berlaku sampai dengan</label>
             <input type="text" name="batas_berlaku" class="form-control" value="<?=$member['batas_berlaku']?>">
           </div>

           <div class="form-group">
             <button type="submit" name="edit"  value="1" class="btn btn-large btn-block btn-info">Selesai</button>
           </div>

       </form>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </body>
 </html>
