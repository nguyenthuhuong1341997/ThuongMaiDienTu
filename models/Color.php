<?php 
	include_once 'Connection.php';
	/**
	 * 
	 */
	class Color
	{
		var $color_conn;
		function __construct()
		{
			$object= new Connection();
			$this->color_conn= $object->conn;
		}

		function list()
		{
			$query="SELECT * FROM colors";
			$result= $this->color_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}
	}
?>