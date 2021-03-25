<?php
class Dbcon{
	private $host = "localhost";
	private $database='autoservis';
	private $user = "root";
	private $password = "";
	private $con;
	
	function __construct(){
		$this->con = $this->connection();
	}
	
	public function connection(){
		 $con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $con;
		
	}	   	
	
	public function fetchData($query){
	$data = mysqli_query($this->con,$query);
    while($row = mysqli_fetch_assoc($data)){
		$result[] = $row;
	}
    if(!empty($result)){
		return $result;
    }
	
	
	}
	
	
	
	

}
?>

