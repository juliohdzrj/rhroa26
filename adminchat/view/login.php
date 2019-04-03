<?php
$dataPost=json_decode(file_get_contents('php://input'),true);
$regexp_mensaje="/^([0-9a-zA-ZáéíóúÁÉÍÓÚÜ\.\,!¡?¿\(\)\[\]\{\}%$#\"°;:+\/*\-+_\s]{0,20})$/";
if (!preg_match($regexp_mensaje,$dataPost["u"])) {
	$msgError="Error vuelve a intentarlo 1";
	$dataResult=array("msg"=>$msgError, "datosapi"=>"error");
	echo json_encode($dataResult);
	exit;
}
if (!preg_match($regexp_mensaje,$dataPost["p"])) {
	$msgError="Error vuelve a intentarlo 2";
	$dataResult=array("msg"=>$msgError, "datosapi"=>"error");
	echo json_encode($dataResult);
	exit;
}
include_once("../controller/Database2.php");
$database=new Database2;
$db=$database->getConnection();
include_once("../model/Inlog.php");
$logIn=new Inlog($db);
$logIn->userName=$dataPost["u"];
$logIn->password=md5($dataPost["p"]);
$resultLogIn=$logIn->getDataUser();
$row=$resultLogIn["code"]->fetch(PDO::FETCH_ASSOC);
$numRow=$resultLogIn["code"]->rowCount();
if($numRow==0){
	$msgError="Error, vuelve a intentarlo";
}else{
	$msgError=$resultLogIn["msg"];
}
$dataResult=array("msg"=>$msgError, "datosapi"=>$row);
echo json_encode($dataResult);
exit;
//$row=$resultEndChat["code"]->fetch(PDO::FETCH_ASSOC);
//$dataResult=array("msg"=>$resultEndChat["msg"], "datosapi"=>$row);