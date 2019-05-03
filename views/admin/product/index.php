<?php 
	include_once 'views/layout/admin/header.php';
?>
<div class="right_col list-book" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Quản Lý Sản Phẩm</small></h3>
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

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  	<div class="x_title">
                    	<h2>Danh sách sản phẩm</small></h2>
                    	<ul class="nav navbar-right panel_toolbox">
                      		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      		<li class="dropdown">
                        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        		<ul class="dropdown-menu" role="menu">
                          			<li><a href="#">Settings 1</a></li>
                          			<li><a href="#">Settings 2</a></li>
                        		</ul>
                      		</li>
                      		<li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    	</ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  	<div class="row">
                  		<div class="col-md-6">
                  			<a href="?mod=admin&act=product&action=create" class="btn btn-success"><i class="fa fa-plus-circle"></i>Thêm mới</a>
                  		</div>
                  	</div>
                    <table id="datatable-product" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          	<th>ID</th>
                          	<th>Tên sản phẩm</th>
          					        <th>Mô tả</th>
          					        <th>Giá</th>
          					        <th>Thời trang</th>
          					        <th>Thể loại</th>
          					        <th>Hành động</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($products as $key => $value) { ?>
			    		
			      		
            					    		<tr id="<?php echo $value['id']; ?>">
            				    			<td><?=$value['id']  ?></td>
            				    			<td><?=$value['name']  ?></td>
            						        <td><?=$value['description']  ?></td>
            						        <td><?php echo number_format($value['price'], 0) . "&nbsp;₫"; ?></td>
            						        <td><?=$value['parent_name'] ?></td>
            						        <td><?= $value['category_name']  ?></td>
            						        <td>
            									<a data-target="#myModal-detail" class="btn btn-info infoPro" title="Xem chi tiết sản phẩm" data-toggle="modal" idPro="<?=$value['id']  ?>"><i class="fa fa-eye"></i></a>

            									<a href="?mod=admin&act=product&action=edit&id=<?= $value['id']?>" class="btn btn-warning" title="Sửa thông tin sản phẩm"><i class="fa fa-edit"></i></a>
            									<a idPro="<?= $value['id'] ?>" class="btn btn-danger delete" title="Xóa sản phẩm"><i class="fa fa-trash-o"></i></a>
            						        </td>
            					      	</tr>				
            						<?php } ?>
                      	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal-detail" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" style="float: left;margin-right:20px">Thông tin sản phẩm</h4>
				<a data-target="#myModal-addPro" class="btn btn-info" title="Thêm sản phẩm" data-toggle="modal"><i class="fa fa-plus"></i></a>
				
			</div>
			<div class="modal-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTableProductDetail" style="border-bottom: 1px solid #F2F2F2">
		            <thead>
		                <tr>
		                    <th style="text-align: center;border-bottom:none">ID</th>
		                    <th style="text-align: center;border-bottom:none">Mã kích cỡ</th>
		                    <th style="text-align: center;border-bottom:none">Mã màu</th>
		                    <th style="text-align: center;border-bottom:none">Số lượng</th>
		                    <th style="text-align: center;border-bottom:none">Hành động</th>
		                </tr>
		            </thead>
		            <tbody>
		            </tbody>
                </table>     
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<div id="myModal-detail-product" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thông tin sản phẩm</h4>
			</div>
			<div class="modal-body" style="height: 200px;">
                <div class="col-md-3">
                    <img id="imagePro" src="" alt="" style="width: 170px; height: 170px; border-radius: 50%">
                </div>
                <div class="col-md-8 col-md-offset-1">
                    <div class="row">
                      <div class="col-md-5"><b>Tên sản phẩm</b></div>
                      <div class="col-md-7"><p id="namePro"></p></div>
                    </div>
                    <div class="row">
                      <div class="col-md-5"><b >Kích cỡ</b></div>
                      <div class="col-md-7"><p id="sizePro"></p></div>
                    </div>
                    <div class="row">
                      <div class="col-md-5"><b>Màu sắc</b></div>
                      <div class="col-md-7"><p id="colorPro"></p></div>
                    </div>      
                    <div class="row">
                      <div class="col-md-5"><b>Số lượng</b></div>
                      <div class="col-md-7"><p id="quantityPro"></p></div>
                    </div>
                </div>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<div id="myModal-addPro" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Thông tin sản phẩm</h4>
			</div>
			<div class="modal-body">
        <form action="?mod=admin&act=product&action=store_detail" method="POST" role="form" enctype="multipart/form-data">

           	<div class="form-group">
          		<label for="">ID sản phẩm</label>
          		<input id="inputIdDetail" type="number" class="form-control" name="product_id" readonly="">
          	</div>
          	
          	<div class="form-group">
          		<label for="">Kích cỡ</label>
          		<select name="size_id" id="input" class="form-control" required="required">
          			<?php 
          				foreach ($sizes as $size) {
          					
          			 ?>
          			<option value="<?= $size['id'] ?>"><?= $size['name'] ?></option>
          			<?php 
          				}
          			 ?>
          		</select>
          	</div>

          	<div class="form-group">
          		<label for="">Màu sắc</label>
          		<select name="color_id" id="input" class="form-control" required="required">
          			<?php 
          				foreach ($colors as $color) {
          					
          			 ?>
          			<option value="<?= $color['id'] ?>"><?= $color['name'] ?></option>
          			<?php 
          				}
          			 ?>
          		</select>
          	</div>
          
          	<div class="form-group">
          		<label for="">Số lượng</label>
          		<input type="number" class="form-control" name="quantity" placeholder="Nhập số lượng">
          	</div>

          	 <div class="form-group">
            <label for="">Ảnh</label>
            <input type="file" class="form-control" id="" name="image" required>
        </div>
        	<button type="submit" class="btn btn-primary">Thêm</button>
        </form>                           
		</div>
	</div>
