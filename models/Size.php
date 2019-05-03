<?php 
	include_once 'Connection.php';
	/**
	 * 
	 */
	class Size
	{
		var $size_conn;
		function __construct()
		{
			$object= new Connection();
			$this->size_conn= $object->conn;
		}

		function list()
		{
			$query="SELECT * FROM sizes";
			$result= $this->size_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}
	}
?>