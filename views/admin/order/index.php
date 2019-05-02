<?php 
	include_once 'views/layout/admin/header.php';
?>
 <div class="right_col list-book" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quản Lý Đơn hàng</small></h3>
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
                    <h2>Danh sách đơn hàng chờ xác nhận</small></h2>
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
                  	
                    <table id="datatable-wait-confirm" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        	<th><input type="checkbox" onclick="toggle(this);" /></th>
                          	<th>ID</th>
                          	<th>Mã đơn hàng</th>
					        <th>Tên khách hàng</th>
					        <th>Sản phẩm</th>
					        <th>Tổng tiền</th>
					        <th></th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($orders as $key => $value) { ?>
			    		
			      		
					    		<tr id="<?php echo $value['id']; ?>">
					    		<td><input class="checkbox-working-day" value="<?=$value['id']  ?>" type="checkbox" /></td>
				    			<td><?=$value['id']  ?></td>
				    			<td><?=$value['code']  ?></td>
						        <td><?=$value['customer_name']  ?></td>
						        <td>
						        	<?php $total = 0;foreach ($value['detail'] as $detail): ?>
						        		<span><?=$detail['quantity']?> <?=$detail['product_name']?> <?=$detail['color_name']?> <?=$detail['size_name']?></span> <br/>
						        			<?php $total += $detail['quantity'] * $detail['price']?>
						        	<?php endforeach?>
						        </td>
						        <td><?php echo number_format($total, 0) . "&nbsp;₫"; ?></td>
						        <td>
									<a data-target="#myModal-<?=$value['id']?>" class="btn btn-info" title="Xem chi tiết sản phẩm" data-toggle="modal" ><i class="fa fa-eye"></i></a>
									<a href="?mod=admin&act=order&action=confirm&id=<?= $value['id']?>" class="btn btn-success" title="Xác nhận đơn hàng"><i class="fa fa-check"></i></a>
									<a href="?mod=admin&act=order&action=delete&id=<?= $value['id']?>" class="btn btn-danger delete-order" title="Xóa đơn hàng"><i class="fa fa-trash-o"></i></a>
						        </td>
					      	</tr>
			      		
				      		<div id="myModal-<?=$value['id']?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Thông tin đơn hàng</h4>
										</div>
										<div class="modal-body">
											<div class="container">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-3"><b>Mã đơn hàng</b></div>
														<div class="col-md-9"><p><?=$value['code']?></p></div>
													</div>
													<div class="row">
														<div class="col-md-3"><b>Tên khách hàng</b></div>
														<div class="col-md-9"><p><?=$value['customer_name']?></p></div>
													</div>
													<div class="row">
														<div class="col-md-3"><b>Email</b></div>
														<div class="col-md-9"><p><?=$value['customer_email']?></p></div>
													</div>
													<div class="row">
														<div class="col-md-3"><b>Địa chỉ</b></div>
														<div class="col-md-9"><p><?=$value['village_name']?>, <?=$value['district_name']?>, <?=$value['city_name']?></p></div>
													</div>
													<div class="row">
														<div class="col-md-3"><b>Số điện thoại</b></div>
														<div class="col-md-9"><p><?=$value['customer_phone']?></p></div>
													</div>
													<div class="row">
														<div class="col-md-3"><b>Sản phẩm</b></div>
														<div class="col-md-9"><p><?php $total = 0;foreach ($value['detail'] as $detail): ?>
											        		<span><?=$detail['quantity']?> <?=$detail['product_name']?> <?=$detail['color_name']?> <?=$detail['size_name']?></span> <br/>
											        			<?php $total += $detail['quantity'] * $detail['price']?>
											        	<?php endforeach?></p></div>
													</div>
													
													<div class="row">
														<div class="col-md-3"><b>Tổng tiền</b></div>
														<div class="col-md-9"><p><?php echo number_format($total, 0) . "&nbsp;₫"; ?></p></div>
													</div>
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

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách đơn hàng đã giao</small></h2>
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
                  	
                    <table id="datatable-complete-order" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        	<th><input type="checkbox" onclick="toggle(this);" /></th>
                          	<th>ID</th>
                          	<th>Mã đơn hàng</th>
					        <th>Tên khách hàng</th>
					        <th>Sản phẩm</th>
					        <th>Tổng tiền</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($order_completes as $key => $value) { ?>
			    		
			      		
					    		<tr id="<?php echo $value['id']; ?>">
					    		<td><input class="checkbox-working-day" value="<?=$value['id']  ?>" type="checkbox" /></td>
				    			<td><?=$value['id']  ?></td>
				    			<td><?=$value['code']  ?></td>
						        <td><?=$value['customer_name']  ?></td>
						        <td>
						        	<?php $total = 0;foreach ($value['detail'] as $detail): ?>
						        		<span><?=$detail['quantity']?> <?=$detail['product_name']?> <?=$detail['color_name']?> <?=$detail['size_name']?></span> <br/>
						        			<?php $total += $detail['quantity'] * $detail['price']?>
						        	<?php endforeach?>
						        </td>
						        <td><?php echo number_format($total, 0) . "&nbsp;₫"; ?></td>
						        
					      	</tr>
			      		
				      		<div id="myModal-<?=$value['id']?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg">
									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Thông tin đơn hàng</h4>
										</div>
										<div class="modal-body">
											<div class="col-md-5">
												<div class="row">
													<div class="col-md-3"><b>Mã đơn hàng</b></div>
													<div class="col-md-9"><p><?=$value['code']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-3"><b>Tên khách hàng</b></div>
													<div class="col-md-9"><p><?=$value['customer_name']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-3"><b>Email</b></div>
													<div class="col-md-9"><p><?=$value['customer_email']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-3"><b>Địa chỉ</b></div>
													<div class="col-md-9"><p><?=$value['village_name']?>, <?=$value['district_name']?>, <?=$value['city_name']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-3"><b>Số điện thoại</b></div>
													<div class="col-md-9"><p><?=$value['customer_phone']?></p></div>
												</div>
												

											</div>
											<div class="col-md-5 col-md-offset-2">
												<div class="row">
													<div class="col-md-3"><b>Mã sách</b></div>
													<div class="col-md-9"><p><?=$value['code']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-3"><b>Tên sách</b></div>
													<div class="col-md-9"><p><?=$value['name']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-3"><b>Giá bán</b></div>
													<div class="col-md-9"><p><?=$value['price']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-3"><b>Thể loại</b></div>
													<div class="col-md-9"><p><?=$value['type']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-3"><b>Tác giả</b></div>
													<div class="col-md-9"><p><?=$value['author_name']?></p></div>
												</div>
												<div class="row">
													<div class="col-md-3"><b>Nhà xuất bản</b></div>
													<div class="col-md-9"><p><?=$value['publisher_name']?></p></div>
												</div>	
												<div class="row">
													<div class="col-md-3"><b>Description</b></div>
													<div class="col-md-9"><p><?=$value['description']?></p></div>
												</div>					
											</div>
											<center><div class="row" style="padding-left: 15%">
													<div class="quantityBook">
														<div class="border-quantity">
															<p><b>Vị trí</b></p>
														</div>
														<div class="border-quantity">
															<p style="font-weight: 700;">Số lượng</p>
														</div>
													</div>
													<?php foreach ($sites as $key1 => $value1) {?>
														<div class="quantity quantityBook">
															<div class="border-quantity">
																<p><b><?= $value1['name'] ?></b></p>
															</div>
															<div class="border-quantity">
																<?php foreach ($value['quantity'] as $keyQuantity => $quantity) {?>
																	
																	<?php if($key1 == $keyQuantity) { ?>
																			<p><?= $quantity['quantity'] ?></p>
																			<?php $count=1; ?>
																	<?php } ?>
																	
																<?php } ?>
															</div>
														</div>
															
													<?php } ?>
												</div>
										</div></center>
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
		echo '<script type="text/javascript">toastr.warning("'.$_COOKIE['error'].'")</script>';
		// unset($_COOKIE['msg3']);
	}
?>

