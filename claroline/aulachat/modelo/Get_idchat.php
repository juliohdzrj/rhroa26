<?php
/**
 * Created by PhpStorm.
 * User: julio.ramos
 * Date: 28/06/2018
 * Time: 10:13 AM
 */
class Get_idchat {
	private $table_name="user_chat";
	private $table_name1="list_chats";
	private $table_name2="messages_chats";
	private $timestamp;
	public $nameUser;
	public $emailUser;
	public $msgArray;

	public $idUserChat;
	public $idListChat;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	function getIdUser(){
		//return $this->emailUser;
		$query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name_user = ?, email_user = ?";
		try {
			$stmt=$this->conn->prepare($query);
			$stmt->bindParam(1, $this->nameUser);
			$stmt->bindParam(2, $this->emailUser);
			if($stmt->execute()){
				$last_id = $this->conn->lastInsertId();
				return array("msg"=>"valdata","code"=>$last_id);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:getIdChat_'.$errorQuery[2],111);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
	function getIdChat(){
		$this->getTimestamp();
		//return $this->emailUser;
		$query = "INSERT INTO
                    " . $this->table_name1 . "
                SET
                    start_date = ?, id_user_chat = ?";
		try {
			$stmt=$this->conn->prepare($query);
			$stmt->bindParam(1, $this->timestamp);
			$stmt->bindParam(2, $this->idUserChat);
			if($stmt->execute()){
				$last_id = $this->conn->lastInsertId();
				$this->idListChat=$last_id;
				return array("msg"=>"valdata","code"=>$last_id);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:getIdChat_'.$errorQuery[2],222);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
	function insertMsg(){
		$this->getTimestamp();
		$query = "INSERT INTO
                    " . $this->table_name2 . "
                SET
                    id_list_chats = ?, messages_chats = ?";
		try {
			$stmt=$this->conn->prepare($query);
			$stmt->bindParam(1, $this->idListChat);
			$stmt->bindParam(2, $this->msgArray);
			if($stmt->execute()){
				$last_id = $this->conn->lastInsertId();
				$this->idListChat=$last_id;
				return array("msg"=>"valdata","code"=>$last_id);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:getIdChat_'.$errorQuery[2],333);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
	function selectMsg($numListID){
		$query="SELECT * FROM ".$this->table_name2." WHERE `id_list_chats`=".$numListID.";";
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:get_msg_chat_'.$errorQuery[2],444);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
	function selectOldMsg($idlist,$oldidmsg){
		$query="SELECT * FROM ".$this->table_name2." WHERE `id_list_chats`=".$idlist." AND `id_messages_chats` > ".$oldidmsg."  ;";
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:select_old_msg_'.$errorQuery[2],4444);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}

	function selectDataUser(){
		$query="SELECT * FROM ".$this->table_name." WHERE `id_user_chat`=".$this->idUserChat.";";
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:select_data_user_'.$errorQuery[2],555);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}

	function editDataUser(){
		$query="UPDATE ".$this->table_name." 
    	SET `name_user`=:nameUser,
    	    `email_user`=:emailUser
    	WHERE `id_user_chat`=:idUserChat
    	";
		try {
			$stmt=$this->conn->prepare($query);
			$stmt->bindValue(":nameUser", $this->nameUser);
			$stmt->bindValue(":emailUser", $this->emailUser);
			$stmt->bindValue(":idUserChat", $this->idUserChat);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:edit_data_user_'.$errorQuery[2],777);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
	function getTimestamp(){
		date_default_timezone_set('Mexico/General');
		$this->timestamp = date('Y-m-d H:i:s');
	}
}