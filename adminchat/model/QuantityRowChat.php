<?php
class QuantityRowChat {
	private $table_name="list_chats";
	private $table_name1="user_chat";
	private $table_name2="messages_chats";
	public $idUser="";
	public $idListChats="";
	public $timestamp="";
	public $msgChat="";
	public function __construct($db)
	{
		$this->conn = $db;
	}
	function getQuantityChat(){
		$query="SELECT COUNT(*) AS numberrow FROM `".$this->table_name."` WHERE end_date IS NULL;";
		//return $this->table_name;
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:get_quantity_chat_'.$errorQuery[2],1);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
	function getListUserChat(){
		$query="SELECT * FROM `".$this->table_name."` WHERE end_date IS NULL;";
		//return $this->table_name;
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:get_list_user_chat_'.$errorQuery[2],2);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
	function getListUserClosedChat(){
		$query="SELECT * FROM `".$this->table_name."` WHERE end_date IS NOT NULL;";
		//return $this->table_name;
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:get_list_user_chat_'.$errorQuery[2],2);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}

	function getDataChat(){
		//return $this->idListChats;
		$query="SELECT messages_chats FROM `".$this->table_name2."` WHERE id_list_chats=".$this->idListChats.";";
		//return $this->table_name;
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:get_data_chat_'.$errorQuery[2],3);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}

	function getIdUsersChat(){
		//return $this->idListChats;
		$query="SELECT * FROM `".$this->table_name."` WHERE id_list_chats=".$this->idListChats.";";
		//return $this->table_name;
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:get_id_users_chat'.$errorQuery[2],4);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
	function getDataUser(){
		$query="SELECT name_user, email_user FROM `".$this->table_name1."` WHERE id_user_chat=".$this->idUser.";";
		//return $this->table_name;
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:get_data_user_chat_'.$errorQuery[2],5);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
	function insertMsg(){
		$query = "INSERT INTO
                    ".$this->table_name2."
                SET
                    id_list_chats = ?, messages_chats = ?";
		try {
			$stmt=$this->conn->prepare($query);
			$stmt->bindParam(1, $this->idListChats);
			$stmt->bindParam(2, $this->msgChat);
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
	function editChatEnd(){
		$this->getTimestamp();
		$query="UPDATE ".$this->table_name." 
    	SET `end_date`=?
    	WHERE `id_list_chats`=?;
    	";
		try {
			$stmt=$this->conn->prepare($query);
			$stmt->bindValue(1,$this->timestamp);
			$stmt->bindValue(2,$this->idUser);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:edit_chat_end_'.$errorQuery[2],444);
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