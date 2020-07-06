<?php
date_default_timezone_set("Asia/Jakarta");
include "connect.php";
$id_kapal = $_GET['id_kapal'];
$longitude = $_GET['longitude'];
$latitude = $_GET['latitude'];
$status = $_GET['status'];
$time = $_GET['time'];
$id_gw = $_GET['id_gw'];
$time_db = $_GET['time_db'];
$time_db = date("H:i:s");
$sql = mysqli_query($connect,"INSERT INTO `tb_coba`(`id_kapal`, `latitude`, `longitude`, `status`, `time`, `id_gw`, `time_db`) VALUES ($id_kapal,$latitude,$longitude,$status,$time,$id_gw,'$time_db')");
function kirimnotif($data){
    $ch=curl_init("https://fcm.googleapis.com/fcm/send");
    $header=array("Content-Type:application/json","Authorization:key=AAAAq9BdKIM:APA91bHFvEjKVC0f63xLiVnSSvX_oBYY8DXikK2_dhflYUidZhm3HRUFBvLRL3-gpUcLrTBX0Uu4pQ-M9eJNx8iTJwiv78lEYa9jNRYEinpBq6M-r4pXfY_DekqI45yWvB3pw90qPRnb");
    //$data=json_encode(array("to"=>"/topics/all","data"=>array("title"=>$_REQUEST['title'],"message"=>$data_akhir[0])));
    $data=json_encode(array("to"=>"/topics/all","data"=>array("id_kapal"=>$data['tipe_kapal'],"latitude"=>$data['latitude'],"longitude"=>$data['longitude'],"nama_status"=>$data['nama_status'],"time"=>$data['time'])));
    // set URL and other appropriate options
    curl_setopt($ch,CURLOPT_HTTPHEADER,$header);//set custom HTTP headers
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//verify the peer's SSL certificate
    curl_setopt($ch,CURLOPT_POST,1);//request an HTTP POST
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//specify data to POST to server
    curl_exec($ch);
}
if($sql){
    $id_last=query("select max(no) from tb_coba")[0]['max(no)'];
    $data_akhir=query("SELECT * FROM tb_coba A JOIN tb_status B ON A.status = B.id_status JOIN tb_kapal C ON A.id_kapal = C.id_kapal where A.no = $id_last ")[0];
    var_dump($data_akhir);
    kirimnotif($data_akhir);
    
}

?>

