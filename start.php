<?php
require 'function.php';

$id = $_POST['id'];

$plat = query("SELECT * FROM data_sementara WHERE id = '$id'");



if (isset($_POST['stallin'])) {
    if (StallIn($_POST)) {
        echo"
            <script>
                alert('data stall IN di input');
            </script>
        ";
    }
}

if (isset($_POST['stallout'])) {
    if (Stallout($_POST)) {
        echo"
            <script>
                alert('data stall OUT di input');
            </script>
        ";
    }
}

if (isset($_POST['fcin'])) {
    if (fcin($_POST)) {
        echo"
            <script>
                alert('data final checker IN di input');
            </script>
        ";
    }
}

if (isset($_POST['fcout'])) {
    if (fcout($_POST)) {
        echo"
            <script>
                alert('data final checker OUT di input');
            </script>
        ";
    }
}

if (isset($_POST['fcout_out'])) {
    if (fcout_out($_POST)) {
        echo"
            <script>
                alert('data final checker OUT di input');
            </script>
        ";
    }
}

if (isset($_POST['cuciIn'])) {
    if (cuciIn($_POST)) {
        echo"
            <script>
                alert('data cuci IN di input');
            </script>
        ";
    }
}

if (isset($_POST['cuciout'])) {
    if (cuciout($_POST)) {
        echo"
            <script>
                alert('data cuci OUT di input');
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>start</title>
    <!-- <link rel="shortcut icon" href="img/img remove/red-black.png" type="image/x-icon"> -->
    <link rel="shortcut icon" href="img/img remove/red-blak-mits.png" type="image/x-icon">

  </head>
  <body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="#">
                <?php foreach ($plat as $row): ?>
            <!-- <img src="img/img remove/Mitsubishi.png" alt="" width="50" height="50" class="d-inline-block align-text-top"> -->
            <form action="cek.php" method="get">
                <button class="btn" id="finish" name="finish">
                    <input type="hidden" name="id" id="id" value="<?= $id ?>">
                    <img src="img/img remove/red-black.png" alt="" width="100" height="40" class="d-inline-block align-text-top">
                    <span class="fs-1 "><?= $row['plat'] ?> (<?= $row['cuci'] ?>)</span>
                </button>
            </form>
            <!-- <span class="fs-1 "><?= $row['plat'] ?> (<?= $row['cuci'] ?>)</span> -->
            <?php endforeach; ?> 
            </a>
        </div>
    </nav>

    <br><br><br> 
    <!-- <button type="button" class="btn-close" aria-label="Close"></button> -->
    <div class="container">
        
    <table class="table table-striped">
        <a href="index.php" class="btn btn-close" style="font-size: 30px;">x</a>
        <thead>
            <tr>
                <th>No</th>
                <th>Pekerjaan</th>
                <th>IN</th>
                <th>out</th>
            </tr>
        </thead>
        <?php foreach ($plat as $row): ?>
        <tbody>
            <?php if($row['cuci'] == 'C') {?>
            <tr>
                <th scope="row">1</th>
                <td>stall</td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-primary"  type="submit" id="stallin" name="stallin">IN</button>
                        <?= $row['stallin'] ?>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-danger" name="stallout" id="stallout" type="submit">OUT</button>
                        <?= $row['stallout'] ?>
                    </form>
                </td>
            </tr>

            <tr>
            <th scope="row">2</th>
                <td>Final checker</td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-primary"  type="submit" id="fcin" name="fcin">IN</button>
                        <?= $row['FCin'] ?>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-danger" name="fcout" id="fcout" type="submit">OUT</button>
                        <?= $row['FCout'] ?>
                    </form>
                </td>
            </tr>

            <tr>
            <th scope="row">3</th>
                <td>cuci</td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-primary"  type="submit" id="cuciIn" name="cuciIn">IN</button>
                        <?= $row['cuciin'] ?>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-danger" name="cuciout" id="cuciout" type="submit">OUT</button>
                        <?= $row['cuciout'] ?>
                    </form>
                </td>
            </tr>
            <?php }else { ?>
                <tr>
                <th scope="row">1</th>
                <td>stall</td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-primary"  type="submit" id="stallin" name="stallin">IN</button>
                        <?= $row['stallin'] ?>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-danger" name="stallout" id="stallout" type="submit">OUT</button>
                        <?= $row['stallout'] ?>
                    </form>
                </td>
            </tr>

            <tr>
            <th scope="row">2</th>
                <td>Final checker</td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-primary"  type="submit" id="fcin" name="fcin">IN</button>
                        <?= $row['FCin'] ?>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <button class="btn btn-danger" name="fcout_out" id="fcout_out" type="submit">OUT</button>
                        <?= $row['FCout'] ?>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <?php endforeach; ?>
        <form action="edit.php" method="get">
            <input type="hidden" id="id" name="id" value="<?= $id ?>">
            <button class="btn btn-outline-warning btn-lg" name="edit" id="edit" type="edit">edit</button>
        </form>
    </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>
