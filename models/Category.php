<?php 
	include_once 'Connection.php';
	/**
	 * 
	 */
	class Category
	{
		var $category_conn;
		function __construct()
		{
			$object= new Connection();
			$this->category_conn= $object->conn;
		}

		function listGender()
		{
			$query="SELECT * FROM categories WHERE parent_id IS NULL";
			$result= $this->category_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}
		function listCate()
		{
			$query="SELECT * FROM categories WHERE parent_id IS NOT NULL";
			$result= $this->category_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}
	}
?>