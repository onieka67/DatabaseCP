<?php
    $servername = "localhost";
    $dbname = "u484501816_oni";
    $username = "u484501816_onie";
    $password = "onionioni";
    $connect = mysqli_connect($servername,$username,$password,$dbname);
    if(!$connect){
        echo"gagal";
    }
    function query($query){
		global $connect;
		$result=mysqli_query($connect,$query);
		$rows=[];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[]=$row;
		}
		return $rows;	
	}
?>

