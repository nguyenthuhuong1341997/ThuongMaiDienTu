<?php 
	include_once 'views/layout/admin/header.php';
?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quản Lý Nhân Viên</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
	                <div class="x_title" style="margin-top: 15px;">
	                	<h2>Sửa nhân viên</h2>
	                    
	                    <div class="clearfix"></div>

	                </div>
                  	<form method="POST" action="?mod=admin&act=user&action=update&id=<?=$admin['id']?>" class="form-horizontal form-label-left createuser" >
                  		<div class="row">
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Email</label>
                  					</div>
                  					<div class="col-md-9">
                  						<input type="email" class="form-control has-feedback-left" name="email" id="email" autofocus="hidden" required="" value="<?=$admin['email']?>">
			                        	<span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                  					</div>
                  				</div>
			                </div>
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Code</label>
                  					</div>
                  					<div class="col-md-9">
                  						<input type="text" id="code" name="code" class="form-control has-feedback-left" required="" value="<?=$admin['code']?>">
			                        	<span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                  					</div>
                  				</div>
			                </div>
                  		</div>
                  		<div class="row">
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Họ và tên</label>
                  					</div>
                  					<div class="col-md-9">
                  						<input type="text" id="name" class="form-control has-feedback-left"  name="name" required="" value="<?=$admin['username']?>">
			                        	<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  					</div>
                  				</div>
			                </div>
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">

                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Ngày sinh</label>
                  					</div>
                  					<div class="col-md-9">
                  						<fieldset>
				                          <div class="control-group">
				                            <div class="controls">
				                              <div class="xdisplay_inputx form-group has-feedback">
				                                <input type="text" class="form-control has-feedback-left" id="single_cal1" aria-describedby="inputSuccess2Status" name="birthday" required="" value="<?=$admin['birthday']?>">
				                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
				                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
				                              </div>
				                            </div>
				                          </div>
				                        </fieldset>
                  					</div>
                  				</div>
			                </div>
                  		</div>
                  		<div class="row">
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Chức vụ</label>
                  					</div>
                  					<div class="col-md-9">
                              <select class="select2_single form-control" tabindex="-1" name="role" id="role" >
                                <?php foreach ($roles as $role): ?>
                                  <?php if ($role['id']== $admin['role_id']): ?>
                                    <option selected="true" value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                  <?php else: ?>
                                    <option  value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                  <?php endif ?>
          

                                <?php endforeach ?>
                              </select>
                  						
                  					</div>
                  				</div>
			                </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <div class="row">
                                    <div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                                        <label>Ngày vào công ty</label>
                                    </div>
                                    <div class="col-md-9">
                                        <fieldset>
                                          <div class="control-group">
                                            <div class="controls">
                                              <div class="xdisplay_inputx form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" id="single_cal2" aria-describedby="inputSuccess2Status2" name="joined_date" id="joined_date" required="" value="<?=$admin['joined_date']?>">
                                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                              </div>
                                            </div>
                                          </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                  		</div>
                  		<div class="row">
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Số điện thoại</label>
                  					</div>
                  					<div class="col-md-9">
                  						<input type="text" class="form-control has-feedback-left" id="phone_number" name="phone_number" required="" value="<?=$admin['phone']?>">
			                        	<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                  					</div>
                  				</div>
			                </div>
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Địa chỉ</label>
                  					</div>
                  					<div class="col-md-9">
                  						<input type="text" class="form-control has-feedback-left" name="address" id="address" required="" value="<?=$admin['address']?>">
			                        	<span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                  					</div>
                  				</div>
			                </div>
                  		</div>
                  		<div class="row">
                  			
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Ảnh đại diện</label>
                  					</div>
                  					<div class="col-md-9">
                  						<input type="text" class="form-control has-feedback-left" name="image" id="image" required="" value="<?=$admin['image']?>">
			                        	<span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>
                  					</div>
                  				</div>
			                </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-5">
                                        <button type="submit" class="btn btn-info ">Sửa </button>
                                    </div>
                                </div>
                            </div>
                  		</div>
                  		
                  	</form>
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
<script type="text/javascript">
	$('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
</script>
