<?php
require 'function.php';

$result = query("SELECT * FROM data_rekap");

date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$tgl= $date->format('d-M-Y');

$name = "rekap mobil service ". $tgl ;
$filename = $name.".xls";
ob_end_clean();
header( "Content-type: application/vnd.ms-excel" );
header('Content-Disposition: attachment;filename='.$filename .' ');
header("Pragma: no-cache");
header("Expires: 0");
ob_end_clean();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Rekap data</title>
  </head>
  <body>

  <br><br><br><br><br>

  <table class="table table-dark table-hover container">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keterangan</th>
            <th scope="col">No. Polisi</th>
            <th scope="col">Nama Pekerja</th>
            <th scope="col">Nama sales advisor</th>
            <th scope="col">Stall</th>
            <th scope="col">Estimasi</th>
            <th scope="col">Waktu Selesai</th>
            <th scope="col">Stall IN</th>
            <th scope="col">Stall OUT</th>
            <th scope="col">Final checker IN</th>
            <th scope="col">Final checker OUT</th>
            <th scope="col">Cuci IN</th>
            <th scope="col">Cuci OUT</th>
        </tr>
    </thead>

    <?php $no=1 ?>
    <?php foreach($result as $row): ?>
    <tbody>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= date('d-m-Y', strtotime($row["tanggal"])); ?></td>
            <td><?= $row['ket'] ?></td>
            <td><?= $row['plat'] ?></td>
            <td><?= $row['namaPE'] ?></td>
            <td><?= $row['namaSA'] ?></td>
            <td><?= $row['stall'] ?></td>
            <td><?= $row['estimasi'] ?></td>
            <td><?= $row['waktu_selesai'] ?></td>
            <td><?= $row['stallin'] ?></td>
            <td><?= $row['stallout'] ?></td>
            <td><?= $row['FCin'] ?></td>
            <td><?= $row['FCout'] ?></td>
            <td><?= $row['cuciin'] ?></td>
            <td><?= $row['cuciout'] ?></td>
        </tr>
    </tbody>
    <?php $no++ ?>
    <?php endforeach; ?>
  </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
