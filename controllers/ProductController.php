<?php 
	include_once 'models/Product.php';
	include_once 'models/Category.php';
	include_once 'models/Size.php';
	include_once 'models/Color.php';
	/**
	 * 
	 */
	class ProductController
	{
		var $product_model;
		var $category_model;
		var $size_model;
		var $color_model;
		function __construct()
		{
			$this->product_model = new Product();
			$this->category_model = new Category();
			$this->size_model = new Size();
			$this->color_model = new Color();
		}

		public function index()
		{
			
			$products = $this->product_model->list();
			$sizes = $this->size_model->list();
			$colors = $this->color_model->list();
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
			$genders = $this->category_model->listGender();
			$categories = $this->category_model->listCate();
			require_once ('views/admin/product/create.php');
		}

		public function store()
		{
			$data = $_POST;
			$product = $this->product_model->insert($data);
			if ($product) {
				setcookie('success','Thêm mới thành công',time()+5);
			} 
			header('Location:?mod=admin&act=product');
		}

		public function edit()
		{
			$id = $_GET['id'];
			$product = $this->product_model->find($id);
			// print_r($product);
			// die();
			$genders = $this->category_model->listGender();
			$categories = $this->category_model->listCate();
			require_once ('views/admin/product/edit.php');
		}

		public function update()
		{
			$data = $_POST;
			$id = $_GET['id'];

			$result = $this->product_model->update($data, $id);
			if ($result) {
				setcookie('success','Sửa thành công',time()+5);
			} 
			header('Location:?mod=admin&act=product');

		}

		public function delete()
		{
			$id=$_GET['id'];
			$product= $this->product_model->delete($id);
			if ($product) {
				setcookie('success','Xóa thành công',time()+5);
			} 
			header('Location:?mod=admin&act=product');
		}
		public function findDetail()
		{
			$id = $_GET['id'];
			$products = $this->product_model->findDetail($id);
			echo json_encode([
		          'data' => $products,
		    ]);
		}
		public function storeDetail()
		{
			$data = $_POST;
			$product = $this->product_model->insertDetail($data);

			if ($product) {
				setcookie('success','Thêm mới thành công',time()+5);
			} 
			header('Location:?mod=admin&act=product');
		}
		public function editDetail()
		{
			$id = $_GET['id'];
			$sizes = $this->size_model->list();
			$colors = $this->color_model->list();
			$product_detail = $this->product_model->findDetail($id);
			require_once ('views/admin/product/editDetail.php');
		}
		public function updateDetail()
		{
			$data = $_POST;
			$id = $_GET['id'];

			$result = $this->product_model->updateDetail($data, $id);
			if ($result) {
				setcookie('success','Sửa thành công',time()+5);
			} 
			header('Location:?mod=admin&act=product');
		}
		public function deleteDetail()
		{
			$id=$_GET['id'];
			$product= $this->product_model->deleteDetail($id);
			if ($product) {
				setcookie('success','Xóa thành công',time()+5);
			} 
			header('Location:?mod=admin&act=product');
		}
	}
 ?>