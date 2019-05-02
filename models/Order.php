<?php
include_once 'Connection.php';
/**
 *
 */
class Order {
	var $order_conn;
	const WAIT_CONFIRM_ORDER = 0;
	const COMPLETE_ORDER = 1;
	function __construct() {
		$object = new Connection();
		$this->order_conn = $object->conn;
	}

	function list() {
			$query="SELECT orders.*, cities.`name` AS city_name, districts.`name` AS district_name, village.`name` AS village_name, users.username AS user_name
			FROM orders, cities, districts, village, users
			WHERE orders.city_id = cities.id
			AND orders.district_id = districts.id
			AND orders.village_id = village.id
			AND orders.user_id = users.id
			AND orders.deleted_at IS NULL
			AND orders.status = ".SELF::WAIT_CONFIRM_ORDER."
			ORDER BY orders.id DESC";
			$result= $this->order_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$query1="SELECT order_detail.price, product_details.quantity ,products.name AS product_name, colors.`name` AS color_name,
				 sizes.`name` AS size_name, category.name AS category_name, category.parent_name
				FROM orders, order_detail, products, product_details, colors, sizes, 
				(SELECT categories.id, categories.name, parent.name AS parent_name
				FROM categories, (SELECT categories.id, categories.name from categories WHere categories.parent_id IS NULL) AS parent
				WHERE categories.parent_id = parent.id) AS category
				WHERE orders.id = order_detail.order_id
				AND order_detail.product_detail_id = product_details.id
				AND products.id = product_details.product_id
				AND colors.id = product_details.color_id
				AND sizes.id = product_details.size_id
				AND category.id = products.category_id
				AND orders.id = ".$row['id']."
				ORDER BY orders.id ASC";

				$result1= $this->order_conn->query($query1);
				$row['detail']= array();
				while ($row1= $result1->fetch_assoc()) {
					$row['detail'][]=$row1;
				}
				$data[]=$row;
			}
		return $data;
	}

	function listComplete() {
			$query="SELECT orders.*, cities.`name` AS city_name, districts.`name` AS district_name, village.`name` AS village_name, users.username AS user_name
			FROM orders, cities, districts, village, users
			WHERE orders.city_id = cities.id
			AND orders.district_id = districts.id
			AND orders.village_id = village.id
			AND orders.user_id = users.id
			AND orders.deleted_at IS NULL
			AND orders.status = ".SELF::COMPLETE_ORDER."
			ORDER BY orders.id DESC";
			$result= $this->order_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$query1="SELECT order_detail.price, product_details.quantity ,products.name AS product_name, colors.`name` AS color_name,
				 sizes.`name` AS size_name, category.name AS category_name, category.parent_name
				FROM orders, order_detail, products, product_details, colors, sizes, 
				(SELECT categories.id, categories.name, parent.name AS parent_name
				FROM categories, (SELECT categories.id, categories.name from categories WHere categories.parent_id IS NULL) AS parent
				WHERE categories.parent_id = parent.id) AS category
				WHERE orders.id = order_detail.order_id
				AND order_detail.product_detail_id = product_details.id
				AND products.id = product_details.product_id
				AND colors.id = product_details.color_id
				AND sizes.id = product_details.size_id
				AND category.id = products.category_id
				AND orders.id = ".$row['id']."
				ORDER BY orders.id ASC";

				$result1= $this->order_conn->query($query1);
				$row['detail']= array();
				while ($row1= $result1->fetch_assoc()) {
					$row['detail'][]=$row1;
				}
				$data[]=$row;
			}
		return $data;
	}

	function update($id){
		$query4= "UPDATE orders SET orders.status =".SELF::COMPLETE_ORDER." WHERE id=" .$id;
		$result4= $this->order_conn->query($query4);	
		return $result4;
	}

	function delete($id)
	{
		$query1= "SELECT order_detail.product_detail_id, order_detail.quantity, orders.id
				FROM orders, order_detail
				WHERE orders.id = order_detail.order_id
				AND orders.id = ".$id;
		$result1= $this->order_conn->query($query1);
		$data2= array();
		while ($row1= $result1->fetch_assoc()) {
			$quantity = 0;
			$query2= "SELECT product_details.quantity
						FROM product_details
						WHERE product_details.id =".$row1['product_detail_id'];
			$result2= $this->order_conn->query($query2)->fetch_assoc();
			$quantity = $row1['quantity'] + $result2['quantity'];
			$query3 = "UPDATE product_details SET product_details.quantity = ".$quantity."
						WHERE product_details.id = ".$row1['product_detail_id'];
			$result3= $this->order_conn->query($query3);
		}
		$query4= "UPDATE orders SET orders.deleted_at =1 WHERE id=" .$id;
		$result4= $this->order_conn->query($query4);	
		return $result4;
	}
}
?>