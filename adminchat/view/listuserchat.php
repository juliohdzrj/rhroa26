<?php
$dataPost=json_decode(file_get_contents('php://input'),true);
include_once("../controller/Database.php");
$database=new Database;
$db=$database->getConnection();
include_once("../model/QuantityRowChat.php");
$getListUserChat=new QuantityRowChat($db);
if($dataPost["t"]=="active"){
	$listChatActive=[];
	$resultGetListUserChat=$getListUserChat->getListUserChat();
	while($row=$resultGetListUserChat["code"]->fetch(PDO::FETCH_ASSOC)){
		$getListUserChat->idUser=$row["id_user_chat"];
		$resultGetDataUser=$getListUserChat->getDataUser();
		$row2=$resultGetDataUser["code"]->fetch(PDO::FETCH_ASSOC);
		$row["nameUser"]=$row2["name_user"];
		$row["emailUser"]=$row2["email_user"];
		$listChatActive[]=$row;
	};
	$dataResult=array("msg"=>$resultGetListUserChat["msg"],"datosapi"=>$listChatActive);
}
if($dataPost["t"]=="closed"){
	$listChatClosed=[];
	$resultGetListUserChat=$getListUserChat->getListUserClosedChat();
	while($row3=$resultGetListUserChat["code"]->fetch(PDO::FETCH_ASSOC)){
		$getListUserChat->idUser=$row3["id_user_chat"];
		$resultGetDataUser=$getListUserChat->getDataUser();
		$row4=$resultGetDataUser["code"]->fetch(PDO::FETCH_ASSOC);
		$row3["nameUser"]=$row4["name_user"];
		$row3["emailUser"]=$row4["email_user"];
		$listChatClosed[]=$row3;
	};
	$dataResult=array("msg"=>$resultGetListUserChat["msg"],"datosapi"=>$listChatClosed);
}
echo json_encode($dataResult);
exit;