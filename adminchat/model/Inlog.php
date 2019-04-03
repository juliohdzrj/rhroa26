<?php
class Inlog{
	private $table_name="cl_user";
	public $userName="";
	public $password="";
	public function __construct($db)
	{
		$this->conn = $db;
	}
	function getDataUser(){
		//return $this->idListChats;
		$query="SELECT email,prenom,nom,isPlatFormAdmin FROM `".$this->table_name."` WHERE `username`='".$this->userName."' AND `password`='".$this->password."';";
		//return $this->table_name;
		try {
			$stmt=$this->conn->prepare($query);
			if($stmt->execute()){
				return array("msg"=>"valdata","code"=>$stmt);
			}else{
				$errorQuery=$stmt->errorInfo();
				throw new Exception('Error:get_data_user_'.$errorQuery[2],1);
			}
		}catch (Exception $e){
			return array("msg"=>$e->getMessage(),"code"=>$e->getCode());
		}
	}
}