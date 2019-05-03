<?php 
	include_once 'Connection.php';
	/**
	 * 
	 */
	class User
	{
		var $user_conn;
		function __construct()
		{
			$object= new Connection();
			$this->user_conn= $object->conn;
		}

		function list()
		{
			$query="SELECT * FROM users WHERE id != ".$_SESSION['user']['id']." ORDER BY id DESC";
			$result= $this->user_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
			
		}

		function find($id)
		{
			$query= "SELECT * FROM users WHERE id=".$id;
			$result=  $this->user_conn->query($query)->fetch_assoc();
			return $result;
		}

		function insert($data)
		{
			
			$query="INSERT INTO users(username,code,email,password, phone, role_id, birthday,address,joined_date, image)
				values('".$data['name']."','".$data['code']."','".$data['email']."','".md5($data['pass'])."','".$data['phone_number']."','".$data['role']."','".$data['birthday']."','".$data['address']."','".$data['joined_date']."','".$data['image']."')";
			$result= $this->user_conn->query($query);
			
			return $result;
		}

		function update($data,$id)
		{
			$query="UPDATE users SET username='".$data['name']."',code='".$data['code']."',email='".$data['email']."',phone='".$data['phone_number']."',role_id='".$data['role']."',birthday='".$data['birthday']."',address='".$data['address']."',joined_date='".$data['joined_date']."', image= '".$data['image']."' WHERE id=".$id;
			$result= $this->user_conn->query($query);
			return $result;
		}

		function updateProfile($string,$id)
		{
			$query="UPDATE users SET image='".$string."' WHERE id=".$id;
			print_r($query);
			$result= $this->user_conn->query($query);
			return $result;
		}

		function delete($id)
		{
			$query= "DELETE FROM users WHERE id=" .$id;
			$result= $this->user_conn->query($query);
			return $result;
		}

		function checkpassword($id, $password)
		{
			$query= "SELECT * FROM users WHERE password='".md5($password)."' AND id= ".$id;
			
			$result=  $this->user_conn->query($query)->fetch_assoc();
			
			return $result;
		}

		function editpassword($id, $password)
		{
			$query="UPDATE users SET password='".md5($password)."'WHERE id=".$id;
			print_r($query);
			$result= $this->user_conn->query($query);
			return $result;
		}
	}
?>