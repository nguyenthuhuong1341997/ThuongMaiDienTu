<?php 
	include_once 'Connection.php';
	/**
	 * 
	 */
	class Statistical
	{
		var $statistical_conn;
		function __construct()
		{
			$object= new Connection();
			$this->statistical_conn= $object->conn;
		}

		function getYear() {
			$query = "SELECT DISTINCT YEAR(orders.created_at) as year
						FROM orders ORDER BY year DESC";
			$result= $this->statistical_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}

		function revenueYear($year) {
			$query = "SELECT total_month_year.month as x, SUM(total) as y
					FROM (SELECT orders.id,  ord_detail_table.total , YEAR(orders.created_at) as year, MONTH(orders.created_at) as month
						FROM orders, (SELECT order_detail.order_id, SUM(order_detail.price*order_detail.quantity) AS total
											FROM order_detail
											GROUP BY order_detail.order_id) AS ord_detail_table
						WHERE orders.id = ord_detail_table.order_id) AS total_month_year
					WHERE total_month_year.year = ".$year."
					GROUP BY year, month";
			

			$result= $this->statistical_conn->query($query);
			$data= array();
			while ($row= $result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}

	}
?>