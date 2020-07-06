<?php
include "connect.php";
if(!$connect){exit();}
	
$query = mysqli_query($connect,"select no, id_kapal,latitude,longitude,status,time from `tb_monitoring` order by no desc limit 10");

$numrow = mysqli_num_rows($query);
$response = array();
if($numrow>0){
	while($row = mysqli_fetch_assoc($query)){
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

?>