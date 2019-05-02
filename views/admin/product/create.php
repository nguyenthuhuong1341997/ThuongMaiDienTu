<?php 
	include_once 'views/layout/admin/header.php';
?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quản Lý Sản Phẩm</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
	                <div class="x_title" style="margin-top: 15px;">
	                	<h2>Thêm mới sản phẩm</h2>
	                    
	                    <div class="clearfix"></div>

	                </div>
                  	<form enctype="multipart/form-data" method="POST" action="?mod=admin&act=product&action=store" class="form-horizontal form-label-left createuser" >
                  		<div class="row">
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  				<div class="row">
                  					<div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                  						<label>Mã sản phẩm</label>
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
                              <label>Tên sản phẩm</label>
                            </div>
                            <div class="col-md-9">
                              <input type="text" id="name" name="name" class="form-control has-feedback-left" placeholder="Tên sản phẩm" required="">
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                          </div>
                        </div>
                  			
                  		</div>

                  		<div class="row">
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <div class="row">
                            
                            <div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                              <label>Thể loại</label>
                            </div>
                            <div class="col-md-4">
                              <select class="select2_single form-control" tabindex="-1" name="publisher" id="gender">
                                <?php foreach ($genders as $gender): ?>
                                  <option  value="<?= $gender['id'] ?>"><?= $gender['name'] ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <div class="col-md-offset-1 col-md-4">
                              <select class="select2_single form-control" tabindex="-1" name="category_id" id="category">
                              </select>
                            </div>
                          </div>
                      </div>
                  			<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <div class="row">
                            <div class="col-md-3" style="padding-left: 20px;padding-top: 10px;">
                              <label>Giá</label>
                            </div>
                            <div class="col-md-9">
                              <input type="number" id="name" name="price" class="form-control has-feedback-left" placeholder="Giá" required="">
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
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
  $(document).ready(function(){
    var selectValues = <?= json_encode($categories) ?>;
    loadCate($('#gender').val());
    $('#gender').change(function(){
      var gender = $(this).val();
      $('#category').children().remove();
      loadCate(gender);
    });

    function loadCate( gender){
      selectValues.forEach(function(s){
        if (s.parent_id == gender) 
            $('#category').append('<option value="' + s.id + '">' + s.name + '</option>');
      })
    }

    });
</script>
