<?php 
	include_once 'models/User.php';

	/**
	 * 
	 */
	class UserController
	{
		var $user_model;
		function __construct()
		{
			$this->user_model = new User();
		}

		public function index()
		{
			$users = $this->user_model->list();
			require_once('views/admin/user/index.php');
		}

		function create()
		{
			require_once 'views/admin/user/create.php';
		}

		function store()
		{
			$data=$_POST;

			$admin = $this->user_model->insert($data);
			// print_r($data);
			// die();
			if ($admin==1) {
				setcookie('success','Thêm mới thành công',time()+5);
			} else {
				setcookie('error','Cập nhật không thành công',time()+5);
			}
			header('Location:?mod=admin&act=user');
		}

		function edit()
		{
			$id=$_GET['id'];
			$admin=$this->user_model->find($id);
			require_once('views/admin/user/edit.php');
		}

		function update(){
			$data=$_POST;
			// var_dump('hfjfjf');
			$id=$_GET['id'];
			$admin = $this->user_model->update($data,$id);
			if ($admin==1) {
				setcookie('success','Cập nhật thành công',time()+5);
			} else {
				setcookie('error','Cập nhật không thành công',time()+5);
			}
			header('Location:?mod=admin&act=user');
		}

		function delete()
		{
			$id=$_GET['id'];
			$user= $this->user_model->delete($id);
			echo json_encode([
	        	'data' => null,
	        	'status' => $user,
	      	]); 
		}

		function account()
		{
			require_once 'views/admin/user/account.php';
		}

		function choose()
		{
			require_once 'views/admin/user/upload.php';
		}

		function upload()
		{
			//upload image and move image to images folder
			$target_dir = "public/upload/profile/";
			$target_file = $target_dir . basename($_FILES["myFile"]["name"]);

			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["myFile"]["tmp_name"]);
			    print_r($check); 
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;

			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			    print_r($uploadOk); 
			}
			print_r("fdsdf");

			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["myFile"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}

			//update databse
			$admin = $this->user_model->updateProfile($target_file,$_SESSION['user']['id']);
			$_SESSION['user']['image']=$target_file;
			if ($admin==1) {
				setcookie('msg','Cập nhật thành công',time()+5);
			} else {
				setcookie('msg','Cập nhật không thành công',time()+5);
			}
			header('Location:?mod=admin&act=user&action=account');
		}

		function checkpassword()
		{
			$password=$_GET['password'];
			$id=$_GET['id'];
			$user= $this->user_model->checkpassword($id, $password);

			if($user != null){
		        echo json_encode([
		          'data' => $user,
		          'status' => true,
		        ]);
		      }else{
		        echo json_encode([
		          'data' => null,
		          'status' => false,
		        ]); 
			}
		}

		function editpassword($value='')
		{
			$newPass=$_GET['newpassword'];
			$id=$_GET['id'];
			$admin= $this->user_model->editpassword($id, $newPass);
			if ($admin==1) {
				setcookie('editpass','Cập nhật thành công',time()+5);
			} else {
				setcookie('editpass','Cập nhật không thành công',time()+5);
			}
			if($admin != 1){
		        echo json_encode([
		          'status' => false,
		        ]);
		      }else{
		        echo json_encode([
		          'status' => true,
		        ]); 
			}
		}

	}
 ?>