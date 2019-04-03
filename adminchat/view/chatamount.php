<?php
include_once("../controller/Database.php");
$database=new Database;
$db=$database->getConnection();
include_once("../model/QuantityRowChat.php");
$getQuantity=new QuantityRowChat($db);
$resultGetQuantity=$getQuantity->getQuantityChat();
$row=$resultGetQuantity["code"]->fetch(PDO::FETCH_ASSOC);
$dataResult=array("msg"=>$resultGetQuantity["msg"], "datosapi"=>$row);
echo json_encode($dataResult);
exit;