<?php
include_once 'models/Product.php';
include_once 'models/Order.php';

/**
 *
 */
class OrderController {
	var $book_model;
	var $order_model;
	function __construct() {
		$this->book_model = new Product();
		$this->order_model = new Order();
	}

	public function index() {
		$orders = $this->order_model->list();
		$order_completes = $this->order_model->listComplete();
		require_once 'views/admin/order/index.php';
	}

	public function confirm()
	{
		$id=$_GET['id'];
		$order= $this->order_model->update($id);
		if ($order) {
			setcookie('success','Xác nhận đơn hàng thành công',time()+5);
		} else {
			setcookie('error','Xác nhận đơn hàng thất bại',time()+5);
		}
		header('Location:?mod=admin&act=order');
	}

	public function delete()
	{
		$id=$_GET['id'];
		$order= $this->order_model->delete($id);
		if ($order) {
			setcookie('success','Hủy đơn hàng thành công',time()+5);
		} else {
			setcookie('error','Hủy đơn hàng thất bại',time()+5);
		}
		header('Location:?mod=admin&act=order');
	}

}
?>