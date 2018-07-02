<?php
session_start();
$dataSession=base64_decode($_COOKIE["iu"]);
list($userName,$firstName,$lastName,$email,$phone)=explode("-", $dataSession);
$start1=substr($firstName,0,1);
$start2=substr($lastName,0,1);
$dataChat=array("name"=>strtoupper($firstName)." ".strtoupper($lastName),"email"=>$email,"phone"=>$phone,"start"=>strtoupper($start1).strtoupper($start2));
$data=array("msg"=>"continue", "datosapi"=>$dataChat);
echo json_encode($data);
exit(0);