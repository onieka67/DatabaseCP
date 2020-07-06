<?php
header("Content-type: application/json; charset=utf-8");
include "connect.php";
$user = $_GET['user'];
$pass = $_GET['pass'];
    
$sql2="SELECT user, pass FROM tb_user WHERE user = '$user'";
$result = $connect->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $user = "" . $row["user"];
       $pass = "" . $row["pass"];
       
       if($pass == $pass){
           $login_status = "berhasil";
           $result2[] = array(
           'login_status' => $login_status,
           );
           echo json_encode($result2);
       }
       
       else{
           $login_status2 = "gagal";
           $result3[] = array(
           'login_status' => $login_status2,
           );
           echo json_encode($result3);
       }
    }
} 
else {
    echo "0 results";
}
?>