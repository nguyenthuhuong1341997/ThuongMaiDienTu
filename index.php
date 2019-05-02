<?php 
	session_start();
	if(isset($_SESSION['user'])) {
		if (isset($_GET['mod'])) {
			$mod = $_GET['mod'];
		} else {
			$mod = 'login';
		}

		if (isset($_GET['act'])) {
			$act = $_GET['act'];
		} else {
			$act ='';
		}
		
		if (isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action ='';
		}
	} else{
		$mod = 'login';
		if (isset($_GET['act'])) {
			$act = $_GET['act'];
		} else {
			$act ='';
		}
		$action ='';
	}
	
	
	switch ($mod) {
		case 'admin': {
			include_once('controllers/ProductController.php');
			$product= new ProductController();
			include_once('controllers/UserController.php');
			$user= new UserController();		
			switch ($act) {
				case 'product':
					switch ($action) {
						case 'create':
							$product->create();
							break;
						case 'store':
							$product->store();
							break;
						case 'detail':
							$product->detail();
							break;
						case 'edit':
							$product->edit();
							break;
						case 'update':
							$product->update();
							break;
						case 'delete':
							$product->delete();
							break;
						case 'find_detail':
							$product->findDetail();
							break;
						case 'store_detail':
							$product->storeDetail();
							break;	
						case 'edit_detail':
							$product->editDetail();
							break;	
						case 'update_detail':
							$product->updateDetail();
							break;
						case 'delete_detail':
							$product->deleteDetail();
							break;
						default:
							$product->index();
							break;
					}
					break;
				case 'user':
					switch ($action) {
						case '':
							$user->index();
							break;
						case 'create':
							$user->create();
							break;
						case 'store':
							$user->store();
							break;
						case 'edit':{
							$user->edit();
							break;
						}
						case 'update':{
							$user->update();
							break;
						}
						case 'delete':
							$user->delete();
							break;
						case 'account':
							$user->account();
							break;
						case 'checkpassword':
							$user->checkpassword();
							break;
						case 'editpassword':
							$user->editpassword();
							break;
						default:
							# code...
							break;
					}
					break;

				case 'account':{
					switch ($action) {
						case 'changeprofile':

							$user->choose();
							break;
						case 'upload':

							$user->upload();
							break;
						default:
							# code...
							break;
					}
					break;
				}
				default:
					
					break;
			}	
			break;
		}
		case 'login': {
			include_once('controllers/AuthController.php');
			$auth= new AuthController();			
			switch ($act) {
				case '':
					$auth->login();
					break;
				case 'separation':
					$auth->separation();
					break;
				default:
					
					break;
			}	
			break;
		}	
		default:
			# code...
			break;
	}
 ?>
