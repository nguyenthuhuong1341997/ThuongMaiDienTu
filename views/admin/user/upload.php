<style type="text/css">
    .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
</style>

<?php 
    include_once 'views/layout/admin/header.php';
	
?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tài khoản</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row" style="margin: 30px;">
                <form id="form" action="?mod=admin&act=account&action=upload" method="post" enctype="multipart/form-data">
                    <label>Thay đổi ảnh</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Browse… <input type="file" name="myFile" id="imgInp" required="">
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
    <!-- <input type="submit" value="Upload Image" name="submit"> -->
                    <img  id='img-upload' />
                    <div class="row">
                        <button type="submit" class="btn btn-success" name="submit" style="margin: 10px; margin-left: 40%;">Thay đổi</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <!-- /page content -->
		

<?php 
    include_once 'views/layout/admin/footer.php';
?>

<script type="text/javascript">
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                    $('#img-upload').css({
                        'height': '420px',
                        'width' : '60%',
                        'margin-left' : '25%',
                    });
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });     
    });
</script>