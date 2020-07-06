<?php
    include "connect.php";
    $id_last_data = query("SELECT * FROM tb_monitoring_kapal order by id desc LIMIT 1")[0]['id'];
    mysqli_query($connect,"UPDATE tb_monitoring_kapal SET flag='0' WHERE id='$id_last_data'");
?>

