<?php 
	include_once 'views/layout/admin/header.php';
?>
<script>
	
	
var dataPoints = [];
	window.onload = function () {
		var data = <?php echo json_encode($revenueYears); ?>;
		$.each(data, function(key, value){
			console.log(value['x'])
	        dataPoints.push({x: parseInt(value['x']), y: parseInt(value['y'])});
	    });
	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		title:{
			text: "Thu nhập theo hàng năm của cửa hàng",
			fontWeight: "normal",
			fontFamily: "arial"
		},
		axisY: {
			title: "VND",
			suffix: "VND"
		},
		axisX: {
			title: "Tháng",
		},
		data: [{
			type: "line",
			dataPoints : dataPoints,
			
		}]

	});
	 
	chart.render();
	 
	}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div class="right_col" role="main" id="order-wait-section">
        <div class="">
	            <div class="page-title">
	              	<div class="title_left">
	                	<h3>Thống kê</h3>
	              	</div>

	              	<div class="title_right">
		                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
			                <div class="input-group">
			                    <input type="text" class="form-control" placeholder="Tìm kiếm...">
			                    <span class="input-group-btn">
			                      <button class="btn btn-default" type="button"><i class="fa fa-arrow-circle-right"></i></button>
			                    </span>
			                </div>
		                </div>
	             	</div>
	            </div>

			<form action="?mod=admin&act=statistical&action=revenue" method="POST">
	            <div class="row" style="margin: 20px 0px;">
	              	<div class="col-md-3">
	              		<p>Năm</p>
	              		<select class="select2_single form-control" tabindex="-1" name="year">
		                    	<?php foreach ($years as $key => $value): ?>
		                    		<?php if ($key == $site_id): ?>
		                    		<option value="<?= $value['year']?>" selected="true"><?= $value['year']?></option>
		                    	<?php else: ?>
		                    		<option value="<?= $value['year']?>"><?= $value['year']?></option>
		                    	<?php endif ?>
		                    		
		                    	<?php endforeach ?>
		                  </select>
	              	</div>
	              	
	              	<div class="col-md-2">
	              		<p> </p>
	              		<button class="btn btn-info" name="revenue" style="margin-top: 19px;">Thống kê</button>
	              	</div>
	            </div>
			</form>
            
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
</div>

<?php 
	include_once 'views/layout/admin/footer.php';
?>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


