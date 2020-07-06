<?php
    include "connect.php";
    $data=query("SELECT id,flag,status FROM tb_monitoring_kapal order by id desc");
    var_dump($data);
	
?>