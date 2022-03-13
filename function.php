<?php
$conn = mysqli_connect("localhost",'root','','mitsubishi');

function query ($data){
    global $conn;

    $result = mysqli_query($conn,$data);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }

    return $rows;
}

function tambah ($data){
    global $conn;
    $masuk = htmlspecialchars($data['masuk']);
    $plat=htmlspecialchars($data['plat']);
    $antrian = htmlspecialchars($data['antrian']);

    $query = "INSERT INTO `antri`(`id`,`mobilmasuk`, `antrian`, `plat`) VALUES ('','$masuk','$antrian','$plat')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function editSA($data){
    global $conn;

    
    $id = $data['id'];
    $result = query("SELECT * FROM antri WHERE id = '$id'")[0];
    $cuci = htmlspecialchars($data['cuci']);
    $namaSA = htmlspecialchars($data['namaSA']);
    $jenis = htmlspecialchars($data['jenis']);
    $estimasi = htmlspecialchars($data['estimasi']);
    $mobil = $result['mobilmasuk'];
    $plat = $result['plat'];
    $antrian = $result['antrian'];

    $query2 = "INSERT INTO `data_sementara`(`id`, `ket`, `jenis_service`, `cuci`, `status_car`, `mobilmasuk`, `antrian`, `plat`, `namaPE`, `namaSA`, `stall`, `estimasi`, `stallin`, `stallout`, `FCin`, `FCout`, `cuciin`, `cuciout`) VALUES ('','','$jenis','$cuci','','$mobil','$antrian','$plat','','$namaSA','','$estimasi','','','','','','')";

    mysqli_query($conn,$query2);
    mysqli_query($conn,"DELETE FROM antri WHERE id  = '$id'");
    return mysqli_affected_rows($conn);

}

function editPE($data){
    global $conn;

    $id = $data['id'];
    $namaPE = htmlspecialchars($data['namaPE']);
    $stall = htmlspecialchars($data['stall']);

    $query = "UPDATE data_sementara SET
    namaPE = '$namaPE',
    stall = '$stall'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);

}

function StallIn($data){
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('G:i');
    global $conn;

    $id = $data['id'];
    $query = query("SELECT stall FROM data_sementara WHERE id = '$id'")[0];
    $status = "pengerjaan di";
    $hasil = "{$status} {$query['stall']}";
    
    $result="UPDATE data_sementara SET 
    stallin = '$jam',
    status_car = '$hasil'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$result);
    return mysqli_affected_rows($conn);
}

function Stallout($data){
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('G:i');
    global $conn;

    $id = $data['id'];
    $query = query("SELECT stall FROM data_sementara WHERE id = '$id'")[0];
    $status = "pengerjaan telah selesai dari ";
    $hasil = "{$status} {$query['stall']}";
    $ket = "final checker";
    
    $result="UPDATE data_sementara SET 
    stallout = '$jam',
    status_car = '$hasil',
    ket = '$ket'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$result);
    return mysqli_affected_rows($conn);
}

function fcin($data){
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('G:i');
    global $conn;

    $id = $data['id'];
    $status = "Kendaraan sedang di periksa oleh final checker";
    
    $result="UPDATE data_sementara SET 
    FCin = '$jam',
    status_car = '$status'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$result);
    return mysqli_affected_rows($conn);
}

function fcout($data){
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('G:i');
    global $conn;

    $id = $data['id'];
    $status = "kendaraan telah di periksa oleh final checker";
    $ket = "cuci";
    
    $result="UPDATE data_sementara SET 
    FCout = '$jam',
    status_Car = '$status',
    ket = '$ket'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$result);
    return mysqli_affected_rows($conn);
}


function fcout_out($data){
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('G:i');
    global $conn;

    $id = $data['id'];
    $status = "kendaraan telah di periksa oleh final checker";
    
    $result="UPDATE data_sementara SET 
    FCout = '$jam',
    status_Car = '$status'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$result);
    return mysqli_affected_rows($conn);
}

