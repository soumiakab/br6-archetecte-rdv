<?php

class DB{
   	
	private	$servername='localhost';
	private	$db="architectedb";
	private	$username="root";
	private	$passw="";
	public $con;

	public static function connect()
	{
    
		$con=new PDO("mysql:host=localhost;dbname=architectedb","root",'');
		
		return $con;
	

	}

	 public function deconnect()
	{
			return $this->con = null;

	}
}



?>