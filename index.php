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
						case '':
							$product->index();
							break;
						case 'create':
							$product->create();
							break;
						case 'store':
							$product->store();
							break;
						case 'productAddQuantity':
							$product->productAddQuantity();
							break;
						case 'updateQuantity':
							$product->updateQuantity();
							break;
						default:
							# code...
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
						default:
							# code...
							break;
					}
					break;
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