function cuciIn($data){
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('G:i');
    global $conn;

    $id = $data['id'];
    $status = "kendaraan sedang di cuci";

    $result="UPDATE data_sementara SET 
    cuciin = '$jam',
    status_car = '$status'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$result);
    return mysqli_affected_rows($conn);
}

function cuciout($data){
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('G:i');
    global $conn;

    $id = $data['id'];
    $status = "kendaraan telah selesai di cuci";

    $result="UPDATE data_sementara SET 
    cuciout = '$jam',
    status_car = '$status'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$result);
    return mysqli_affected_rows($conn);
}

function estimasiUpdate($data){
    global $conn;

    $id = $data['id'];
    $time = $data['time'];

    $result = "UPDATE data_sementara SET
    estimasi = '$time'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$result);
    return mysqli_affected_rows($conn);
}

function rekap($data){
    global $conn;

    date_default_timezone_set('Asia/Jakarta');
    $date = new DateTime();
    $tgl= $date->format('Y-m-d');
    $jam = $date->format('G:i');

    $id = $data['id'];
    $plat = $data['plat'];
    $namaPE = $data['namaPE'];
    $stall = $data['stall'];

    $result = query("SELECT * FROM data_sementara WHERE id = '$id'")[0];

    $ket = $result['ket'];
    $cuci = $result['cuci'];
    $antrian = $result['antrian'];
    $masuk = $result['mobilmasuk'];
    $namaSA = $result['namaSA'];
    $estimasi = $result['estimasi'];
    $stallin = $result['stallin'];
    $stallout = $result['stallout'];
    $fcin = $result['FCin'];
    $fcout = $result['FCout'];
    $cuciin = $result['cuciin'];
    $cuciout = $result['cuciout'];
    
    $query = "INSERT INTO `data_rekap`(`id`, `tanggal`, `ket`, `waktu_selesai`, `cuci`, `mobilmasuk`, `antrian`, `plat`, `namaPE`, `namaSA`, `stall`, `estimasi`, `stallin`, `stallout`, `FCin`, `FCout`, `cuciin`, `cuciout`) VALUES ('','$tgl','$ket','$jam','$cuci','$masuk','$antrian','$plat','$namaPE','$namaSA','$stall','$estimasi','$stallin','$stallout','$fcin','$fcout','$cuciin','$cuciout')";

    $query2 = "DELETE FROM `data_sementara` WHERE id = '$id'";

    mysqli_query($conn,$query);

    mysqli_query($conn,$query2);

    return mysqli_affected_rows($conn);
}

function cari($data){
    $query = "SELECT * FROM data_sementara 
            WHERE
            plat like '%$data%'
            " ;
    
    return query($query);

}

function cari2($data){
    $query = "SELECT * FROM antri 
            WHERE
            plat like '%$data%'
            " ;
    
    return query($query);

}

function hapus($data){
    global $conn;

    $id = $data['id'];

    $query=("DELETE FROM data_sementara WHERE id = '$id'");

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus2($data){
    global $conn;

    $id = $data['id'];

    $query=("DELETE FROM antri WHERE id = '$id'");

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus_rekap(){
    global $conn;

    mysqli_query($conn,"DELETE FROM `data_rekap`");

    return mysqli_affected_rows($conn);
}

function edit($data){
    global $conn;

    $id = $_POST['id'];
    $antrian = $data['antrian'];
    $estimasi = $data['estimasi'];
    $namaSA = $data['namaSA'];

    $query = "UPDATE data_sementara SET
    antrian = '$antrian',
    estimasi = '$estimasi',
    namaSA = '$namaSA'
    WHERE id = '$id'
    ";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function cek_daftarMekanik($id){
    $query=query("SELECT namaPE FROM data_sementara WHERE id = '$id'")[0];

    if($query['namaPE'] == '' || $query['namaPE'] == 'please insert stall'){
        return false;
    }else {
        return true;
    }
}
?>
