<?php
$dataPost=json_decode(file_get_contents('php://input'),true);
if(!isset($dataPost["i"])){
	exit(0);
}
include_once("../controller/Database.php");
$database=new Database;
$db=$database->getConnection();
include_once("../model/QuantityRowChat.php");
$endchat=new QuantityRowChat($db);
$endchat->idUser=$dataPost["i"];
$resultEndChat=$endchat->editChatEnd();
//$row=$resultEndChat["code"]->fetch(PDO::FETCH_ASSOC);
//$dataResult=array("msg"=>$resultEndChat["msg"], "datosapi"=>$row);
$dataResult=array("msg"=>"ok", "datosapi"=>$resultEndChat);
echo json_encode($dataResult);
exit;