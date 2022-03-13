<?php
require 'function.php';

$result = query("SELECT * FROM data_rekap");

if (isset($_POST['hapus'])) {
  if (hapus_rekap()) {
    echo" 
      <script>
        alert('data rekap telah di hapus');
        document.location.href= 'rekap.php';
      </script>
    ";
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .body {
          background-color: #87cefa
        }
        
        @media (min-width: 991.98px) {
        main {
            padding-left: 220px;
            padding-right: 10px;
        }
        .nav-img img{
            padding-left: 60px;
        }
        .item{
            padding-top: 2px;
            font-size: 15px;
        }
        .dropdown-menu li{
          padding: 5px 10px;
        }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 77px 0 0; /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 220px;
            z-index: 600;
        }

        @media (max-width: 991.98px) {
        .sidebar {
            height: auto;
        }
        .item button{
            font-size: 14px;
            padding-top: 2px;
            border:solid black 2px;
        }
        .item span{
            padding-top: 2px;
            font-size: 14px;
            border:solid black 2px;
        }
        .time h1{
          font-size: 10px;
          margin-top: 10px;
        }
        .time{
          margin-right: -30px ;
        }
        .dropdown-menu li{
          padding: 2px 10px;
        }
        .img img{
          height: 70px;
          margin-top: -19px;
          margin-left: 3px;
        }
        }

        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous">
    </script>

    <title>Service Mitsubishi yasmin</title>
  </head>
  <body class="body">

  <!--Main Navigation-->
<header>
  <!-- sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse" style="background-color:  #87cefa;" data-aos="fade-right">
    <div class="position-sticky" data-aos="fade-right">
      <div class="list-group list-group-flush mx-3 mt-4" data-aos="fade-right">
        <a
          href="#"
          class="list-group-item list-group-item-action py-2 ripple"
          aria-current="true"
          data-aos="fade-right"
          style="background-color: #87cefa"
        >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i>
        </a>
        <a href="index.php" class="list-group-item list-group-item-action py-2 ripple" style="background-color: #87cefa" data-aos="fade-right">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>On Working</span>
        </a>

        <a href="mobil_selesai.php" class="list-group-item list-group-item-action py-2 ripple" style="background-color: #87cefa" data-aos="fade-right">
            <i class="fas fa-lock fa-fw me-3"></i><span>Finish Working</span>
        </a>

        <a href="antrian.php" class="list-group-item list-group-item-action py-2 ripple" style="background-color: #87cefa" data-aos="fade-right">
            <i class="fas fa-chart-line fa-fw me-3"></i><span>An Queue</span>
        </a>

        <a href="dashboard.php" class="list-group-item list-group-item-action py-2 ripple" style="background-color: #87cefa" data-aos="fade-right">
          <i class="fas fa-chart-pie fa-fw me-3"></i><span>Dashboard</span>
        </a>

        <!-- <a href="#" class="list-group-item list-group-item-action py-2 ripple active" data-aos="fade-right"> -->
            <!-- <i class="fas fa-chart-bar fa-fw me-3"></i><span>Job Recap</span> -->
              <a class="btn dropdown-toggle list-group-item list-group-item-action py-2 ripple active" data-aos="fade-right" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-chart-bar fa-fw me-3"></i><span>Job Recap</span>
              </a>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: #87cefa">
                <li>
                  <span>
                    <form action="" method="post" >
                      <i class="fas fa-chart-pie fa-fw me-3"></i>
                      <button class="btn btn-danger btn-lg btn-block" id="hapus" name="hapus" onclick="return confirm('apakah data rekap sudah di download');">Hapus rekap</button>
                    </form>
                  </span>
                </li>
                <li>
                <i class="fas fa-chart-pie fa-fw me-3"></i>
                  <span>
                    <a href="eksport.php" class="btn btn-primary btn-lg btn-block">rekap service</a>
                  <!-- <i class="fas fa-chart-pie fa-fw me-3"></i><span><a href="eksport.php" class="btn btn-primary btn-lg btn-block">rekap service</a></span> -->
                </span></li>
              </ul>
      </div>
    </div>
  </nav>

  <!-- navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:  #87cefa;">
    <!-- Container wrapper -->
    <div class="container-fluid" style="background-color:  #87cefa;">
      <!-- Toggle button -->
      <!-- <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#sidebarMenu"
        aria-controls="sidebarMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button> -->
      <button 
      class="navbar-toggler border border-2" 
      type="button" 
      data-bs-toggle="collapse" 
      data-bs-target="#sidebarMenu" 
      aria-controls="sidebarMenu" 
      aria-expanded="false" 
      aria-label="Toggle navigation"
      data-aos="fade-right"
      >
      <span class="navbar-toggler-icon"></span>
    </button>

      <!-- Brand -->
      <a class="navbar-brand nav-img img" href="#" data-aos="fade-right">
        <img
          src="img/img remove/red-blak-mits.png"
          height="88"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Search form -->

      <!-- Center link -->
      <!-- <ul class="list-group bg-transparent mx-auto">
        <li class="list-group-item border-0 bg-transparent mx-auto">
            <h5 class="text-1 text-body" style="font-weight: bold;" >PT SUN STAR PRIMA MOTOR</h5>
        </li>
        <li class="list-group-item border-0 mx-auto bg-transparent">
            <h7 class="text-2 text-body">YASMIN-BOGOR</h7>
        </li>
        <li class="list-group-item border-0 mx-auto bg-transparent">
            <h class="text-2 text-body" style="font-family: calibri;">Service Flow Control</h>
        </li>
     </ul> -->

     <!-- Right links -->
     <ul class="navbar-nav ms-auto d-flex flex-row" data-aos="fade-left">

        <!-- Avatar -->

        <li class="nav-item time" style="padding-right: 30px; padding-top:10px" data-aos="fade-left">
          <h1 id="timestamp" class="form-control mr-sm-2 shadow p-3 mb-5 bg-body rounded"></h1>
        </li>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
</header>
    
  <!-- main -->
  <main class="main" style="margin-top: 130px;">
<div class="table-responsive">

<h2 class='mb-3'>Rekap Pekerjaan</h2>
  <table id="dtBasicExample" class="table" width="100%">
    <thead>
      <tr>
        <th class="th-sm">No</th>
        <th class="th-sm">Tanggal</th>
        <th class="th-sm">keterangan</th>
        <th class="th-sm">No antrian</th>
        <th class="th-sm">mobil masuk</th>
        <th class="th-sm">Cuci</th>
        <th class="th-sm">No. Polisi</th>
        <th class="th-sm">Mekanik</th>
        <th class="th-sm">Service Advisor</th>
        <th class="th-sm">Stall</th>
        <th class="th-sm">Estimasi selesai</th>
        <th class="th-sm">Pekerjaan Selesai</th>
        <th class="th-sm">Stall IN</th>
        <th class="th-sm">Stall OUT</th>
        <th class="th-sm">Final checker IN</th>
        <th class="th-sm">Final checker OUT</th>
        <th class="th-sm">Cuci IN</th>
        <th class="th-sm">Cuci OUT</th>
      </tr>
    </thead>
    <?php $no = 1 ?>
    <?php foreach ($result as $row): ?>
    <tbody>
      <tr>
        <th><?= $no ?></th>
        <td><?= date('d-m-Y', strtotime($row["tanggal"])); ?></td>
        <td><?= $row['ket'] ?></td>
        <td><?= $row['antrian'] ?></td>
        <td><?= $row['mobilmasuk'] ?></td>
        <td><?= $row['cuci'] ?></td>
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
    <tbody>
    <?php $no++ ?>
    <?php endforeach; ?>
  </table>
  </div>
 </main>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        // Function ini dijalankan ketika Halaman ini dibuka pada browser
        $(function(){
        setInterval(timestamp, 100);//fungsi yang dijalan setiap detik, 1000 = 1 detik
        });
        
        //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
        function timestamp() {
        $.ajax({
        url: 'ajax_timestamp.php',
        success: function(data) {
        $('#timestamp').html(data);
        },
        });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>