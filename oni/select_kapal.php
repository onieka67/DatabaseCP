<?php
include "connect.php";
if(!$connect){exit();}
$id_kapal = $_GET['id_kapal'];	
$query = mysqli_query($connect,"select * from `tb_kapal` where id_kapal='$id_kapal'");

$numrow = mysqli_num_rows($query);
$response = array();
if($numrow>0){
	while($row = mysqli_fetch_assoc($query)){
		$id_kapal	= $row['id_kapal'];
		$tipe_kapal	= $row['tipe_kapal'];
		$panjang	= $row['panjang'];
		$lebar		= $row['lebar'];
	//	$foto       = $row['foto'];
		$response[] = array(
		'id_kapal'	    => $id_kapal,
		'tipe_kapal'	=> $tipe_kapal,
		'panjang'	    => $panjang,
		'lebar'	        => $lebar,
	//	'foto'          => $foto
		);
	}
}	
echo json_encode($response);

?>