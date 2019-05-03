<?php 
	include_once 'Connection.php';
	/**
	 * 
	 */
	class Customer
	{
		var $customer_conn;
		function __construct()
		{
			$object= new Connection();
			$this->customer_conn= $object->conn;
		}

		function list()
		{
			$query="SELECT * FROM customers  ORDER BY id DESC";
			$result= $this->customer_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
			
		}

		function find($id)
		{
			$query= "SELECT * FROM customers WHERE id=".$id;
			$result=  $this->customer_conn->query($query)->fetch_assoc();
			return $result;
		}

		function insert($data)
		{
			
			$query="INSERT INTO customers(username, address, password, phone, name, email)
				values('".$data['username']."','".$data['address']."','".md5($data['password'])."','".$data['phone_number']."','".$data['name']."','".$data['email']."')";
			$result= $this->customer_conn->query($query);
			
			return $result;
		}

		function update($data,$id)
		{
			$query="UPDATE customers SET username='".$data['username']."',address='".$data['address']."',email='".$data['email']."',phone='".$data['phone_number']."',address='".$data['address']."',name='".$data['name']."' WHERE id=".$id;
			$result= $this->customer_conn->query($query);
			return $result;
		}

		function updateProfile($string,$id)
		{
			$query="UPDATE users SET image='".$string."' WHERE id=".$id;
			print_r($query);
			$result= $this->customer_conn->query($query);
			return $result;
		}

		function delete($id)
		{
			$query= "DELETE FROM customers WHERE id=" .$id;
			$result= $this->customer_conn->query($query);
			return $result;
		}
	}
?>