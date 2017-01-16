<?php 

class bd{

	private $host = 'localhost';
	private $user = 'root';
	private $password = '';
	private $database = 'twitter_clone';

	public function conecta_mysql(){

		if(!isset($this->db)){
			// Conecta ao banco
			$con = new mysqli($this->host, $this->user, $this->password, $this->database);
			if($con->connect_error){
				die("Falha ao tentar conectar com o banco de dados: " . $con->connect_error);
			}
			else{
				mysqli_query($con, "SET NAMES UTF8;");
				mysqli_query($con, "SET character_set_connection='uf8'");
				mysqli_query($con, "SET character_set_client=uf8");
				mysqli_query($con, "SET character_set_results=uf8");
				
				return $con;
			}
		}
	}

}

?>