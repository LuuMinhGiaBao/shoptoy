<?php
class connect{
	public $server;
	public $dbname;
	public $usernames;
	public $password;

	public function __construct(){
	 $this->server = "localhost";
	 $this->usernames ="root";
	 $this->password ="";
	 $this->dbname ="toyshop";	
	}	
	//1 option:1
	
	public function connectToMySQL():mysqli{
		$conn = new mysqli($this->server,
		$this->usernames,$this->password,$this->dbname);

		if($conn -> connect_error){
			die("Failed". $conn->connect_error);
		}
		else{
			/*echo "Connect!";*/
		}
		return $conn;
	}
	//Option 2: PDO
	public function connectToPDO():PDO{
		try{
		$conn =new PDO("mysql:host=$this->server;dbname=$this->dbname",$this->usernames,$this->password);
		//echo "Connect! PDO";
		}catch(PDOException $e){
			die("Failed".$e);
		}	
		return $conn;
		
	}
	
}
$c = new Connect();
$c-> connectToMySQL();
$c = new Connect();
$c->connectToPDO();

?>