</div>	
<?php 
	include_once 'views/layout/admin/footer.php';
	
?>
<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('click','.infoPro',function(){
			var product_id= $(this).attr('idPro');
			$('#inputIdDetail').val(product_id);
			$.ajax({
		    	url: '?mod=admin&act=product&action=detail&id='+product_id,
		    	type: 'post',
		    	success: function(data){
		    		$('#myModal-detail tbody').children().remove();
		    		var result = JSON.parse(data);	
		    		console.log(result);
		    		$.each(result.data , function(key,value){
		    			$('#myModal-detail tbody').append('<tr><td style="text-align: center;" >'+value.id+'</td><td style="text-align: center;" >'+value.size_name+'</td><td style="text-align: center;" >'+value.color_name+'</td><td style="text-align: center;" >'+value.quantity+'</td><td style="text-align: center;"><a idProDe="'+value.id+'" data-target="#myModal-detail-product" class="btn btn-info infoProDe" title="Xem chi tiết sản phẩm" data-toggle="modal" ><i class="fa fa-eye"></i></a><a class="btn btn-warning"  href="?mod=admin&act=product&action=edit_detail&id='+value.id+'" ><i class="fa fa-edit"></i></a><a idProDe="'+value.id+'" " class="btn btn-danger deleteDetail" title="Xóa sản phẩm"><i class="fa fa-trash-o"></i></a></td></tr>');
		    		})
		    		

		    	}
		    });

		});
		$(document).on('click','.infoProDe',function(){
			var product_detail_id= $(this).attr('idProDe');
			$.ajax({
		    	url: '?mod=admin&act=product&action=find_detail&id='+product_detail_id,
		    	type: 'post',
		    	success: function(data){
		    		var result = JSON.parse(data);	
		    		console.log(data);
		    		$("#imagePro").attr("src",result.data.name_image);
		    		$('#namePro').text(result.data.name_product);
		    		$('#sizePro').text(result.data.size_name);
		    		$('#colorPro').text(result.data.color_name);
		    		$('#quantityPro').text(result.data.quantity);
		    	}
		    });
		});

    $(document).on('click','.delete',function(){
      var id = $(this).attr('idPro');
      swal({
        title: "Bạn có muốn xóa không?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
             $.ajax({
                  type: "POST",
                  url: "?mod=admin&act=product&action=delete&id="+id,
                  success: function(res)
                  {
                      console.log(res);
                      location.reload();
                  }               
                });
          }
      });     
    });
    $(document).on('click','.deleteDetail',function(){
      var id = $(this).attr('idProDe');
      swal({
        title: "Bạn có muốn xóa không?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
             $.ajax({
                  type: "POST",
                  url: "?mod=admin&act=product&action=delete_detail&id="+id,
                  success: function(res)
                  {
                      console.log(res);
                      location.reload();
                  }               
                });
          }
      });     
    });
		
		
	});	
</script>
<?php 
  if (isset($_COOKIE['success'])) {
    echo '<script type="text/javascript">toastr.success("'.$_COOKIE['success'].'")</script>';
    // unset($_COOKIE['msg3']);
  }
?>
<?php 
  if (isset($_COOKIE['error'])) {
    echo '<script type="text/javascript">toastr.warning("'.$_COOKIE['error'].'")</script>';
    // unset($_COOKIE['msg3']);
  }
?>