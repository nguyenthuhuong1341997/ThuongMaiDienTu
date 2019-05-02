<?php
include_once 'models/Statistical.php';

/**
 *
 */
class StatisticalController {
	var $statistical_model;
	function __construct() {
		$this->statistical_model = new Statistical();
	}

	public function revenue() {
		$years = $this->statistical_model->getYear();
		$year = $years[0]['year'];
		if (isset($_POST['revenue'])) {
			$year = $_POST['year'];
		}
		$revenueYears = $this->statistical_model->revenueYear($year);
		// print_r($revenueYears);
		// die();

		require_once 'views/admin/statistical/revenue.php';
	}

}
?>