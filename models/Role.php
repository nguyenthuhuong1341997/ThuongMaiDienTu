<?php 
	include_once 'Connection.php';
	/**
	 * 
	 */
	class Role
	{
		var $role_conn;
		function __construct()
		{
			$object= new Connection();
			$this->role_conn= $object->conn;
		}

		function list()
		{
			$query="SELECT * FROM roles ";
			$result= $this->role_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
			
		}

	}
?>