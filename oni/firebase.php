<?php
// create a new cURL resource
$ch=curl_init("https://fcm.googleapis.com/fcm/send");
$header=array("Content-Type:application/json","Authorization:key=AAAAq9BdKIM:APA91bHFvEjKVC0f63xLiVnSSvX_oBYY8DXikK2_dhflYUidZhm3HRUFBvLRL3-gpUcLrTBX0Uu4pQ-M9eJNx8iTJwiv78lEYa9jNRYEinpBq6M-r4pXfY_DekqI45yWvB3pw90qPRnb");
//$data=json_encode(array("to"=>"fwk04O7AZKM:APA91bEBZaa2_3exsT01vjJqvj1ilBi7A4-OoLYODhAk829BpT3YMh4kNlkftwlhom9fOI_5yGk1goVMn0DszbXr6Sgw-jbTh6LV5_9BEDu5jIOfXXctM-0i4hYRPAcqeWl5O3ID5jm5","data"=>array("title"=>$_REQUEST['title'],"message"=>$_REQUEST['message'])));
//$data=json_encode(array("to"=>"/topics/allDevices","notification"=>array("title"=>$_REQUEST['title'],"message"=>$_REQUEST['message'])));
$data=json_encode(array("to"=>"/topics/all","data"=>array("title"=>$_REQUEST['title'],"message"=>$_REQUEST['message'])));
// set URL and other appropriate options
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);//set custom HTTP headers
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//verify the peer's SSL certificate
curl_setopt($ch,CURLOPT_POST,1);//request an HTTP POST
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//specify data to POST to server
curl_exec($ch);

?>