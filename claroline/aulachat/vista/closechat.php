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
// remove all session variables
session_unset();
// destroy the session
session_destroy();
$data=array("msg"=>"continue", "datosapi"=>$_SESSION);
echo json_encode($data);
exit(0);