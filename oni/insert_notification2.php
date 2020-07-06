<?php
date_default_timezone_set("Asia/Jakarta");
include "connect.php";
$id_kapal = $_GET['id_kapal'];
$longitude = $_GET['longitude'];
$latitude = $_GET['latitude'];
$status = $_GET['status'];
$time = $_GET['time'];
$id_gw = $_GET['id_gw'];
//$time_db = $_GET['time_db'];
$time_db = date("H:i:s");
$copy_huruf;
$query = "INSERT INTO `tb_coba`(`id_kapal`, `latitude`, `longitude`, `status`, `time`, `id_gw`, `time_db`) VALUES ($id_kapal,$latitude,$longitude,$status,$time,$id_gw,'$time_db')";
//$copy_huruf = $query;
$sql = mysqli_query($connect,$query);
//$sql = mysqli_query($connect,$copy_huruf);
var_dump($id_kapal,$latitude,$longitude,$status,$time,$id_gw,$time_db);
if($sql){
     echo "berhasil";
    
    $data_akhir=mysqli_query($connect,"select no, id_kapal,latitude,longitude,status,time from `tb_coba` order by no desc limit 1");
    // $data_akhir=mysqli_query($connect,"select no, id_kapal,latitude,longitude,status,time from `tb_coba` order by no asc limit 1");
    $numrow = mysqli_num_rows($data_akhir);
    $response = array();
    if($numrow>0){
    	while($row = mysqli_fetch_assoc($data_akhir)){
    	    $no	        = $row['no'];
    		$id_kapal	= $row['id_kapal'];
    		$latitude	= $row['latitude'];
    		$longitude	= $row['longitude'];
    		$status		= $row['status'];
    		$time		= $row['time'];
    		$response[] = array(
    		'no'    	=> $no,    
    		'id_kapal'	=> $id_kapal,
    		'latitude'	=> $latitude,
    		'longitude'	=> $longitude,
    		'status'	=> $status,
    		'time'		=> $time);
    	}
    }
    echo json_encode($response);
// 	echo json_encode($data_akhir[0]);
     
     
    $ch=curl_init("https://fcm.googleapis.com/fcm/send");
    $header=array("Content-Type:application/json","Authorization:key=AAAAq9BdKIM:APA91bHFvEjKVC0f63xLiVnSSvX_oBYY8DXikK2_dhflYUidZhm3HRUFBvLRL3-gpUcLrTBX0Uu4pQ-M9eJNx8iTJwiv78lEYa9jNRYEinpBq6M-r4pXfY_DekqI45yWvB3pw90qPRnb");
    //$data=json_encode(array("to"=>"/topics/all","data"=>array("title"=>$_REQUEST['title'],"message"=>$data_akhir[0])));
    $data=json_encode(array("to"=>"/topics/all","data"=>array("id_kapal"=>$_REQUEST['id_kapal'],"latitude"=>$_REQUEST['latitude'],"longitude"=>$_REQUEST['longitude'],"status"=>$_REQUEST['status'],"time"=>$_REQUEST['time'])));
    // set URL and other appropriate options
    curl_setopt($ch,CURLOPT_HTTPHEADER,$header);//set custom HTTP headers
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//verify the peer's SSL certificate
    curl_setopt($ch,CURLOPT_POST,1);//request an HTTP POST
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//specify data to POST to server
    curl_exec($ch);
 }
 else{
     echo "gagal";
 }
 var_dump($data);

?>

