<?php
date_default_timezone_set("Asia/Jakarta");
include "connect.php";
$id_kapal = $_GET['id_kapal'];
$longitude = $_GET['longitude'];
$latitude = $_GET['latitude'];
$time = $_GET['time'];
//$time_db = $_GET['time_db'];
$time_gw = $_GET['time_gw'];
$time_db = date("H:i:s");
$copy_huruf;
$query = "INSERT INTO `tb_tracking`(`id_kapal`, `latitude`, `longitude`, `time`, `time_gw`, `time_db`) VALUES ($id_kapal,$latitude,$longitude,'$time','$time_gw','$time_db')";
//$copy_huruf = $query;
$sql = mysqli_query($connect,$query);
//$sql = mysqli_query($connect,$copy_huruf);
var_dump($id_kapal,$latitude,$longitude,$time,$time_gw,$time_db);
?>