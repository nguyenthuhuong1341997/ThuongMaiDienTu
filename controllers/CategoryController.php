<?php 
	include_once 'models/Category.php';

	/**
	 * 
	 */
	class CategoryController
	{
		var $category_model;
		function __construct()
		{
			$this->category_model = new Category();
		}

		public function index()
		{
			
			$products = $this->product_model->list();
			require_once('views/admin/product/index.php');
		}

		public function detail()
		{
			$id = $_GET['id'];
			$products = $this->product_model->listPro($id);
			echo json_encode([
		          'data' => $products,
		    ]);
		}

		public function create()
		{
			// $roles = $this->role_model->list();
			$category = $this->product_model->list();
			require_once ('views/admin/product/create.php');
		}

		public function store()
		{
			$data = $_POST;
			$user = $this->user_model->insert($data);
			if ($user) {
				setcookie('addUser','Thêm mới thành công',time()+5);
			} 
			header('Location:?mod=admin&act=user');
		}

		public function edit()
		{
			$id = $_GET['id'];
			$user = $this->user_model->find($id);
			$roles = $this->role_model->list();
			$sites = $this->site_model->list();
			require_once ('views/admin/user/edit.php');
		}

		public function update()
		{
			$data = $_POST;
			$id = $_GET['id'];

			$result = $this->user_model->update($data, $id);
			if ($result) {
				setcookie('updateUser','Sửa thành công',time()+5);
			} 
			header('Location:?mod=admin&act=user');

		}

		public function delete()
		{
			$id=$_GET['id'];
			$user= $this->user_model->delete($id);
			if($user) {
				echo json_encode([
		        	'data' => null,
		        	'status' => 'true',
	      		]);
	      		exit();
			}
			echo json_encode([
	        	'data' => null,
	        	'status' => 'false',
      		]);
		}
	}
 ?>