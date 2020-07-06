<?php
include "connect.php";
if(!$connect){exit();}
    $data_akhir=mysqli_query($connect,"select * `tb_tracking` order by id desc");
    $numrow = mysqli_num_rows($data_akhir);
    $response = array();
    if($numrow>0){
    	while($row = mysqli_fetch_assoc($data_akhir)){
    	    $id	        = $row['id'];
    		$id_kapal	= $row['id_kapal'];
    		$latitude	= $row['latitude'];
    		$longitude	= $row['longitude'];
    		$time		= $row['time'];
    		$time_gw	= $row['time_gw'];
    		$time_db	= $row['time_db'];
    		$response[] = array(
    		'id'    	=> $id,    
    		'id_kapal'	=> $id_kapal,
    		'latitude'	=> $latitude,
    		'longitude'	=> $longitude,
    		'time'		=> $time,
    		'time_gw'	=> $time_gw,
    		'time_db'	=> $time_db);
    	}
    }
    echo json_encode($response);

?>