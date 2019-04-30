<?php 
	include_once 'views/layout/admin/header.php';
?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quản Lý Sách</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
	                <div class="x_title" style="margin-top: 15px;">
	                	<h2>Thêm mới sách</h2>
	                    
	                    <div class="clearfix"></div>

	                </div>
                  	<form enctype="multipart/form-data" method="POST" action="?mod=admin&act=book&action=store" class="form-horizontal form-label-left createuser" >
                  		<div class="row">
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Mã sách</label>
                  					</div>
                  					<div class="col-md-9">
                  						<input type="text" class="form-control has-feedback-left" placeholder="Code" name="code" id="code" autofocus="hidden" required="">
			                        	<span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                  					</div>
                  				</div>
			                </div>
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					
                            <div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                              <label>Nhà xuất bản</label>
                            </div>
                            <div class="col-md-9">
                              <select class="select2_single form-control" tabindex="-1" name="publisher">
                                <?php foreach ($types as $type): ?>
                                  <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                  				</div>
			                </div>
                  		</div>

                  		<div class="row">
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                            <div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                              <label>Tên sách</label>
                            </div>
                            <div class="col-md-9">
                              <input type="text" id="name" name="name" class="form-control has-feedback-left" placeholder="Tên sách" required="">
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                  				</div>
			                  </div>
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Thể loại</label>
                  					</div>
                  					<div class="col-md-9">
                  						<select class="select2_single form-control" tabindex="-1" name="type">
                                <?php foreach ($types as $type): ?>
                                  <option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
                                <?php endforeach ?>
                              </select>
                  					</div>
                  				</div>
			                  </div>
                  		</div>

                  		<div class="row">
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                            <div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                              <label>Giá</label>
                            </div>
                            <div class="col-md-9">
                              <input type="text" id="price" class="form-control has-feedback-left" placeholder="Nhập vào giá bán" name="price" required="">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                  				</div>
			                  </div>
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <div class="col-md-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 30px;padding-top: 10px;">
                            <label class="control-label ">Tác giả</label>
                          </div>
                  				
                          <div class="col-md-9">
                            <select class="select2_single form-control" tabindex="-1" name="author">
                              <?php foreach ($authors as $author): ?>
                                <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
			                  </div>
                  		</div>

                  		<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                          <div class="row">
                            <div class="col-md-2" style="padding-left: 20px;padding-top: 10px;">
                              <label>Mô tả</label>
                            </div>
                            <div class="col-md-10">
                              <textarea id="editor" rows="6" cols="6" name="description"></textarea>
                              <script>
                                  ClassicEditor
                                          .create( document.querySelector( '#editor' ) )
                                          .then( editor => {
                                                  console.log( editor );
                                          } )
                                          .catch( error => {
                                                  console.error( error );
                                          } );
                              </script>
                              
                            </div>
                          </div>
                  			<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                          <div class="row">
                            <div class="col-md-2" style="padding-left: 20px;padding-top: 10px;">
                              <label>Ảnh</label>
                            </div>
                            <div class="col-md-10">
                              <input type="text" class="form-control has-feedback-left" placeholder="" name="image" value="https%3A%2F%2Fwebtruyen.com%2Ftuoi-tho-du-doi" id="image" >
                                <span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>
                            </div>
                          </div>
                        </div>
                  			
			                  </div>
                  		</div>
                  			
                  	</div>

                        

                  		<div class="row">
                  			<div class="col-md-2 col-md-offset-5">
								<button type="submit" class="btn btn-info ">Thêm mới</button>
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
