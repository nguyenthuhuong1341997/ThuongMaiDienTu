<?php 
	/**
	* 
	*/
	class Connection
	{
		var $conn;
		function __construct()
		{
			$servername="localhost";
			$username="root";
			$password="";
			$dbname="thuongmaidientu";
			// Tạo ra kết nối đến CSDL connection
			$this->conn= new mysqli($servername,$username,$password,$dbname);
			$this->conn->set_charset("utf8");
			// Kiểm tra kết nối
			if ($this->conn->connect_error) {
				die("Connection failed: " .$this->conn->connect_error);
			}
		}
	}
?>