<?php
include "connect.php";
if(!$connect){exit();}
	
$data_akhir=mysqli_query($connect,"SELECT * FROM tb_coba order by no desc LIMIT 1");
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

?>