<?php
class Database{
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "aularhchat";
    private $username = "hdzrj";
    private $password = "2601";
    public $conn;
    // get the database connection
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			// para pruebas: echo ("ok");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}


//para pruebas:
/*$connexion=new Database;
$estado=$connexion->getConnection();

$query1 = "SELECT * FROM `aularhchat`.`user_chat`;";
$stmt = $connexion->conn->prepare($query1);
		//$stmt = $this->conn->prepare($query1);
		$data1=$stmt->execute();
		echo $stmt->rowCount();
		//print_r($data1);*/





//print_r($estado);