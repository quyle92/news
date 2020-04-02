<?php
if ($_POST) {
	$HoTen=$_POST['HoTen'];
	$Username=$_POST['u'];
	$Password=$_POST['Password'];
	//$_POST["password"] === $_POST["confirm_password"]
	$Email=$_POST['Email'];
	$DiaChi=$_POST['DiaChi'];
	$Dienthoai=$_POST['Dienthoai'];
	$NgayDangKy=$_POST['NgayDangKy'];
	$NgaySinh=$_POST['NgaySinh'];
	$idGroup=$_POST['idGroup'];
	$GioiTinh=$_POST['GioiTinh'];
	$kq=$qt->Users_Them($HoTen,$Username,$Password,$Email,$DiaChi,$Dienthoai,$NgayDangKy,$NgaySinh,$idGroup,$GioiTinh);
	echo "<script>document.location='index.php?p=users_ds';</script>";
	//exit();
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<style>
.form-group .form-line {border-bottom:none; }
.form-group .form-control {padding:3px; border:1px solid #999;}
.form-group .form-line.abc {padding-top:5px; }

</style>
<div class="row clearfix">
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
                    <div class="card">
                        <div class="header">
                            <h2>
                                THÊM USERS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" name="form1">
                                <div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="HoTen"> Họ Tên </label>
                                    </div>
                                   <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <input type="text" id="HoTen" name="HoTen" class="form-control" placeholder="HoTen"  maxlength= "20" minlength="3" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="u"> Username </label>
                                    </div>
                                   <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <input type="text" id="u" name="u" class="form-control" placeholder="Username"  maxlength="20" minlength="3" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Password"id="password" name="Password" min="1" max="1000"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="confirm_password">Confirm Password</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Confirm Password"id="confirm_password" name="ConfirmPassword" min="1" max="1000"  />
												<span id='message'></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<!--password validation script-->
										
										<script>
										$('#password, #confirm_password').on('keyup', function () {
										  if ($('#password').val() == $('#confirm_password').val()) {
											$('#message').html('Matching').css('color', 'green');
										  } else 
											$('#message').html('Not Matching').css('color', 'red');
										});
										</script>
										<!--End of password validation script-->
								<div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="Email">Email</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Email"id="Email" name="Email" min="1" max="1000" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="DiaChi">DiaChi</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="DiaChi"id="DiaChi" name="DiaChi" min="1" max="1000" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="Dienthoai">Dienthoai</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="type" class="form-control" placeholder="Dienthoai"id="Dienthoai" name="Dienthoai" min="1" max="1000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<script>
								$(document).ready(function() {
									$("#Dienthoai").keydown(function(event) {
										// Allow only backspace, delete, (space) and "+" sign.
										if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 32 || event.keyCode == 61 ) {
											// let it happen, don't do anything
										}
										else {
											// Ensure that it is a number and stop the keypress
											if (event.keyCode < 48 || event.keyCode > 57 ) {
												event.preventDefault();	
											}	
										}
									});
								});
								</script>

								
								
																<div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="Dienthoai">NgayDangKy</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"placeholder="NgayDangKy"id="NgayDangKy" name="NgayDangKy" min="1" max="1000" class=" form-control" value="<?=date('d-m-Y')?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="NgaySinh">NgaySinh</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" placeholder="NgaySinh"id="NgaySinh" name="NgaySinh" min="1" max="1000" class="datepicker form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label> idGroup  </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group ">
                                            <div class="form-line abc">
                                                <input type="radio"  id="admin" name="idGroup" checked value="1"> 
												<label for="admin">Admin</label>
												<input type="radio" id="thuong" name="idGroup" value="0">
												<label for="thuong">Thường</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label> GioiTinh </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group ">
                                            <div class="form-line abc">
                                                <input type="radio"  id="nam" name="GioiTinh" checked value="1"> 
												<label for="nam">Nam</label>
												<input type="radio" id="nu" name="GioiTinh" value="0">
												<label for="nu">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">THÊM USERS</button>
										
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			
<!-- Bootstrap Material Datetime Picker Css -->
<link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />



<!-- Moment Plugin Js -->
<script src="plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<script>
$(document).ready(function(e) {   
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'D/M/Y', 
        weekStart: 1, time: false
    });	
});
</script>

							