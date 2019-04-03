<?php
ini_set('session.gc_maxlifetime', 1440*60); // expires in 30 minutes
ini_set('session.cookie_lifetime', 1440*60); // 30 minutes
session_start();
$_SESSION["IN"]=session_id();
$trueIdSesion=session_valid_id($_SESSION["IN"]);
function session_valid_id($session_id)
{
	return preg_match('/^[-,a-zA-Z0-9]{1,128}$/', $session_id) > 0;
}
include_once("../controlador/database.php");
$database=new Database;
$db=$database->getConnection();
include_once("../modelo/Get_idchat.php");
if(isset($_SESSION["idchat"])){//obtenemos todos los mensajes del chat con el idchat
	$msg_chat=new Get_idchat($db);
	$arrayMSG=$msg_chat->selectMsg($_SESSION["idchat"]);
	$msgStore=array();
	while($row=$arrayMSG["code"]->fetch(PDO::FETCH_ASSOC)){
		$msgStore[$row["id_messages_chats"]]=$row["messages_chats"];
	}
}

$dataSession=base64_decode($_COOKIE["iu"]);
list($userName,$firstName,$lastName,$email,$phone)=explode("-", $dataSession);
$start1=substr($firstName,0,1);
$start2=substr($lastName,0,1);
$dataChat=array("name"=>strtoupper($firstName)." ".strtoupper($lastName),"email"=>$email,"phone"=>$phone,"start"=>strtoupper($start1).strtoupper($start2));
$data=array("msg"=>"continue", "datosapi"=>$dataChat,"msglist"=>$msgStore);
echo json_encode($data);
exit(0);



/*$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
if(isset($_COOKIE["idact"])&&session_id()==$_COOKIE["idact"]){
	exit(0);
}else{
	setcookie("idact", session_id ());
}*/
//exit(0);

