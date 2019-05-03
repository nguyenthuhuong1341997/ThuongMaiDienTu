<?php 
	include_once 'models/Customer.php';

	/**
	 * 
	 */
	class CustomerController
	{
		var $customer_model;
		function __construct()
		{
			$this->customer_model = new Customer();
		}

		public function index()
		{
			$customers = $this->customer_model->list();
			require_once('views/admin/customer/index.php');
		}

		function create()
		{
			require_once 'views/admin/customer/create.php';
		}

		function store()
		{
			$data=$_POST;

			$admin = $this->customer_model->insert($data);
			// print_r($data);
			// die();
			if ($admin==1) {
				setcookie('success','Thêm mới thành công',time()+5);
			} else {
				setcookie('error','Cập nhật không thành công',time()+5);
			}
			header('Location:?mod=admin&act=customer');
		}

		function edit()
		{
			$id=$_GET['id'];
			$admin=$this->customer_model->find($id);
			require_once('views/admin/customer/edit.php');
		}

		function update(){
			$data=$_POST;
			// var_dump('hfjfjf');
			$id=$_GET['id'];
			$admin = $this->customer_model->update($data,$id);
			if ($admin==1) {
				setcookie('success','Cập nhật thành công',time()+5);
			} else {
				setcookie('error','Cập nhật không thành công',time()+5);
			}
			header('Location:?mod=admin&act=customer');
		}

		function delete()
		{
			$id=$_GET['id'];
			$user= $this->customer_model->delete($id);
			echo json_encode([
	        	'data' => null,
	        	'status' => $user,
	      	]); 
		}

		
	}
 ?>