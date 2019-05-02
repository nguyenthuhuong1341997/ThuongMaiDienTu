<?php 
	include_once 'views/layout/admin/header.php';
?>
 <style type="text/css">
     .stepContainer{
        height: 150px !important;
     }
 </style>

<!-- page content -->
        <div class="right_col" role="main">
              <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Tài khoản</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist" style="height: 40px;">
                                    <li role="presentation" class="active" style="margin-top: 0px;"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true" >Thông tin tài khoản</a>
                                    </li>
                                    <li role="presentation" class="" style="margin-top: 0px;"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Thay đổi mật khẩu</a>
                                    </li>
                                </ul>

                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                        <div class="modal-body" style="height: 200px;">
                                            <div class="col-md-3">
                                                <img src="<?php echo $_SESSION['user']['image'] ?>" alt="" style="width: 170px; height: 170px; border-radius: 50%">
                                                <a href="?mod=admin&act=account&action=changeprofile">
                                                    <button type="button" class="btn btn-primary" style="margin-top: 20px;">Thay đổi ảnh đại diện</button>
                                                </a>
                                            </div>
                                            <div class="col-md-8 col-md-offset-1">
                                                <div class="row">
                                                  <div class="col-md-5"><b>Email</b></div>
                                                  <div class="col-md-7"><p><?=$_SESSION['user']['email']?></p></div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-5"><b>Họ và tên</b></div>
                                                  <div class="col-md-7"><p><?=$_SESSION['user']['username']?></p></div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-5"><b>Địa chỉ</b></div>
                                                  <div class="col-md-7"><p><?=$_SESSION['user']['address']?></p></div>
                                                </div>      
                                                <div class="row">
                                                  <div class="col-md-5"><b>Điện thoại</b></div>
                                                  <div class="col-md-7"><p><?=$_SESSION['user']['phone']?></p></div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-5"><b>Ngày sinh</b></div>
                                                  <div class="col-md-7"><p><?=$_SESSION['user']['birthday']?></p></div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-5"><b>Ngày vào công ty</b></div>
                                                  <div class="col-md-7"><p><?=$_SESSION['user']['joined_date']?></p></div>
                                                </div>                    
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                        <div class="x_content">
                                            <div id="wizard" class="form_wizard wizard_horizontal">
                                                <ul class="wizard_steps">
                                                    <li>
                                                      <a href="#step-1">
                                                        <span class="step_no">1</span>
                                                        <span class="step_descr">
                                                            Bước 1<br />
                                                            <small>Xác minh</small>
                                                        </span>
                                                      </a>
                                                    </li>
                                                    <li>
                                                      <a href="#step-2">
                                                        <span class="step_no">2</span>
                                                        <span class="step_descr">
                                                            Bước 2<br />
                                                            <small>Thay đổi</small>
                                                        </span>
                                                      </a>
                                                    </li>
                                                </ul>
                                                <div id="step-1">
                                                    <form method="POST" class="form-horizontal form-label-left">
                                                      <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mật khẩu hiện tại<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="oldPass">
                                                          <p id="error1" style="margin-top: 43px; margin-left: 7px; color: red;"></p>
                                                          <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'];?>">
                                                        </div>
                                                      </div>
                                                    </form>
                                                </div>
                                                <div id="step-2">
                                                  <form method="POST" class="form-horizontal form-label-left">

                                                      <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="second-name">Mật khẩu mới<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input type="text" id="second-name" required="required" class="form-control col-md-7 col-xs-12" name="newPass">
                                                        </div>
                                                      </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="third-name">Nhập lại mật khẩu<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <input type="text" id="third-name" required="required" class="form-control col-md-7 col-xs-12" name="repeatNewPass">
                                                         <p id="error2" style="margin-top: 43px; margin-left: 7px; color: red;"></p> 
                                                        </div>
                                                      </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
  if (isset($_COOKIE['editpass'])) {
    echo '<script type="text/javascript">toastr.success("Thay đổi mật khẩu thành công")</script>';
    // unset($_COOKIE['msg3']);
  }
?>

