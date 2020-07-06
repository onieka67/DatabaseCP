<?php
    include "connect.php";
    $response=query("SELECT * FROM tb_monitoring_kapal WHERE flag=1");	
    //$data_status=query("SELECT * FROM tb_monitoring_kapal INNER JOIN tb_status ON tb_monitoring_kapal.status = tb_status.id_status WHERE flag=1 order by id desc limit 10");
    $data_status=query("SELECT * FROM tb_monitoring_kapal A JOIN tb_status B ON A.status = B.id_status JOIN tb_kapal C ON A.id_kapal = C.id_kapal where flag=1 order by id desc limit 10");
    echo json_encode($data_status);

?>