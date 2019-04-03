<?php
ini_set('session.gc_maxlifetime', 1440*60); // expires in 30 minutes
ini_set('session.cookie_lifetime', 1440*60); // 30 minutes
session_start();
//print_r($_SESSION);
$current_id=session_id ();
include_once("../controlador/database.php");
$database=new Database;
$db=$database->getConnection();
include_once("../modelo/Get_idchat.php");
$id_chat=new Get_idchat($db);
if($current_id==$_SESSION["IN"]&&isset($_SESSION["idchat"])){//obtenemos nuevo id de chat
	$id_chat->idListChat=$_SESSION["idchat"];
	$id_chat->idUserChat=$_SESSION["idUserCurrent"];
//VERIFICAMOS DATOS DEL USUARIO ANONIMO
	$resDataUser=$id_chat->selectDataUser();
	$rowDU=$resDataUser["code"]->fetch(PDO::FETCH_ASSOC);
	if($rowDU["email_user"]=="Sin sesión"){
		$dataSession=base64_decode($_COOKIE["iu"]);
		list($userName,$firstName,$lastName,$email,$phone)=explode("-", $dataSession);
		if($email!=""){ //ACTUALIZAMOS DATOS DEL USUARIO
			$id_chat->nameUser=strtoupper($firstName." ".$lastName);
			$id_chat->emailUser=$email;
			$resDataUserUpdate=$id_chat->editDataUser();
			$rowUpdate=$resDataUserUpdate["code"]->fetch(PDO::FETCH_ASSOC);
			$val_msg=$rowUpdate;
		}
	}



	$msgFull=implode("|",$_POST["msgChatOne"]);
	$id_chat->msgArray=$msgFull;
	$res_insertMsg=$id_chat->insertMsg();



	$data=array("msg"=>$val_msg,"datosapi"=>$res_insertMsg,"datosUser"=>$rowDU);
	echo json_encode($data);
	exit(0);
	//$val_msg="misma session";
	//$data=array("msg"=>$val_msg,"datosapi"=>$_SESSION["idchat"],"array"=>$_POST["msgChatOne"]);
	//echo json_encode($data);
	//exit(0);
}else{
	/*$val_msg="nuevo id chat";
	$data=array("msg"=>$val_msg,"datosapi"=>$_SESSION);
	echo json_encode($data);
	exit(0);*/
	if($_POST["userData"]["email"]==""){
		$_POST["userData"]["name"]="Sin sesión";
		$_POST["userData"]["email"]="Sin sesión";
	}
	$id_chat->nameUser=$_POST["userData"]["name"];
	$id_chat->emailUser=$_POST["userData"]["email"];
	$res_idChatUser=$id_chat->getIdUser();
if($res_idChatUser["msg"]!="valdata"){
	$val_msg=$res_idChatUser["msg"];
	$data=array("msg"=>$val_msg,"datosapi"=>$res_idChatUser["code"]);
	echo json_encode($data);
	exit(0);
}
	$_SESSION["idUserCurrent"]=$res_idChatUser["code"];
	$id_chat->idUserChat=$res_idChatUser["code"];
	$res_idChat=$id_chat->getIdChat();
	$val_msg=$res_idChat["msg"];
	$_SESSION["idchat"]=$res_idChat["code"];
	if($res_idChat["msg"]!="valdata"){
		$val_msg=$res_idChat["msg"];
		$data=array("msg"=>$val_msg,"datosapi"=>$res_idChat["code"]);
		echo json_encode($data);
		exit(0);
	}
	$id_chat->idListChat=$res_idChat["code"];
	$msgFull=implode("|",$_POST["msgChatOne"]);
	$id_chat->msgArray=$msgFull;
	$res_insertMsg=$id_chat->insertMsg();
	$data=array("msg"=>$val_msg,"datosapi"=>$res_insertMsg,"msg2"=>$_POST);
	echo json_encode($data);
	exit(0);
};

