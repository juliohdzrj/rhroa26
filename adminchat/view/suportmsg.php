<?php
$dataPost=json_decode(file_get_contents('php://input'),true);
$msgFull=$dataPost["msg"]."|user|AR";
//$dataResult=array("msg"=>$msgFull, "datosapi"=>$dataPost);
//echo json_encode($dataResult);
//exit;

include_once("../controller/Database.php");
$database=new Database;
$db=$database->getConnection();
include_once("../model/QuantityRowChat.php");
$setMsgSuport=new QuantityRowChat($db);
$setMsgSuport->idListChats=$dataPost["i"];
$setMsgSuport->msgChat=$msgFull;
$resultSetMsgSuport=$setMsgSuport->insertMsg();
//$row=$resultGetQuantity["code"]->fetch(PDO::FETCH_ASSOC);
$dataResult=array("msg"=>$resultSetMsgSuport["msg"], "datosapi"=>$resultSetMsgSuport["code"]);
echo json_encode($dataResult);
exit;