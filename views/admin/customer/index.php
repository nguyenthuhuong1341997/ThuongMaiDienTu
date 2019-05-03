<?php 
	include_once 'views/layout/admin/header.php';
?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
	            <div class="title_left">
	                <h3>Quản Lý Khách Hàng</small></h3>
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
                    <h2>Danh sách Khách Hàng</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<div class="row">
                  		<div class="col-md-6">
                  			<a href="?mod=admin&act=customer&action=create" class="btn btn-success"><i class="fa fa-plus-circle"></i>Thêm mới</a>
                  		</div>
                  	</div>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        	<th><input type="checkbox" onclick="toggle(this);" /></th>
                          	<th>ID</th>
                          	<th>Họ và tên</th>
					        <th>Email</th>
					        <th>Địa chỉ</th>
					        <th>Số điện thoại</th>
					        <th>Chức năng</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php for ($i=0; $i <count($customers) ; $i++) { ?>
			    		
			      		
					    	<tr id="<?php echo $customers[$i]['id']; ?>">
					    		<td><input class="checkbox-working-day" value="<?=$customers[$i]['id']  ?>" type="checkbox" /></td>
				    			<td><?=$customers[$i]['id']  ?></td>
				    			<td><?=$customers[$i]['username']  ?></td>
						        <td><?=$customers[$i]['email']  ?></td>
						        <td><?=$customers[$i]['address']  ?></td>
						        <td><?=$customers[$i]['phone']  ?></td>
						        <td>
									<a data-target="#myModal-<?=$customers[$i]['id']?>" class="btn btn-info" title="Xem chi tiết" data-toggle="modal" ><i class="fa fa-eye"></i></a>
									<a href="?mod=admin&act=customer&action=edit&id=<?= $customers[$i]['id']?>" class="btn btn-warning" title="Sửa nhân viên"><i class="fa fa-edit"></i></a>
									<a href="javascript:;" class="btn btn-danger delete-customer" title="Xóa nhân viên"><i class="fa fa-trash-o"></i></a>
						        </td>
					      	</tr>
			      		
				      		<div id="myModal-<?=$customers[$i]['id']?>" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Thông tin nhân viên</h4>
										</div>
										<div class="modal-body" style="height: 200px;">
											
											<div class="col-md-11 col-md-offset-1">
												<div class="row">
													<div class="col-md-5"><b>Email</b></div>
													<div class="col-md-7"><p><?=$customers[$i]['email']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-5"><b>Username</b></div>
													<div class="col-md-7"><p><?=$customers[$i]['username']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-5"><b>Họ và tên</b></div>
													<div class="col-md-7"><p><?=$customers[$i]['name']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-5"><b>Địa chỉ</b></div>
													<div class="col-md-7"><p><?=$customers[$i]['address']?></p></div>
												</div>	
												<div class="row">
													<div class="col-md-5"><b>Điện thoại</b></div>
													<div class="col-md-7"><p><?=$customers[$i]['phone']?></p></div>
												</div>
												
																						
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
										</div>
									</div>
								</div>
							</div>					
						<?php } ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
		
<?php 
 	include_once 'views/layout/admin/footer.php';
?>
<script type="text/javascript " src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
	if (isset($_COOKIE['success'])) {
		echo '<script type="text/javascript">toastr.info("'.$_COOKIE['success'].'")</script>';
		// unset($_COOKIE['msg3']);
	}
?>
<?php 
	if (isset($_COOKIE['error'])) {
		echo '<script type="text/javascript">toastr.waring("'.$_COOKIE['error'].'")</script>';
		// unset($_COOKIE['msg3']);
	}
?>


<script type="text/javascript">
	$(".delete-customer").click(function(){
		var id = $(this).parents("tr").attr("id");
		var path = "?mod=admin&act=customer&action=delete&id=" + id;
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
		            url: path,
		            success: function(res)
		            {
		                console.log(res);
		                location.reload();
		            }	              
	            });
		  	}
		});    	
	});

	function toggle(source) {
	    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
	    for (var i = 0; i < checkboxes.length; i++) {
	        if (checkboxes[i] != source)
	            checkboxes[i].checked = source.checked;
	    }
	};

	
</script>
