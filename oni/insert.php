<?php
include "connect.php";
$id_kapal = $_GET['id_kapal'];
$longitude = $_GET['longitude'];
$latitude = $_GET['latitude'];
$status = $_GET['status'];
$time = $_GET['time'];
$query = "INSERT INTO tb_monitoring (`id_kapal`,`latitude`,`longitude`,`status`,`time`) VALUES ('$id_kapal','$latitude','$longitude','$status','$time')";
$sql = mysqli_query($connect,$query);
//var_dump($sql);
if($sql){
    echo "berhasil";
}
else{
    echo "gagal";
}
?>

