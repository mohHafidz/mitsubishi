<?php
require 'function.php';

$ket = "final checker";

$mobil = query("SELECT * FROM data_sementara WHERE ket = '$ket'");

if(isset($_POST['cari'])){
    $data = $_POST['search'];
    $mobil = mysqli_query($conn, "SELECT * FROM data_sementara WHERE plat like '%$data%' AND ket = '$ket'" );
}

if (isset($_POST['fcin'])) {
    if (fcin($_POST)) {
        echo"
            <script>
                alert('Data final checker IN di input');
                document.location.href= 'final.php';
            </script>
        ";
    }
}

if (isset($_POST['fcout'])) {
    if (fcout($_POST)) {
        echo"
            <script>
                alert('data final checker OUT di input');
                document.location.href= 'final.php';
            </script>
        ";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        .merk{
            font-family: verdana, sans-serif;
            font-size: 25px;
            letter-spacing: -0.2pt;
            word-spacing: -1.2pt;
            color: black;
            /* margin-right: 30px; */
        }
        .conten{
            font-family: verdana, sans-serif;
            /* font-size: 12px; */
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt;
        }
        @media (max-width: 767.98px) { 
            .conten{
            font-family: verdana, sans-serif;
            font-size: 12px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt;
            }
            .btn-group a{
            font-family: verdana, sans-serif;
            font-size: 12px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt;
            }
            .btn-text{
            font-family: verdana, sans-serif;
            font-size: 14px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt; 
            }
            .text span{
            font-family: verdana, sans-serif;
            font-size: 12px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt; 
            }
            .title{
            font-family: verdana, sans-serif;
            font-size: 12px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt; 
            }
         }
    </style>

    <title>Dashboard Mitsubishi</title>
    <link rel="shortcut icon" href="img/img remove/red-black.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="opacity: 0.9;">
        <div class="container-fluid">
            <img src="img2/red-blak-mits.png" alt="" width="60" height="60" class="d-inline-block align-text-top" style="opacity: 1;">
            <span class="merk">Mitsubishi Yasmin</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="margin-left: 10%;" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light active " aria-current="page" href="#">On Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="antrian.php">An Queue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="mobil_selesai.php">Finish Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="tambah2.php">Add Car</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<br>
<div class="conten">

    <div class="menu container">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" role="group" aria-label="First group">
                <a href="index.php" class="btn btn-outline-primary">Work Stall</a>
                <a href="" class="btn btn-outline-primary active">Final Checker Cek</a>
                <a href="cuci.php" class="btn btn-outline-primary">Cuci</a>
            </div>
        </div>
    </div>

        <br><br>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-5 float-left">
                <h6 class="m-0 font-weight-bold text-primary title">Final Checker</h6>
            </div>
            <div class="col-7 float-right">
                <form class="d-flex" method="POST" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                    <button class="btn btn-outline-success" name="cari" id="cari">Search</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Data Kendaraan</th>
                            <th>Status</th>
                            <th>Final Checker</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Data Kendaraan</th>
                            <th>Status</th>
                            <th>Final Checker</th>
                        </tr>
                    </tfoot>
                    <?php foreach($mobil as $row): ?>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center" width="300px">
                                <span style="font-weight: bold;"><?= $row['antrian'] ?>. </span>
                                <span><?= $row['plat'];?> / <?= $row['mobilmasuk']?> [<?= ($row['estimasi'] === '00:00:00') ? '' : $row['estimasi']; ?>] <?= $row['cuci'] ?> | <?= $row['jenis_service'] ?></span>
                            </td>
                            <td class="align-middle text-center text">
                                <span class="input-group-text text-center" style="background-color: #fc7f03; color:black;" id="basic-addon1"><?= $row['status_car'] ?></span>
                            </td>
                            <?php if($row['cuci']==="C") {?>
                            <td class="btn-toolbar">
                                <!-- <span class="input-group-text" style="background-color: #13eb42; " id="basic-addon1"><?= $row['FCin'] ?></span> -->
                                <form action="" method="post" onclick="return confirm('apakah yakin ingin input final checker in <?= $row['plat'] ?>')">
                                    <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                    <button class="btn in" id="fcin" name="fcin" style="background-color: #13eb42;"><span class="btn-text"><?= $row['FCin'] ?></span></button>
                                </form>
                                <!-- <span class="input-group-text" style="background-color: #eb1313; color:white; " id="basic-addon1"><?= $row['FCout'] ?></span> -->
                                <form action="" method="post" onclick="return confirm('apakah yakin ingin input final checker out <?= $row['plat'] ?>')">
                                    <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                    <button class="btn" id="fcout" name="fcout" style="background-color: #eb1313; color:white;"><span class="btn-text"><?= $row['FCout'] ?></span></button>
                                </form>
                            </td>
                            <?php } else { ?>
                                <td class="btn-toolbar">
                                    <!-- <span class="input-group-text" style="background-color: #13eb42; " id="basic-addon1"><?= $row['FCin'] ?></span> -->
                                    <form action="" method="post" onclick="return confirm('apakah yakin ingin input final checker in <?= $row['plat'] ?>')">
                                        <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                        <button class="btn in" id="fcin" name="fcin" style="background-color: #13eb42;"><span class="btn-text"><?= $row['FCin'] ?></span></button>
                                    </form>
                                    <!-- <span class="input-group-text" style="background-color: #eb1313; color:white; " id="basic-addon1"><?= $row['FCout'] ?></span> -->
                                    <form action="cek.php" method="post" onclick="return confirm('apakah yakin ingin input final checker out <?= $row['plat'] ?>')">
                                        <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                        <button class="btn" id="fcout_out" name="fcout_out" style="background-color: #eb1313; color:white;"><span class="btn-text"><?= $row['FCout'] ?></span></button>
                                    </form>
                                </td>
                            <?php } ?>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
    // Function ini dijalankan ketika Halaman ini dibuka pada browser
    $(function(){
    setInterval(ambil_data_ajax,100);//fungsi yang dijalan setiap detik, 1000 = 1 detik
    });
    
    //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
    function ambil_data_ajax() {

    $.ajax({
    url: 'ajax_timestamp.php',
    success: function(data) {
    $('#timestamp').html(data);
    },
    });

    }
    </script>

</body>

</html>