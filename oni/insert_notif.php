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
$nama_status = $GET['nama_status'];
$query = "INSERT INTO `tb_coba`(`id_kapal`, `latitude`, `longitude`, `status`, `time`, `id_gw`, `time_db`) VALUES ($id_kapal,$latitude,$longitude,$status,$time,$id_gw,'$time_db')";
 $sql = mysqli_query($connect,$query);
// var_dump($id_kapal,$latitude,$longitude,$status,$time,$id_gw,$time_db);
// $data_akhir=mysqli_query($connect,"SELECT * FROM tb_coba INNER JOIN tb_status ON tb_coba.status = tb_status.id_status WHERE flag=1 order by id desc limit 1");
// $data_akhir=query("select status from tb_coba INNER JOIN tb_status ON tb_coba.status = tb_status.id_status");
// $data_akhir=query("SELECT * FROM tb_monitoring_kapal INNER JOIN tb_status ON tb_monitoring_kapal.status = tb_status.id_status");

// $data_akhir=query("select * from tb_coba order by no desc limit 1");
// echo json_encode($data_akhir) ;
//var_dump($id_last);
//var_dump($data_akhir);

$id_last=query("select max(no) from tb_coba")[0]['max(no)'];
// $data_akhir=query("SELECT * FROM tb_monitoring_kapal A JOIN tb_status B ON A.status = B.id_status where A.id = $id_last ");
    $data_akhir=query("SELECT * FROM tb_coba A JOIN tb_status B ON A.status = B.id_status JOIN tb_kapal C ON A.id_kapal = C.id_kapal where A.no = $id_last");
// 	echo json_encode($data_akhir[0]);
if($sql){
    
    if($data_akhir){
      //  var_dump($data_akhir);
        $ch=curl_init("https://fcm.googleapis.com/fcm/send");
    $header=array("Content-Type:application/json","Authorization:key=AAAAq9BdKIM:APA91bHFvEjKVC0f63xLiVnSSvX_oBYY8DXikK2_dhflYUidZhm3HRUFBvLRL3-gpUcLrTBX0Uu4pQ-M9eJNx8iTJwiv78lEYa9jNRYEinpBq6M-r4pXfY_DekqI45yWvB3pw90qPRnb");
    //$data=json_encode(array("to"=>"/topics/all","data"=>array("title"=>$_REQUEST['title'],"message"=>$data_akhir[0])));
    //$data=json_encode(array("to"=>"/topics/all","data"=>array("id_kapal"=>$_REQUEST['id_kapal'],"latitude"=>$_REQUEST['latitude'],"longitude"=>$_REQUEST['longitude'],"status"=>$_REQUEST['status'],"nama_status"=>$_REQUEST['nama_status'],"time"=>$_REQUEST['time'])));
    $data=json_encode(array("to"=>"/topics/all","data"=>array("id_kapal"=>$_GET['id_kapal'],"latitude"=>$_GET['latitude'],"longitude"=>$_GET['longitude'],"status"=>$_GET['status'],"nama_status"=>$_GET['nama_status'],"time"=>$_GET['time'])));
    var_dump($data);
    // set URL and other appropriate options
    curl_setopt($ch,CURLOPT_HTTPHEADER,$header);//set custom HTTP headers
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//verify the peer's SSL certificate
    curl_setopt($ch,CURLOPT_POST,1);//request an HTTP POST
    
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//specify data to POST to server
    curl_exec($ch);
    }
}

?>