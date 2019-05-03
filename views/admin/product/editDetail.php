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
	                	<h2>Cập nhật sản phẩm</h2>
	                    
	                    <div class="clearfix"></div>

	                </div>
                  	<form action="?mod=admin&act=product&action=update_detail&id=<?= $product_detail['id'] ?>" method="POST" role="form">
                    
                      <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" class="form-control" readonly="" value="<?= $product_detail['name_product'] ?>">
                      </div>

                      <div class="form-group">
                    <label for="">Kích cỡ</label>
                    <select name="size_id" id="input" class="form-control" required="required">
                       <?php 
                        foreach ($sizes as $size) {
                          if($size['id']==$product_detail['size_id']){
                      ?>
                            <option selected="" value="<?= $size['id'] ?>"><?= $size['name'] ?></option>
                        <?php
                          }else{
                       ?>
                        <option  value="<?= $size['id'] ?>"><?= $size['name'] ?></option>
                      <?php 
                        }}
                       ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Màu sắc</label>
                    <select name="color_id" id="input" class="form-control" required="required">
                      <?php 
                        foreach ($colors as $color) {
                          if($color['id']==$product_detail['color_id']){
                      ?>
                            <option selected="" value="<?= $color['id'] ?>"><?= $color['name'] ?></option>
                        <?php
                          }else{
                       ?>
                        <option  value="<?= $color['id'] ?>"><?= $color['name'] ?></option>
                      <?php 
                        }}
                       ?>
                    </select>
                  </div>
                      
                      <div class="form-group">
                        <label for=""> Số lượng</label>
                        <input name="quantity" type="text" class="form-control" value="<?= $product_detail['quantity'] ?>">
                      </div>
                      
                    
                      <button type="submit" class="btn btn-primary">Cập nhật</button>
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
    var category_id = <?= $product['category_id']?>;
    loadCate($('#gender').val());
    $('#gender').change(function(){
      var gender = $(this).val();
      $('#category').children().remove();
      loadCate(gender);
    });

    function loadCate( gender){
      selectValues.forEach(function(s){
        if (s.parent_id == gender){
          if(s.id == category_id ){
            $('#category').append('<option selected="" value="' + s.id + '">' + s.name + '</option>');
          }else{
            $('#category').append('<option value="' + s.id + '">' + s.name + '</option>');

          }
        }
      })
    }

    });
</script>
