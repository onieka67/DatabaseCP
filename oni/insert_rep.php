<?php
date_default_timezone_set("Asia/Jakarta");
include "connect.php";
$id_kapal = $_GET['id_kapal'];
$longitude = $_GET['longitude'];
$latitude = $_GET['latitude'];
$status = $_GET['status'];
$time = $_GET['time'];
$id_rep = $_GET['id_rep'];
$id_gw = $_GET['id_gw'];
$flag = $_GET['flag'];
$time_rep = $_GET['time_rep'];
$time_gw = $_GET['time_gw'];
//$time_db = $_GET['time_db'];
$time_db = date("H:i:s");
$copy_huruf;
$query = "INSERT INTO `tb_routing`(`flag`,`id_kapal`, `latitude`, `longitude`, `status`, `time`, `id_rep`,`time_rep`, `id_gw`,`time_gw`, `time_db`) VALUES ($flag,$id_kapal,$latitude,$longitude,$status,'$time,$id_rep,'$time_rep',$id_gw,'$time_gw','$time_db')";
//$copy_huruf = $query;
$sql = mysqli_query($connect,$query);
var_dump($flag,$id_kapal,$latitude,$longitude,$status,$time,$id_rep,$time_rep,$id_gw,$time_gw,$time_db);

?>