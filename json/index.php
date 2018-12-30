<?php
/**
 * Created by PhpStorm.
 * User: iav
 * Date: 12/15/2018
 * Time: 2:20 AM
 */
include '../conf/config.php';
error_reporting(0);

if ($_GET) {
    $choose = $_GET['choose'];
    switch ($choose) {
        case 'q':
        $querry = $_GET['q'];
        $querryTampilData = mysqli_query($db, "Select * from is_obat where nama_obat = "."'".$querry."';");
        $arrayJson = array();
        while ($ambilData = mysqli_fetch_assoc($querryTampilData)){
        $arrayJson[]= $ambilData;
    }
        echo json_encode($arrayJson);
    break;
    case 'limit':
        $limit = $_GET['limit'];
        $querryTampilData = mysqli_query($db, "Select * from is_obat limit ".$limit);
        $arrayJson = array();
        while ($ambilData = mysqli_fetch_assoc($querryTampilData)){
        $arrayJson[]= $ambilData;
        }
        echo json_encode($arrayJson);
    break;
    case 'all':
        $querryTampilData = mysqli_query($db, "Select * from is_obat limit 30000");
        $arrayJson = array();
        while ($ambilData = mysqli_fetch_assoc($querryTampilData)){
        $arrayJson[]= $ambilData;
        }
        echo json_encode($arrayJson);
    break;
        
    default:
        $querryTampilData = mysqli_query($db, "Select * from is_obat limit 30000");
        $arrayJson = array();
        while ($ambilData = mysqli_fetch_assoc($querryTampilData)){
        $arrayJson[]= $ambilData;
        }
        echo json_encode($arrayJson);
    break;
    }
}
?>