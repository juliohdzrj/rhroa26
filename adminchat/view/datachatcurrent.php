<?php
$dataPost=json_decode(file_get_contents('php://input'),true);
if(!isset($dataPost["i"])){
	exit(0);
}
include_once("../controller/Database.php");
$database=new Database;
$db=$database->getConnection();
include_once("../model/QuantityRowChat.php");
$getDataChat=new QuantityRowChat($db);

	$msgChat=[];
	$getDataChat->idListChats=$dataPost["i"];
	$resultGetDataChat=$getDataChat->getDataChat();
	while($row=$resultGetDataChat["code"]->fetch(PDO::FETCH_ASSOC)){
		list($msg,$type,$initial)=explode("|",$row["messages_chats"]);
		$msgChat[]=array("msg"=>$msg,"type"=>$type,"initial"=>$initial);
		/*$getListUserChat->idUser=$row["id_user_chat"];
		$resultGetDataUser=$getListUserChat->getDataUser();
		$row2=$resultGetDataUser["code"]->fetch(PDO::FETCH_ASSOC);
		$row["nameUser"]=$row2["name_user"];
		$row["emailUser"]=$row2["email_user"];
		$listChatActive[]=$row;*/
	};
	$resultGetIdUsersChat=$getDataChat->getIdUsersChat();
	$row2=$resultGetIdUsersChat["code"]->fetch(PDO::FETCH_ASSOC);
	$getDataChat->idUser=$row2["id_user_chat"];
	$resultDataUse=$getDataChat->getDataUser();
	$row3=$resultDataUse["code"]->fetch(PDO::FETCH_ASSOC);
//"idsUsers"=>$row2
	$dataResult=array("msgChat"=>$msgChat,"dataUser"=>$row3);

$dataResult=array("msg"=>$resultGetDataChat["msg"],"datosapi"=>$dataResult);
echo json_encode($dataResult);
exit;