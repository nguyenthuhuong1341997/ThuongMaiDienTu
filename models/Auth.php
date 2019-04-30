<?php 
	include_once 'Connection.php';;

	/**
	 * 
	 */
	class Auth
	{
		
		var $auth;
		function __construct()
		{
			$connection = new Connection();
			$this->auth = $connection->conn;
		}

		function check($email,$pass){
			
			$query="SELECT * FROM users WHERE email='".$email."' AND password='".$pass."'";
			$result= $this->auth->query($query)->fetch_assoc();
			return $result;
		}
	}
 ?>