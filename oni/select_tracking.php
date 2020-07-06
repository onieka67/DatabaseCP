<?php 
	include 'connect.php';
// 	$data=query("SELECT * FROM tb_tracking");
// 	for($i=82;$i<=108;$i++){
// 	    $id=$data[$i]['id'];
// 		mysqli_query($connect,"DELETE FROM tb_tracking WHERE id='$id'");
// 	}
	$data=query("SELECT * FROM tb_tracking");
	var_dump($data);
?>