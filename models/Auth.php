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
			
			$query="SELECT users.*, roles.name AS role_name FROM users JOIN roles WHERE roles.id= users.role_id AND email='".$email."' AND password='".$pass."'";
			$result= $this->auth->query($query)->fetch_assoc();
			return $result;
		}
	}
 ?>